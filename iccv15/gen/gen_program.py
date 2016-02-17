#!/usr/bin/python
import json
import time
import codecs
import sys
import copy
import csv

import pandas as pd
import pandas.tslib
from StringIO import StringIO

import requests


def get_poster_swaps():
    URL = 'https://docs.google.com/spreadsheets/d/1aseKf23I00a499VR5EtBBudJMtrTY5lKADLlo7mVTJw/export?format=csv&id'
    r = requests.get(URL)
    data = pd.read_csv(StringIO(r.content),index_col=-1)
    swaps = {}
    for i in range(data.shape[0]):
        row = data.irow(i)
        #print row
        #print row.keys()
        if 'New session' in row.keys():
           #'Original session' in row.keys() and \
           #'PaperID' in row.keys():
            #print row.keys()
            if pd.notnull(row['New session']):
                #print 'foo!!'
                new_session = row['New session']
                old_session = row['Original session']
                paper_id    = int(row['PaperID'])
                swaps[paper_id] = {'from':old_session,'to':new_session}
    return swaps


def get_urls_by_title():
    rdr = csv.reader(open('input/cvf_open_acccess_urls.csv','r'),delimiter=';')
    title_to_url = {}
    line = rdr.next()
    while line:
        title_to_url[line[0]] = line[1]
        #newkey = ('').join([x[0] for x in line[0].split(' ')])
        newkey = ('').join([x[0] for x in line[0].split(' ') if x[0].lower() >= 'a' and x[0].lower() <= 'z'])
        title_to_url[newkey] = line[1]
        try:
            line = rdr.next()
        except:
            line = None
    return title_to_url



def get_poster_nums_for_orals():
    filename = 'input/PosterLocsForOrals.xlsx'
    sheetname = 'Sheet1'
    xl = pd.ExcelFile(filename)
    df = xl.parse(sheetname)
    sz = df.shape

    #print sz
    o2p_map = {}
    for r in range(sz[0]):
        row = df.irow(r)
        entry = {'0':row[0],'1':row[1],'2':row[2],'3':row[3],'4':row[4],'5':row[5]}
        o2p_map[row[3]] = {'poster-session':row[0],'porder':row[1],'from-oral':row[2].split('-')[1]}
        #print entry
    return o2p_map


# Final Excel was from CMT Camera Ready Ppaers and improvied by Eric Mortensen
def parse_final_excel( filename, sheetname ):
    xl = pd.ExcelFile(filename)
    df = xl.parse(sheetname)
    sz = df.shape

    swaps = get_poster_swaps()
    pnums_for_orals = get_poster_nums_for_orals()
    title_to_url = get_urls_by_title()
    to_add_at_end = []

    current_session = None
    sessions           = []
    papers_in_sessions = {}


    num_matched = 0
    num_unmatched = 0
    for r in range(sz[0]):
        row = df.irow(r)
        if type(row[0]) == pandas.tslib.Timestamp:
            # session line
            session_entry = {}
            session_entry['date'] = row[0]
            session_entry['time'] = row[1]
            session_entry['order'] = int(row[3])
            session_entry['id'] = row[4]
            #print session_entry['id']
            session_entry['title'] = row[6]
            session_entry['chairs'] = row[7]

            current_session = session_entry
            sessions.append(session_entry)
            papers_in_sessions[session_entry['id']] = []
        #elif type(row[o]) == pandas.tslib.NATType:
        if type(row[17]) == unicode: # i.e. if not last row
            paper_entry = {}
            paper_entry['order'] = int(row[9])
            paper_entry['paper_id'] = int(row[10])
            paper_entry['paper_title'] = row[17]
            paper_entry['auth_str'] = row[18]
            paper_entry['abstract'] = row[26]

            cvf_url = None
            if title_to_url.has_key(row[17]):
                num_matched += 1
                cvf_url = title_to_url[row[17]]
            else:
                newkey = ('').join([x[0] for x in row[17].split(' ') if x[0].lower() >= 'a' and x[0].lower() <= 'z'])
                if title_to_url.has_key(newkey):
                    num_matched += 1
                    cvf_url = title_to_url[newkey]
                else:
                   num_unmatched += 1
                   print row[17]
            paper_entry['open_access_url'] = cvf_url

        #print paper_entry
            if paper_entry['paper_id'] in pnums_for_orals.keys():
                if paper_entry['paper_id'] in swaps.keys():
                    print 'PROBLEM!!!! paper  %d in both orals->poseters and swaps!!!' % \
                          paper_entry['paper_id']
                pid = paper_entry['paper_id']
                o2p_entry = pnums_for_orals[pid]
                paper_copy = copy.deepcopy(paper_entry)
                paper_copy['order'] = o2p_entry['porder']
                paper_copy['paper_title'] = '<b>[From Oral %s] %s</b>'%(o2p_entry['from-oral'],paper_copy['paper_title'] )
                to_add_at_end.append((o2p_entry['poster-session'].replace('P','Poster'),paper_copy))

                # add to oral session
                papers_in_sessions[current_session['id']].append(paper_entry)
            elif paper_entry['paper_id'] in swaps.keys():
                swap_entry = swaps[paper_entry['paper_id']]
                session_parts = swap_entry['to'].replace('P','Poster').split('-')
                session = ('-').join(session_parts[0:2])
                order   = int(session_parts[2])
                paper_entry['order'] = order
                #print '%s  %s' % (session,order)
                to_add_at_end.append((session,paper_entry))
            else:
                papers_in_sessions[current_session['id']].append(paper_entry)
    #print papers_in_sessions.keys()

    print 'M = %d, N = %d' %(num_matched,num_unmatched)
    for pair in to_add_at_end:
        session,paper_entry = pair
        papers_in_sessions[session].append(paper_entry)

    for key in papers_in_sessions.keys():
        papers_in_sessions[key] = sorted(papers_in_sessions[key],key=lambda e: e['order'])

    return sessions, papers_in_sessions

