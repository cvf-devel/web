#!/usr/bin/python
import json
import time
import datetime

OUT = open('tutorials.php','w')

with open('frags/tutorials_start.html') as startfile:
    for line in startfile:
        print >>OUT, line,

print >>OUT, '\n\n'

four_col = False

DAYS = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']

with open('input/tutorial_info.json','r') as jsonfile:
    JSON = json.load( jsonfile )
    to_shade = True
    BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['tutorial_info']['title'],y['tutorial_info']['title']), reverse=False )
    BY_DAY = sorted( BY_NAME, cmp = lambda x,y: cmp(x['tutorial_info']['tutorial_length'],y['tutorial_info']['tutorial_length']), reverse=False )
    BY_DATE = sorted( BY_DAY, cmp = lambda x,y: cmp(x['tutorial_info']['tutorial_date'],y['tutorial_info']['tutorial_date']), reverse=False )
    last_day = None
    for tutorial in BY_DATE:
        info       = tutorial['tutorial_info']
        #print '\n%s'%info
        #print info['tutorial_date']
        if not last_day or not info['tutorial_date'] == last_day:
            if last_day:
                print >>OUT, '<tr valign="top"><td align="center" colspan="3">&nbsp;</td><tr>' # extra blank line

            dparts = [int(x) for x in info['tutorial_date'].split('/')]
            daystring = DAYS[datetime.date(dparts[2],dparts[0],dparts[1]).weekday()]
            #print '<tr valign="top"><td align="center" colspan="3">&nbsp;<br/>%s %s</td><tr>' % (daystring,info['tutorial_date'])
            print >>OUT, '<tr valign="top"><td align="center" colspan="3">&nbsp;<br/><span class="iccvsectionheader">%s (%s)</span></td><tr>' % (daystring,info['tutorial_date'])
            print >>OUT, '<tr><td width="12%" align="center"><b>Time</b></td><td width="12%" align="center"><b>Location</b></td><td width=74%"><b>Tutorial Title / Organizers</b></td></tr>\n\n'
        last_day = info['tutorial_date']

        # organizers = tutorial['tutorial_organizers']
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
        if info.has_key('tutorial_times'):
            ws_date = '%s<br/>'%info['tutorial_times']
        #if info['tutorial_date'] == '':
        #print info['tutorial_length']
        if info['tutorial_length'] == 'full':
            #ws_date = info['tutorial_date']
            #ws_date = ''
                ws_date = '%s'%info['tutorial_times'] if info.has_key('tutorial_times') else ''
        elif info['tutorial_length'] in ['half','am-half','half-am']:
            #ws_date = '%s<br/><i>(AM only)</i>'% info['tutorial_date']
            #ws_date = '<i>(AM only)</i>'
                ws_date += '<font color="#7F7F7F"><i>(AM only)</i></font>'
        elif info['tutorial_length'] in ['pm-half','half-pm']:
            #ws_date = '%s<br/><i>(PM only)</i>'% info['tutorial_date']
            #ws_date = '<i>(PM only)</i>'
                ws_date += '<font color="#7F7F7F"><i>(PM only)</i></font>'
        #print ws_date


        ws_parts = info['location'].split('-')
        htl = ws_parts[0]
        rm  = ws_parts[1]
        if htl == 'Marriott':
            ws_loc = 'Marriott<br/><i>%s</i>'%rm
            loc_shade_str = 'bgcolor="#BBBBDD"' if to_shade else 'bgcolor="#DDDDFF"'
        elif htl == 'Grand Hyatt':
            ws_loc = 'Grand Hyatt<br/><i>%s</i>'%rm
            loc_shade_str = 'bgcolor="#DDBBBB"' if to_shade else 'bgcolor="#FFDDDD"'
        elif 'Courtyard' in htl:
            ws_loc = 'Courtyard<br/><i>%s</i>'%rm
            loc_shade_str = 'bgcolor="#BBDDBB"' if to_shade else 'bgcolor="#DDFFDD"'
        # sub_date = ''
        # if not info['submission_deadline'] == '':
        #     sub_date = info['submission_deadline']

        shade_str = 'bgcolor="#DDDDDD"' if to_shade else 'bgcolor="#FFFFFF"'
        to_shade = not to_shade

        print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td align="center" %s>%s</td><td><b>%s</b><br><i>Organizers: %s</i></td></tr>' % (shade_str, ws_date, loc_shade_str,ws_loc, info_str, orglist)

print >>OUT, '\n\n'


with open('frags/tutorials_end.html') as endfile:
    for line in endfile:
        print >>OUT, line,
