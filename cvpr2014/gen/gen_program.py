#!/usr/bin/python

import csv
import json
import time


REP_TABLE = { \
              '\x92' : '\'', \
              '\x9a' : 's', \
              '\xe0' : '&agrave;', \
              '\xe1' : '&aacute;', \
              '\xe3' : '&atilde;', \
              '\xe4' : '&auml;', \
              '\xe6' : '&aelig;', \
              '\xe7' : '&ccedil;', \
              '\xe8' : '&egrave;', \
              '\xe9' : '&eacute;', \
              '\xed' : '&iacute;', \
              '\xf1' : '&ntilde;', \
              '\xf3' : '&oacute;', \
              '\xf6' : '&ouml;', \
              '\xf8' : '&oslash;', \
              '\xfa' : '&uacute;', \
              '\xfc' : '&uuml;' \
            }
# <9a> replaced with s
# <92> replaced with '

def replace_special_chars( text_in ):
    #print text_in
    text_out = ''
    for char in text_in:
        if char in REP_TABLE.keys():
            text_out += REP_TABLE[char]
        else:
            text_out += char
    return text_out



def auth_string( paper ):
    auth_list = [ ('%s %s'%(a['first'],a['last'])) for a in paper['authors']]
    return ', '.join(auth_list)


#OUT = open('prelim_program.php','w')
OUT = open('accepted_papers.php','w')



# Output the Header information
print >>OUT, '<?php\n    $which_page = "accepted_papers";\n\n    include(\'common_header.php\');\n?>'

print >>OUT, '<center>\n<table>\n<tr><td colspan="3" align="center" width="100%"><br><br><span class="cvprpageheader">Preliminary List of CVPR 2014 Accepted Papers</span><br><br></td></tr>\n<tr><td colspan="3">\n\n'

print >>OUT, '<center><span class="cvprparagraphheader">Statistics:</span> 1807 total submissions, 540 papers accepted (29.88%) with 104 as orals (5.76%).</center><br><br>\n\n'

print >>OUT, '<center><span class="boldred">The information below was derived from the CMT submissions.<br>Please email the <a href="http://www.google.com/recaptcha/mailhide/d?k=01BccXepDE5DWeIcShhX3Gkw==&amp;c=tsi3la0FnbK3DWfASusdpMn5LcBVDu1HNG94E6dTh-c=" onclick="window.open(\'http://www.google.com/recaptcha/mailhide/d?k\07501BccXepDE5DWeIcShhX3Gkw\75\75\46c\75tsi3la0FnbK3DWfASusdpMn5LcBVDu1HNG94E6dTh-c\075\', \'\', \'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300\'); return false;" title="Reveal this e-mail address">Website Chairs</a> with any needed<br>corrections, either to the titles or the authors.</span></center><br><br>\n\n'


print >>OUT, '<table cellpadding="2" width="100%">\n\n'


# Load the paper data (JSON)
PAPERS = json.load( open('input/accepted_papers.json','r') )
PIDs   = [ x['paper_id'] for x in PAPERS ]

# Now put in the corrections
UPDATES = sorted( json.load( open('input/author_updates.json','r') ), key = lambda update: update['paper_id'])
WITHDRAWN_MAP = {}

REPLACED = {}
for update in UPDATES:
    pid   = update['paper_id']
    index = PIDs.index(pid)

    if update.has_key('withdrawn'):
        WITHDRAWN_MAP[pid] = True
        print '%4d: PAPER WITHDRAWN' % (pid)
        continue

    OLD = PAPERS[index]
    REPLACED[pid] = OLD
    PAPERS[index] = update

    if not OLD['title'] == update['title']:
        print '%4d: TITLE CHANGED:   "%s" --> "%s"' % (pid,OLD['title'],update['title'])

    new_auths = auth_string(update)
    old_auths = auth_string(OLD)
    if not old_auths == new_auths:
        print '%4d: AUTHORS CHANGED: "%s" --> "%s"' % (pid,old_auths, new_auths)

print '%d papers replaced' % len(REPLACED)
print '%d papers withdrawn' % len(WITHDRAWN_MAP.keys())

