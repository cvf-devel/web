#!/usr/bin/python

import json
import time



def paper_row( paper, shade_flag ):
    shade_str = 'bgcolor="#DDDDDD"' if shade_flag else 'bgcolor="#FFFFFF"'

    paper_id  = paper['paper_id']
    title     = paper['title']
    #auth_list = [ ('%s %s'%(a['first'],a['last'])) for a in paper['authors']]
    #print >>out_fp, '<tr valign="top" %s><td align="center">%d</td><td><b>%s</b><br><i>%s</i></td></tr>' % (shade_str, paper_id, title, ', '.join(auth_list) )
    OUTPUT = '<tr valign="top" %s><td align="center">%d</td><td><b>%s</b><br><i>%s</i></td></tr>' % (shade_str, paper_id, title, auth_string(paper) )
    return OUTPUT





J = json.load( open('input/session_schedule.json','r') )
SLOTS    = J['slots']
SESSIONS = J['sessions']

ORALS   = json.load( open('input/orals_with_sessions.json','r') )
POSTERS = json.load( open('input/posters_with_sessions.json','r') )

WITHDRAWN = [1903]
PAPERS_BY_SESSION = {}

ORALS = [x for x in ORALS if (not x['paper_id'] in WITHDRAWN)]
for paper in ORALS:
    if not PAPERS_BY_SESSION.has_key(paper['oral_session_id']):
        PAPERS_BY_SESSION[paper['oral_session_id']] = list()
    PAPERS_BY_SESSION[paper['oral_session_id']].append(paper['paper_id'])

POSTERS = [x for x in POSTERS if (not x['paper_id'] in WITHDRAWN)]
for paper in POSTERS:
    if not PAPERS_BY_SESSION.has_key(paper['poster_session_id']):
        PAPERS_BY_SESSION[paper['poster_session_id']] = list()
    PAPERS_BY_SESSION[paper['poster_session_id']].append(paper['paper_id'])
    if not PAPERS_BY_SESSION.has_key(paper['spotlight_session_id']):
        PAPERS_BY_SESSION[paper['spotlight_session_id']] = list()
    PAPERS_BY_SESSION[paper['spotlight_session_id']].append(paper['paper_id'])

ALL_PAPERS = {}
for i in ORALS.keys():
    ALL_PAPERS[i] = ORALS[i]
for i in POSTERS.keys():
    ALL_PAPERS[i] = POSTERS[i]


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

