#!/usr/bin/python
#import csv
import json
import time

#with open('input/accepted_workshops.csv','r') as csvfile:
    #reader = csv.reader(csvfile)
    #for row in reader:
        #if not row[0] == '':
            #print '<tr><td>%s</td><td>%s %s</a></td></tr>' % (row[3],row[0],row[1])

OUT = open('tutorials.php','w')

with open('frags/start_tutorials.html') as startfile:
    for line in startfile:
        print >>OUT, line,

print >>OUT, '\n\n'

three_col = False

if three_col:
    print >>OUT, '<tr><td width="10%" align="center"><b>Date</b></td><td width="50%"><b>Tutorial Title</b></td><td width="30%"><b>Organizers</b></td></tr>\n\n'
else:
    print >>OUT, '<tr><td width="10%" align="center"><u><b>Date</b></u></td><td width="*"><u><b>Tutorial Title / Organizers</b></u></td></tr>\n\n'

with open('input/tutorial_info.json','r') as jsonfile:
    JSON = json.load( jsonfile )
    to_shade = True
    BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['tutorial_info']['title'],y['tutorial_info']['title']), reverse=False )
    BY_TIME = sorted( BY_NAME, cmp = lambda x,y: cmp(x['tutorial_info']['tutorial_length'],y['tutorial_info']['tutorial_length']), reverse=False )
    BY_DATE = sorted( BY_TIME, cmp = lambda x,y: cmp(time.strptime(x['tutorial_info']['tutorial_date'],'%m/%d/%y'),time.strptime(y['tutorial_info']['tutorial_date'],'%m/%d/%y')), reverse=False )
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
            ws_date = info['tutorial_date']

        if (info['tutorial_length'] == 'am-half'):
            ws_date += '<br><i>(AM Only)</i>'
        elif (info['tutorial_length'] == 'pm-half'):
            ws_date += '<br><i>(PM Only)</i>'

        shade_str = 'bgcolor="#DDDDDD"' if to_shade else 'bgcolor="#FFFFFF"'
        to_shade = not to_shade
        if three_col:
            print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td>%s</td><td>%s</td></tr>' % (shade_str, ws_date, info_str, ', '.join(orglist) )
        else:
            print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td><b>%s</b><br><i>Organizers: %s</i></td></tr>' % (shade_str, ws_date, info_str, ', '.join(orglist) )

print >>OUT, '\n\n'


with open('frags/end_tutorials.html') as endfile:
    for line in endfile:
        print >>OUT, line,

