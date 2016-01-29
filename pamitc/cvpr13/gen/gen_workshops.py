#!/usr/bin/python
#import csv
import json
import time

#with open('input/accepted_workshops.csv','r') as csvfile:
    #reader = csv.reader(csvfile)
    #for row in reader:
        #if not row[0] == '':
            #print '<tr><td>%s</td><td>%s %s</a></td></tr>' % (row[3],row[0],row[1])

OUT = open('workshops.php','w')

with open('frags/start_workshops.html') as startfile:
    for line in startfile:
        print >>OUT, line,

print >>OUT, '\n\n'

four_col = False

if four_col:
    print >>OUT, '<tr><td width="10%" align="center"><b>Date</b></td><td width="50%"><b>Workshop Title</b></td><td width="30%"><b>Organizer Contact</b></td><td width="10%"><b>Submission</b></td></tr>\n\n'
else:
    print >>OUT, '<tr><td width="10%" align="center"><u><b>Date</b></u></td><td width="*"><u><b>Workshop Title / Organizers</b></u></td><td width="10%"><u><b>Submission</b></u></td></tr>\n\n'

with open('input/workshop_info.json','r') as jsonfile:
    JSON = json.load( jsonfile )
    to_shade = True
    BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['workshop_info']['title'],y['workshop_info']['title']), reverse=False )
    BY_DATE = sorted( BY_NAME, cmp = lambda x,y: cmp(time.strptime(x['workshop_info']['workshop_date'],'%m/%d/%y'),time.strptime(y['workshop_info']['workshop_date'],'%m/%d/%y')), reverse=False )
    for workshop in BY_DATE:
        info       = workshop['workshop_info']
        organizers = workshop['workshop_organizers']
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
        if not info['workshop_date'] == '':
            ws_date = info['workshop_date']

        sub_date = ''
        if not info['submission_deadline'] == '':
            sub_date = info['submission_deadline']

        shade_str = 'bgcolor="#DDDDDD"' if to_shade else 'bgcolor="#FFFFFF"'
        to_shade = not to_shade
        if four_col:
            print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td>%s</td><td>%s</td><td align="center">%s</td></tr>' % (shade_str, ws_date, info_str, ', '.join(orglist), sub_date )
        else:
            print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td><b>%s</b><br><i>Organizers: %s</i></td><td align="center">%s</td></tr>' % (shade_str, ws_date, info_str, ', '.join(orglist), sub_date )

print >>OUT, '\n\n'


with open('frags/end_workshops.html') as endfile:
    for line in endfile:
        print >>OUT, line,