PAPERS.append( {'paper_id':-1,'title':'Make3D: Learning 3D Scene Structure from a Single Still Image','authors':[{'first':'A','last':'Saxena'},{'first':'M','last':'Sun'},{'first':'AY','last':'Ng'}],'accepted_as':'oral'} )
PAPERS.append( {'paper_id':-2,'title':'Product quantization for nearest neighbor search','authors':[{'first':'H.','last':'Jegou'},{'first':'M.','last':'Douze'},{'first':'C.','last':'Schmid'}],'accepted_as':'oral'} )
PAPERS.append( {'paper_id':-3,'title':'The PASCAL Visual Object Classes (VOC) Challenge','authors':[{'first':'Mark','last':'Everingham'},{'first':'Luc','last':'Van Gool'}, {'first':'Christopher K. I.','last':'Williams'}, {'first':'John','last':'Winn'}, {'first':'Andrew','last':'Zisserman'} ],'accepted_as':'oral'} )
PAPERS.append( {'paper_id':-4,'title':'Convex and Semi-Nonnegative Matrix Factorizations','authors':[ {'first':'CHQ','last':'Ding'}, {'first':'T','last':'Li'}, {'first':'MI','last':'Jordan'} ],'accepted_as':'oral'} ) 
PAPERS.append( {'paper_id':-5,'title':'Robust face recognition via sparse representation','authors':[ {'first':'J.','last':'Wright'}, {'first':'A.Y.','last':'Yang'}, {'first':'A','last':'Ganesh'}, {'first':'S.S.','last':'Sastry'}, {'first':'Yi','last':'Ma'} ],'accepted_as':'oral'} ) 
PAPERS.append( {'paper_id':-6,'title':'Deep Learning with Hierarchical Convolutional Factor Analysis','authors':[ {'first':'Bo','last':'Chen'}, {'first':'Gungor','last':'Polatkan'}, {'first':'Guillermo','last':'Sapiro'}, {'first':'David','last':'Blei'}, {'first':'David','last':'Dunson'}, {'first':'Lawrence','last':'Carin'} ],'accepted_as':'oral'} ) 

def camera_ready_papers(UPDATED_PAPERS):
    PLIST = []
    for P in UPDATED_PAPERS:
        ID    = P['paper_id']
        TITLE = P['title']
        AUTHS = (', ').join(['%s %s' % (x['first'],x['last']) for x in P['authors']])
        PLIST.append( (ID,TITLE,AUTHS) )

    #PLIST.append( ('TPAMI 31(5) 2009','Make3D: Learning 3D Scene Structure from a Single Still Image','A Saxena, M Sun, AY Ng') )
    #PLIST.append( ('TPAMI 33(1) 2011','Product quantization for nearest neighbor search','H. Jegou, M. Douze, C. Schmid') )
    #PLIST.append( ('IJCV 88(2) 2010','The PASCAL Visual Object Classes (VOC) Challenge','Mark Everingham, Luc Van Gool, Christopher K. I. Williams, John Winn, Andrew Zisserman') )
    #PLIST.append( ('TPAMI 32(1) 2010','Convex and Semi-Nonnegative Matrix Factorizations','CHQ Ding, T Li, MI Jordan') )
    #PLIST.append( ('TPAMI 31(2) 2009','Robust face recognition via sparse representation','J. Wright, A.Y. Yang, A Ganesh, S.S. Sastry, Yi Ma') )
    #PLIST.append( ('TPAMI 35(8) 2013','Deep Learning with Hierarchical Convolutional Factor Analysis','Bo Chen, Gungor Polatkan, Guillermo Sapiro, David Blei, David Dunson, Lawrence Carin') )
    PLIST.append( (-1,'Make3D: Learning 3D Scene Structure from a Single Still Image','A Saxena, M Sun, AY Ng') )
    PLIST.append( (-2,'Product quantization for nearest neighbor search','H. Jegou, M. Douze, C. Schmid') )
    PLIST.append( (-3,'The PASCAL Visual Object Classes (VOC) Challenge','Mark Everingham, Luc Van Gool, Christopher K. I. Williams, John Winn, Andrew Zisserman') )
    PLIST.append( (-4,'Convex and Semi-Nonnegative Matrix Factorizations','CHQ Ding, T Li, MI Jordan') )
    PLIST.append( (-5,'Robust face recognition via sparse representation','J. Wright, A.Y. Yang, A Ganesh, S.S. Sastry, Yi Ma') )
    PLIST.append( (-6,'Deep Learning with Hierarchical Convolutional Factor Analysis','Bo Chen, Gungor Polatkan, Guillermo Sapiro, David Blei, David Dunson, Lawrence Carin') )

    CAMERA_READY_PAPER_MAP = { A[0]:A for A in PLIST }
    return CAMERA_READY_PAPER_MAP

