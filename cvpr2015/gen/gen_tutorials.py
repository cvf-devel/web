#!/usr/bin/python
import json
import time

OUT = open('tutorials.php','w')

with open('frags/tutorials_start.html') as startfile:
    for line in startfile:
        print >>OUT, line,

print >>OUT, '\n\n'

four_col = False

print >>OUT, '<tr><td width="12%" align="center"><b>Time</b></td><td width="12%" align="center"><b>Location</b></td><td width=74%"><b>Tutorial Title / Organizers</b></td></tr>\n\n'

with open('input/tutorial_info.json','r') as jsonfile:
    JSON = json.load( jsonfile )
    to_shade = True
    BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['tutorial_info']['title'],y['tutorial_info']['title']), reverse=False )
    BY_DATE = sorted( BY_NAME, cmp = lambda x,y: cmp(x['tutorial_info']['tutorial_length'],y['tutorial_info']['tutorial_length']), reverse=False )
    for tutorial in BY_DATE:
        info       = tutorial['tutorial_info']
        organizers = tutorial['tutorial_organizers']
        if not info['url']=="":
            info_str = '<a href="%s" target="_blank">%s</a>' % (info['url'],info['title'])
        else:
            info_str = '%s' % (info['title'])

        orglist = list()
        for org in organizers:
            if not org['url']=="":
                orglist.append( '<a href="%s" target="_blank">%s&nbsp;%s</a>' % (org['url'], org['first'], org['last']))
            else:
                orglist.append( '%s&nbsp;%s' % (org['first'], org['last']) )

        ws_date = ''
        if not info['tutorial_date'] == '':
            if info['tutorial_length'] == 'z-full-day':
                ws_date = 'full day' #info['tutorial_date']
            elif info['tutorial_length'] == 'am-half':
                ws_date = 'morning' #'%s <i>(AM only)</i>'% info['tutorial_date']
            elif info['tutorial_length'] == 'pm-half':
                ws_date = 'afternoon' #'%s <i>(PM only)</i>'% info['tutorial_date']

        ws_loc = info['location']
        # sub_date = ''
        # if not info['submission_deadline'] == '':
        #     sub_date = info['submission_deadline']

        shade_str = 'bgcolor="#DDDDDD"' if to_shade else 'bgcolor="#FFFFFF"'
        to_shade = not to_shade

        print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td align="center">%s</td><td><b>%s</b><br><i>Organizers: %s</i></td></tr>' % (shade_str, ws_date, ws_loc, info_str, ', '.join(orglist))

print >>OUT, '\n\n'


with open('frags/tutorials_end.html') as endfile:
    for line in endfile:
        print >>OUT, line,