def parse_papers_excel( filename, sheetname ):

    xl = pd.ExcelFile(filename)
    df = xl.parse(sheetname)
    sz = df.shape

    valid_entries = []
    for r in range(sz[0]):
        row = df.irow(r)
        if row[0]:
            try:
                paper_id = int(row[0])
                paper_title = (row[1])
                paper_abstract = (row[2])
                paper_authors = (row[3])
                auth_list = [x.strip() for x in paper_authors.split(';')]
                auth_list = [[y.strip() for y in x.split(',')] for x in auth_list]
                auth_str = (', ').join([x[0] for x in auth_list])
                #print '%d - \"%s\" by %s' % (paper_id,paper_title,auth_str)
                entry = {'auth_list':auth_list,'auth_str':auth_str,'paper_id':paper_id,'paper_title':paper_title,'paper_abstract':paper_abstract}
                valid_entries.append(entry)
            except:
                continue
            #print row[1]
    return valid_entries

global to_shade
to_shade = True
def output_paper( entry, FILE, outputNum ):
    global to_shade
    shade_str = 'bgcolor="#DDDDDD"' if to_shade else 'bgcolor="#FFFFFF"'
    to_shade = not to_shade
    pnumShade = 'bgcolor="#FFFFFF"'
    pnum = '&nbsp;'
    #if not outputNum:
        #print entry
    if outputNum:
        pnumShade = shade_str
        pnum = '<a href="#poster-map">%s</a>' %entry['order']
    if entry.has_key('open_access_url'):
        print >>FILE, '<tr><td width="20">&nbsp;</td><td align="center" width="40" %s>%s</td><td %s><a href="%s" target="_blank"><b>%s</b></a><br/>&nbsp;&nbsp;&nbsp;<i>%s</i></td></tr>' % ( pnumShade, pnum, shade_str, entry['open_access_url'],entry['paper_title'], entry['auth_str'])
    else:
        print >>FILE, '<tr><td width="20">&nbsp;</td><td align="center" width="40" %s>%s</td><td %s><b>%s</b><br/>&nbsp;&nbsp;&nbsp;<i>%s</i></td></tr>' % ( pnumShade, pnum, shade_str, entry['paper_title'], entry['auth_str'])

def printSessionHeader( entry, FILE ):
    stype,snum = entry['id'].split('-')
    print >>FILE, '<tr><td>&nbsp;</td></tr>'
    print >>FILE, '<tr><td><a name="%s"></a>&nbsp;</td></tr>' % entry['id']
    print >>FILE, '<tr><td colspan="3"><b>[%s] %s Session %s - %s</b></td></tr>' % (entry['time'], stype,snum, entry['title'])
    if stype == 'Oral':
        print >>FILE, '<tr><td colspan="3"><b>Chairs:</b> %s</td></tr>' % ( entry['chairs'])
    print >>FILE, '<tr><td colspan="3"><hr></td></tr>'

def final_program():
    #OUT = open('workshops.php','w')
    OUT = codecs.open('program.php',encoding='utf-8',mode='w+')
    #OUT = codecs.open('program_final.php',encoding='utf-8',mode='w+')
    
    # DUMP HEADER
    with open('frags/program_start.html') as startfile:
        for line in startfile:
            print >>OUT, line,

    with open('frags/program_day_table.html') as startfile:
        for line in startfile:
            print >>OUT, line,

    print >>OUT, '\n\n'
    print >>OUT, '<table>'

    sessions,papers = parse_final_excel('input/ICCV_2015_Sessions_Composite.xlsx','Camera Ready Papers')

    for session in sessions:
        printSessionHeader( session, OUT )


        papers_in_session = papers[session['id']]
        #print session

    #p_map = {}
    #print >>OUT, '<table>'
    #print >>OUT, '<tr><td colspan="2" class="iccvpageheader">Orals</td></tr>'
        to_shade = True
        for p in papers_in_session:
            #if p_map.has_key(o['paper_id']):
                #print 'duplicate: %s %s' % (p_map[o['paper_id']],o)
            #else:
                #p_map[o['paper_id']] = o
            isposter = session['id'].startswith('Poster')
            output_paper(p,OUT,isposter)


    print >>OUT, '</table>'
    print >>OUT, '\n\n'


    with open('frags/program_end.html') as endfile:
        for line in endfile:
            print >>OUT, line,