def camera_ready_papers_old():
    CSVFILE = csv.reader(open('input/camera_ready_paper_details.csv','r'))
    PLIST = list()
    for l in CSVFILE:
        if l[2]=='AP':
            ID = int( l[0] )
            TITLE = replace_special_chars( l[3] ).replace('@',',')
            #AUTHS = [a.strip() for a in replace_special_chars( l[4] ).split('@')]
            AUTHS = replace_special_chars( l[4] ).replace('@',',').replace('_',' ')
            PLIST.append( (ID, TITLE, AUTHS) )
    CAMERA_READY_PAPER_MAP = { A[0]:A for A in PLIST }
    return CAMERA_READY_PAPER_MAP




def output_paper( paper, out_fp, shade_flag ):
    shade_str = 'bgcolor="#EEF9FF"' if shade_flag else 'bgcolor="#FFFFFF"'

    paper_id  = paper['paper_id']
    title     = paper['title']
    #auth_list = [ ('%s %s'%(a['first'],a['last'])) for a in paper['authors']]
    #print >>out_fp, '<tr valign="top" %s><td align="center">%d</td><td><b>%s</b><br><i>%s</i></td></tr>' % (shade_str, paper_id, title, ', '.join(auth_list) )
    print >>out_fp, '<tr valign="top" %s><td align="center">%d</td><td><b>%s</b><br><i>%s</i></td></tr>' % (shade_str, paper_id, title, auth_string(paper) )
    



CSVFILE = open('updated_papers.csv','w')
print >>CSVFILE, 'sep=#'

CSVWRITER = csv.writer(CSVFILE,dialect='excel',delimiter='#',quotechar='|',quoting=csv.QUOTE_MINIMAL)

for paper in PAPERS:
    if not WITHDRAWN_MAP.has_key(paper['paper_id']):
        auths = auth_string(paper)
        CSVWRITER.writerow( [paper['paper_id'],paper['title'],auths] )



# Output the Orals
print >>OUT, '<br>'
print >>OUT, '<center><span class="cvprsectionheader">Accepted for Oral Presentation</span><br><br>'
print >>OUT, '<table border="0" width="100%" cellpadding="2" cellspacing="0">'

print >>OUT, '<tr><td width="10%" align="center"><u><b>Paper ID</b></u></td>',
print >>OUT, '<td width="*" align="left"><u><b>Paper Title / <i>Authors</i></b></u></td></tr>'

ORALS   = [paper for paper in PAPERS if (paper['accepted_as'] == 'oral'   and not WITHDRAWN_MAP.has_key(paper['paper_id']))]
POSTERS = [paper for paper in PAPERS if (paper['accepted_as'] == 'poster' and not WITHDRAWN_MAP.has_key(paper['paper_id']))]

to_shade = 0
#for paper in PAPERS:
    #if paper['accepted_as'] == 'oral':
        #if not WITHDRAWN_MAP.has_key(paper['paper_id']):
            #output_paper( paper, out_fp=OUT, shade_flag=to_shade )
            #to_shade = not to_shade
for paper in ORALS:
    output_paper( paper, out_fp=OUT, shade_flag=to_shade )
    to_shade = not to_shade
print >>OUT, '</table>\n</center>'

print >>OUT, '<br><br><br><br>'

# Output the Posters
print >>OUT, '<center><span class="cvprsectionheader">Accepted for Poster Presentation</span><br><br>'
print >>OUT, '<table border="0" width="100%" cellpadding="2" cellspacing="0">'

print >>OUT, '<tr><td width="10%" align="center"><u><b>Paper ID</b></u></td>',
print >>OUT, '<td width="*" align="left"><u><b>Paper Title / <i>Authors</i></b></u></td></tr>'

#for paper in PAPERS:
    #if paper['accepted_as'] == 'poster':
        #if not WITHDRAWN_MAP.has_key(paper['paper_id']):
            #output_paper( paper, out_fp=OUT, shade_flag=to_shade )
            #to_shade = not to_shade
for paper in POSTERS:
    output_paper( paper, out_fp=OUT, shade_flag=to_shade )
    to_shade = not to_shade
print >>OUT, '</table>\n</center>'



