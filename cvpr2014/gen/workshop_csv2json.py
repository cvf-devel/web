#!/usr/bin/python
import csv
import json

JSON = list()
with open('input/accepted_workshops.csv','r') as csvfile:
    reader = csv.reader(csvfile)
    for row in reader:
        if not row[0] == '':
            olist = list()
            olist.append({'first':'','last':'','url':''})
            winfo = {'title':row[0],'url':'','submission_deadline':'','workshop_date':row[1] }
            JSON.append( {'workshop_info':winfo,'workshop_organizers':olist} )
            #print '<tr><td>%s</td><td>%s %s</a></td></tr>' % (row[3],row[0],row[1])

print json.dumps(JSON, sort_keys=True, indent=2, separators=(',', ': '))