SCHED = open('schedule.php','w')
#print >>SCHED, '<?php\n    $which_page="program";\n    include(\'frags/common_header.php\');\n?>\n'
print >>SCHED, '<html><body>'
print >>SCHED, '<center><table border="1" width="800">'
for date in sorted_keys:
    print >>SCHED, '<tr><td colspan="3" align="center"><br/>%s<br/></td></tr>' % date
    for slot in DATE_MAP[date]['list']:
        label   = slot['label']
        slot_id = slot['slot_id']
        str_begin = time.strftime('%H:%M', slot['begin_tmstruct'])
        str_end   = time.strftime('%H:%M', slot['end_tmstruct'])

        # Count number of entries in session
        #TOTALP = 0
        #if SESSION_MAP.has_key(slot_id):
            #for session in SESSION_MAP[slot_id]:
                #TOTALP += len(PAPERS_BY_SESSION[session['session_id']]) + 1
        #else:
            #TOTALP = 1

        #print >>SCHED, '<tr><td colspan="2">%s-%s\t[%d in %s] - %s</td></tr>' % (str_begin,str_end,TOTALP,slot_id,label)
        print >>SCHED, '<tr><td>%s-%s\t[%s] - %s</td><td>' % (str_begin,str_end,slot_id,label)
        print >>SCHED, '<table>'
        #slot_str_list = list()
        if 'Posters' in slot_id:
            if SESSION_MAP.has_key(slot_id):
                session_list = list()
                paper_list = list()
                for session in SESSION_MAP[slot_id]:
                    session_list.append( session['session_id'] )
                    paper_list.extend( PAPERS_BY_SESSION[session['session_id']] )
                print >>SCHED, '<tr><td><table><tr><td>[%s]</td></tr>%s\n</td></tr></table></td></tr>'  % (', '.join(session_list),', '.join([paper_row(ALL_PAPERS[p],False) for p in paper_list]))
                #print >>SCHED, '<tr><td/><td>  [%s]: %s</td></tr>'  % (', '.join(session_list),', '.join(['%d'%p for p in paper_list]))
                #slot_str_list.append( '<td>  [%s]: %s</td></tr>'  % (', '.join(session_list),', '.join(['%d'%p for p in paper_list])) )
        else:
            if SESSION_MAP.has_key(slot_id):
                #print '[',
                #for session in SESSION_MAP[slot_id]:
                    #print '%s' % session['session_id'],
                #print ']',
                for session in SESSION_MAP[slot_id]:
                    paper_list = PAPERS_BY_SESSION[session['session_id']]
                    #print >>SCHED, '<tr><td/><td>  [%s]: %s</td></tr>'  % (session['session_id'],', '.join(['%d'%p for p in paper_list]))
                    print >>SCHED, '<tr><td>[%s]</td></tr>\n%s'  % (session['session_id'],'\n'.join(['  <tr><td colspan="2">%d</td></tr>'%p for p in paper_list]))
                    #slot_str_list.append( '<td>[%s]</td></tr>\n%s'  % (session['session_id'],'\n'.join(['  <tr><td colspan="2">%d</td></tr>'%p for p in paper_list])) )

        #slot_str = '<tr>'.join(slot_str_list)
        #print >>SCHED, '<tr><td rowspan="%d">%d-%s-%s\t[%s] - %s</td>%s</tr>' % (TOTALP,TOTALP,str_begin,str_end,slot_id,label,slot_str)
            #print ''
        #print >>SCHED, '</td></tr>
        print >>SCHED, '</table>'



print >>SCHED, '</table></center>'
#print >>SCHED, '<?php\n     include(\'frags/common_footer.php\');\n?>'
print >>SCHED, '</body></html>'
SCHED.close()


PAPER_INFO = {}
for date in sorted_keys:
    for slot in DATE_MAP[date]['list']:
        #if 'Posters' in slot_id:
        if SESSION_MAP.has_key(slot['slot_id']):
            for session in SESSION_MAP[slot['slot_id']]:
                paper_list = PAPERS_BY_SESSION[session['session_id']]
                for paper_id in paper_list:
                    if not PAPER_INFO.has_key(paper_id):
                        PAPER_INFO[paper_id] = list()
                    PAPER_INFO[paper_id].append(session)

SESSION_STRS = {'O':'Orals','P':'Posters','S':'Spotlights'}
PLOOKUP = open('schedule_by_paperid.php','w')

print >>PLOOKUP, '<?php\n    $which_page = "program";\n    include(\'frags/common_header.php\');\n?>' 
print >>PLOOKUP, '<center>\n<table>\n<tr><td colspan="3" align="center" width="100%"><span class="cvprpageheader">Preliminary Presentation Schedule</span><br></td></tr>\n<tr><td colspan="3">\n\n'


def output_paper_set( paper_map, paperid_list, fp ):
    print >>fp, '<table cellspacing="0" cellpadding="4">\n<tr><td align="center"><u><b>Paper ID</b></u></td><td><u><b>Scheduled Session(s)</b></u></td><td><u><b>Session Date/Time(s)</b></u></td></tr>'
    shade_flag = False
    for paper in paperid_list:
        shade_flag = not shade_flag
        shade_str = 'bgcolor="#DDDDDD"' if shade_flag else 'bgcolor="#FFFFFF"'
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


print >>PLOOKUP, '<?php\n    include(\'frags/common_footer.php\');\n?>' 
PLOOKUP.close()