print >>OUT, '</table>\n\n</td></tr>\n</table>\n</center>\n'
print >>OUT, '<?php\n    include(\'common_footer.php\');\n?>'

#exit()



################################################################################
#
#   Now produce the detailed program with schedule
#
################################################################################
#CAM_READY_PAPER_MAP = camera_ready_papers()
CAM_READY_PAPER_MAP = camera_ready_papers(PAPERS)

def paper_td( paper, shade_flag ):
    shade_str = 'bgcolor="#EEF9FF"' if shade_flag else 'bgcolor="#FFFFFF"'

    paper_id  = paper['paper_id']
    title     = paper['title']
    #auth_list = [ ('%s %s'%(a['first'],a['last'])) for a in paper['authors']]
    #print >>out_fp, '<tr valign="top" %s><td align="center">%d</td><td><b>%s</b><br><i>%s</i></td></tr>' % (shade_str, paper_id, title, ', '.join(auth_list) )
    CAM_READY = CAM_READY_PAPER_MAP[paper_id]
    print CAM_READY
    #OUTPUT = '<td %s class="cvprparagraphsmall"><b>%s</b><br><i>%s</i></td>' % (shade_str, title, auth_string(paper) )
    OUTPUT = '<td %s class="cvprparagraphsmall"><b>%s</b><br><i>%s</i></td>' % (shade_str, CAM_READY[1], CAM_READY[2])
    return OUTPUT

def dump_slot( slot_id, out_fp ):
    if SESSION_MAP.has_key(slot_id):
        ptable = {}
        si = 0
        pmax = 0
        #print >>out_fp,'<tr><td><table border="1"><tr>',
        print >>out_fp,'<tr>',
        for session in SESSION_MAP[slot_id]:
            ID_STR = 'Orals' if ('Oral' in slot_id) else ('Posters' if ('Poster' in slot_id) else ('Spotlights' if ('Spotlight' in slot_id) else ''))
            SESID = session['session_id'][2:]
            SSTRING = '%s %s - %s' % (ID_STR,SESID,session['session_name'])
            print >>out_fp, '<td width="50%%" align="center" bgcolor="#CCEEFF">%s</td>'%SSTRING
            pids = PIDS_BY_SESSION[session['session_id']]
            pmax = len(pids) if (len(pids) > pmax) else pmax
            pi = 0
            for ppp in pids:
                ptable[ (si,pi) ] = ppp
                pi += 1
            si += 1
        full_sched_shade = False
        print >>out_fp,'</tr>',
        for pid in range(pmax):
            print >>out_fp, '<tr valign="top">'
            for sid in range(si):
                if not ptable.has_key( (sid,pid) ):
                    print >>out_fp, '<td/>'
                else:
                    thep = ptable[ (sid,pid) ]
                    print >>out_fp, '%s' % paper_td(PAPER_MAP[thep],full_sched_shade)
            full_sched_shade = not full_sched_shade
            print >>out_fp, '</tr>'
        #print >>out_fp, '</table></td>'
        #print >>out_fp,'</tr>',



PAPER_MAP = {}
for p in PAPERS:
    PAPER_MAP[p['paper_id']] = p

J = json.load( open('input/session_schedule.json','r') )
SLOTS    = J['slots']
SESSIONS = J['sessions']



OSES = json.load( open('input/orals_with_sessions.json','r') )
OSES = [x for x in OSES if not WITHDRAWN_MAP.has_key(x['paper_id'])]
PSES = json.load( open('input/posters_with_sessions.json','r') )
PSES = [x for x in PSES if not WITHDRAWN_MAP.has_key(x['paper_id'])]

PIDS_BY_SESSION = {}

for paper in OSES:
    if not PIDS_BY_SESSION.has_key(paper['oral_session_id']):
        PIDS_BY_SESSION[paper['oral_session_id']] = list()
    PIDS_BY_SESSION[paper['oral_session_id']].append(paper['paper_id'])
for paper in PSES:
    if not PIDS_BY_SESSION.has_key(paper['poster_session_id']):
        PIDS_BY_SESSION[paper['poster_session_id']] = list()
    PIDS_BY_SESSION[paper['poster_session_id']].append(paper['paper_id'])
    #if not PIDS_BY_SESSION.has_key(paper['spotlight_session_id']):
        #PIDS_BY_SESSION[paper['spotlight_session_id']] = list()
    #PIDS_BY_SESSION[paper['spotlight_session_id']].append(paper['paper_id'])





