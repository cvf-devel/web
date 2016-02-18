#!/usr/bin/python
import json
import time

OUT = open('workshops.php','w')

with open('frags/workshops_start.html') as startfile:
    for line in startfile:
        print >>OUT, line,

print >>OUT, '\n\n'

four_col = False

print >>OUT, '<tr><td width="18%"><b>Date</b></td><td width="12%" align="center"><b>Location</b></td><td width=70%"><b>Workshop</b></td></tr>\n\n'

with open('input/workshop_info.json','r') as jsonfile:
    JSON = json.load( jsonfile )
    to_shade = True
    BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['workshop_info']['title'],y['workshop_info']['title']), reverse=False )
    BY_DATE = sorted( BY_NAME, cmp = lambda x,y: cmp(time.strptime(x['workshop_info']['workshop_date'],'%m/%d/%y'),time.strptime(y['workshop_info']['workshop_date'],'%m/%d/%y')), reverse=False )
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

        ws_date = ''
        if not info['workshop_date'] == '':
            if info['workshop_length'] == 'full-day':
                ws_date = info['workshop_date']
            elif info['workshop_length'] == 'am-half':
                ws_date = '%s <i>(AM only)</i>'% info['workshop_date']
            elif info['workshop_length'] == 'pm-half':
                ws_date = '%s <i>(PM only)</i>'% info['workshop_date']

        ws_loc = info['location']
        # sub_date = ''
        # if not info['submission_deadline'] == '':
        #     sub_date = info['submission_deadline']

        shade_str = 'bgcolor="#DDDDDD"' if to_shade else 'bgcolor="#FFFFFF"'
        to_shade = not to_shade

        print >>OUT, '<tr valign="top" %s><td>%s</td><td align="center">%s</td><td>%s</td></tr>' % (shade_str, ws_date, ws_loc, info_str)

print >>OUT, '\n\n'


with open('frags/workshops_end.html') as endfile:
    for line in endfile:
        print >>OUT, line,