def prelim_program():
    #OUT = open('workshops.php','w')
    OUT = codecs.open('program.php',encoding='utf-8',mode='w+')
    
    # DUMP HEADER
    with open('frags/program_start.html') as startfile:
        for line in startfile:
            print >>OUT, line,

    print >>OUT, '\n\n'

    orals   = parse_papers_excel('input/ICCV 2015 Orals-2.xlsx','orals')
    posters = parse_papers_excel('input/ICCV 2015 Posters-2.xlsx','ICCV2015')

    p_map = {}
    print >>OUT, '<table>'
    print >>OUT, '<tr><td colspan="2" class="iccvpageheader">Orals</td></tr>'
    for o in orals:
        if p_map.has_key(o['paper_id']):
            print 'duplicate: %s %s' % (p_map[o['paper_id']],o)
        else:
            p_map[o['paper_id']] = o
            output_paper(o, OUT)


    to_shade = True
    print >>OUT, '<tr><td colspan="2" class="iccvpageheader">&nbsp;</td></tr>'
    print >>OUT, '<tr><td colspan="2" class="iccvpageheader">Posters</td></tr>'
    for p in posters:
        if p_map.has_key(p['paper_id']):
            print 'duplicate: %s %s' % (p_map[p['paper_id']],p)
        else:
            p_map[p['paper_id']] = p
            output_paper(p, OUT)


    print >>OUT, '</table>'
    print >>OUT, '\n\n'


    with open('frags/program_end.html') as endfile:
        for line in endfile:
            print >>OUT, line,



def ignore():
    four_col = False

    print >>OUT, '<tr><td width="12%" align="center"><b>Time</b></td><!--<td width="12%" align="center"><b>Location</b></td>--><td width=74%"><b>Workshop Title / Organizers</b></td></tr>\n\n'

    with open('input/workshop_info.json','r') as jsonfile:
        JSON = json.load( jsonfile )
        to_shade = True
        BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['workshop_info']['title'],y['workshop_info']['title']), reverse=False )
        BY_DAY = sorted( BY_NAME, cmp = lambda x,y: cmp(x['workshop_info']['workshop_length'],y['workshop_info']['workshop_length']), reverse=False )
        BY_DATE = sorted( BY_DAY, cmp = lambda x,y: cmp(x['workshop_info']['workshop_date'],y['workshop_info']['workshop_date']), reverse=False )
        for workshop in BY_DATE:
            info       = workshop['workshop_info']
            # organizers = workshop['workshop_organizers']
            if not info['url']=="":
                info_str = '<a href="%s" target="_blank">%s</a>' % (info['url'],info['title'])
            else:
                info_str = '%s' % (info['title'])

            # orglist = list()
            # for org in organizers:
            #     if not org['url']=="":
            #         orglist.append( '<a href="%s" target="_blank">%s&nbsp;%s</a>' % (org['url'], org['first'], org['last']))
            #     else:
            #         orglist.append( '%s&nbsp;%s' % (org['first'], org['last']) )
    
        orglist = info['organizers'];
        
        ws_date = ''
        #if info['workshop_date'] == '':
        if info['workshop_length'] == 'full':
            if not info['workshop_date'] == '':
                ws_date = info['workshop_date']
            else:
                ws_date = 'full day' #info['workshop_date']
        elif info['workshop_length'] in ['half','am-half','half-am']:
            if not info['workshop_date'] == '':
                ws_date = '%s <i>(AM only)</i>'% info['workshop_date']
            else:
                ws_date = 'half day' #'%s <i>(AM only)</i>'% info['workshop_date']
        elif info['workshop_length'] in ['pm-half','half-pm']:
            if not info['workshop_date'] == '':
                ws_date = '%s <i>(PM only)</i>'% info['workshop_date']
            else:
                ws_date = 'afternoon' #'%s <i>(PM only)</i>'% info['workshop_date']

        ws_loc = info['location']
        # sub_date = ''
        # if not info['submission_deadline'] == '':
        #     sub_date = info['submission_deadline']

        shade_str = 'bgcolor="#DDDDDD"' if to_shade else 'bgcolor="#FFFFFF"'
        to_shade = not to_shade

        print >>OUT, '<tr valign="top" %s><td align="center">%s</td><!--<td align="center">%s</td>--><td><b>%s</b><br><i>Organizers: %s</i></td></tr>' % (shade_str, ws_date, ws_loc, info_str, orglist)

if __name__ == '__main__':
    final_program()