#json.dump(PAPERS, open('foo.json','w'))




SESSION_MAP = {}
for session in SESSIONS:
    slot_id = session['session_slot']
    if not SESSION_MAP.has_key(slot_id):
        SESSION_MAP[slot_id] = list()
    SESSION_MAP[slot_id].append( session )

DATE_MAP = {}
SLOTS_BY_ID = {}
for slot in SLOTS:
    SLOTS_BY_ID[slot['slot_id']] = slot
    begin = time.strptime( slot['begin'], '%Y-%m-%dT%H:%M:%S' )
    slot['begin_tmstruct'] = begin
    slot['end_tmstruct'] = time.strptime( slot['end'],   '%Y-%m-%dT%H:%M:%S' )

    date      = '%s, %s'%(time.strftime('%A',begin).upper(),time.strftime('%B %d',begin))
    if not DATE_MAP.has_key(date):
        DATE_MAP[date] = list()
    #label   = slot['label']
    #slot_id = slot['slot_id']
    #str_begin = time.strftime('%H:%M', begin)
    #str_end   = time.strftime('%H:%M', end)
    #print '%s-%s\t[%s] - %s' % (str_begin,str_end,slot_id,label)
    DATE_MAP[date].append( slot )

for date in DATE_MAP.keys():
    # sort sessions
    slot_list = sorted(DATE_MAP[date], cmp=lambda x,y:cmp(x['begin_tmstruct'],y['begin_tmstruct']),reverse=False)
    DATE_MAP[date] = {'earliest_tmstruct':slot_list[0]['begin_tmstruct'],'list':slot_list}

sorted_keys = sorted( DATE_MAP.keys(), cmp=lambda x,y:cmp(DATE_MAP[x]['earliest_tmstruct'],DATE_MAP[y]['earliest_tmstruct']) )


SCHED = open('program.php','w')
print >>SCHED, '<?php\n    $which_page="program";\n    include(\'common_header.php\');\n?>\n'
#print >>SCHED, '<html><body>'
print >>SCHED, '<center><table border="0" width="760">'
#print >>SCHED, '<tr><td colspan="2" align="center" class="boldred">The author/title information below will shortly be updated to match that of the camera-ready submissions.<br/>Please contact the <a href="http://www.google.com/recaptcha/mailhide/d?k=010A0aJkKwz3EBPtpEe2G7ZA==&c=H4Xs_-FszUgorG-bKy8d3DOWKiNOW4zoG2c3bCkrEnA=">web chair</a> with any questions or inaccuracies.</td></tr>'
print >>SCHED, '<tr><td colspan="2" align="center" class="cvprpageheader"><br/>Official Program for CVPR 2014<br/></td></tr>'

for date in sorted_keys:
    print >>SCHED, '<tr><td colspan="2" align="center" class="cvprsectionheader"><br/><br/>%s<br/><br/></td></tr>' % date
    for slot in DATE_MAP[date]['list']:
        label   = slot['label']
        slot_id = slot['slot_id']
        str_begin = time.strftime('%H:%M', slot['begin_tmstruct'])
        str_end   = time.strftime('%H:%M', slot['end_tmstruct'])

        #print >>SCHED, '<tr><td colspan="2">%s-%s\t[%d in %s] - %s</td></tr>' % (str_begin,str_end,TOTALP,slot_id,label)
        #print >>SCHED, '<tr><td>%s-%s\t[%s] - %s</td><td>' % (str_begin,str_end,slot_id,label)
        print >>SCHED, '<tr valign="top"><td width="100" class="cvprparagraphheader">%s-%s</td><td class="cvprparagraphheader">%s</td></tr>' % (str_begin,str_end,slot['label'])
        #slot_str_list = list()
        if ('Orals' in slot_id or 'Spotlights' in slot_id or 'Posters' in slot_id):
            print >>SCHED, '<tr valign="top"><td colspan="2" align="right"><table border="1" width="740">'
            dump_slot( slot_id, out_fp=SCHED )
            print >>SCHED, '</table></td></tr>'
        #else:
            #print >>SCHED, '<tr><td>%s</td></tr>' % slot['label']
            #if SESSION_MAP.has_key(slot_id):
                #print >>SCHED,'<tr>',
                #for session in SESSION_MAP[slot_id]:
                    #full_sched_shade = False
                    #print >>SCHED, '<td><table border="1"><tr><td>[%s]</td></tr>'%session['session_id']
                    #for spaper in PIDS_BY_SESSION[session['session_id']]:
                        #print >>SCHED, '<tr>%s</tr>' % paper_td(PAPER_MAP[spaper],full_sched_shade)
                        #full_sched_shade = not full_sched_shade
                    #print >>SCHED, '</table></td>'
                #print >>SCHED,'</tr>',


        #slot_str = '<tr>'.join(slot_str_list)
        #print >>SCHED, '<tr><td rowspan="%d">%d-%s-%s\t[%s] - %s</td>%s</tr>' % (TOTALP,TOTALP,str_begin,str_end,slot_id,label,slot_str)
            #print ''
        print >>SCHED, '<tr><td>&nbsp;</td></tr>'



print >>SCHED, '</table></center>'
print >>SCHED, '<?php\n     include(\'common_footer.php\');\n?>'
#print >>SCHED, '</body></html>'
SCHED.close()


PAPER_INFO = {}
for date in sorted_keys:
    for slot in DATE_MAP[date]['list']:
        #if 'Posters' in slot_id:
        if SESSION_MAP.has_key(slot['slot_id']):
            for session in SESSION_MAP[slot['slot_id']]:
                paper_list = PIDS_BY_SESSION[session['session_id']]
                for paper_id in paper_list:
                    if not PAPER_INFO.has_key(paper_id):
                        PAPER_INFO[paper_id] = list()
                    PAPER_INFO[paper_id].append(session)

SESSION_STRS = {'O':'Orals','P':'Posters','S':'Spotlights'}
PLOOKUP = open('schedule_by_paperid.php','w')

print >>PLOOKUP, '<?php\n    $which_page = "program";\n    include(\'common_header.php\');\n?>'
print >>PLOOKUP, '<center>\n<table>\n<tr><td colspan="3" align="center" width="100%"><span class="cvprpageheader">Preliminary Presentation Schedule</span><br></td></tr>\n<tr><td colspan="3">\n\n'

def output_paper_set( paper_map, paperid_list, fp ):
    print >>fp, '<table cellspacing="0" cellpadding="4">\n<tr><td align="center"><u><b>Paper ID</b></u></td><td><u><b>Scheduled Session(s)</b></u></td><td><u><b>Session Date/Time(s)</b></u></td></tr>'
    shade_flag = False
    for paper in paperid_list:
        shade_flag = not shade_flag
        shade_str = 'bgcolor="#EEF9FF"' if shade_flag else 'bgcolor="#FFFFFF"'
        entries = paper_map[paper]
        slist = list()
        for session in entries:
            slot = SLOTS_BY_ID[session['session_slot']]
            session_title = '%s [%s %s]' % (session['session_name'],SESSION_STRS[session['session_id'][0]], \
                                            session['session_id'][2:])
            session_timing = '%s-%s' % (time.strftime('%A, %B %d, %H:%M',slot['begin_tmstruct']), \
                                       time.strftime('%H:%M',slot['end_tmstruct']))
            #print '%s (%s)'%(session_title,session_timing),
            slist.append( '%s</td><td>%s'%(session_title,session_timing) )
        print >>fp, '<tr valign="top" %s><td align="center">%s</td><td>%s</td></tr>' % (shade_str,paper,('</td></tr><tr valign="top" %s><td/><td>'%shade_str).join(slist))
    print >>fp, '</table>'

ORALIDS   = sorted( [p['paper_id'] for p in ORALS] )
POSTERIDS = sorted( [p['paper_id'] for p in POSTERS] )

print >>PLOOKUP, '<center><br><br><span class="cvprsectionheader">Accepted for Oral Presentation</span><br><br>'
output_paper_set( paper_map=PAPER_INFO, paperid_list=ORALIDS, fp=PLOOKUP )
print >>PLOOKUP, '</table><br><br>'

print >>PLOOKUP, '<center><br><br><span class="cvprsectionheader">Accepted for Poster Presentation</span><br><br>'
output_paper_set( paper_map=PAPER_INFO, paperid_list=POSTERIDS, fp=PLOOKUP )
print >>PLOOKUP, '</table><br><br>'


print >>PLOOKUP, '<?php\n    include(\'common_footer.php\');\n?>'
PLOOKUP.close()













