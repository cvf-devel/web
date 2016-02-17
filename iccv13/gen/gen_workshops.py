#!/usr/bin/python
#import csv
import json
import time


def dump_start( fp ):
    print >>fp, '<?php\n     $which_page = "workshops";\n     include(\'frags/common_header.php\');\n?>'
    print >>fp, '\n'

    print >>fp, '<table>\n<tr><td colspan="3" align="center"><h2>ICCV 2013 Accepted Workshops</h2><br/><br/>Organizers, please contact <a href="http://www.google.com/recaptcha/mailhide/d?k=01dWLb3jj9XNr5b6NtY-9tKw==&c=fku1_6PuLNW2yDA61h1j4MH_nGDhQEodkkZE4vqSlAE=" target="_blank">Ryan Farrell</a> with needed updates. </td></tr>'
    print >>fp, '<tr><td colspan="3" align="center"><br/><br/>Submit camera-ready papers <a href="http://www.ieeeconfpublishing.org/cpir/authorKit.asp?Facility=CPS_Dec&ERoom=ICCVW+2013" target="_blank">here</a>.</td></tr>'
    print >>fp, '<tr><td colspan="3">\n<table cellspacing="0" cellpadding="2" width="100%">'



def dump_end( fp ):
    print >>fp, '<?php\n    include(\'frags/common_footer.php\');    \n?>'
    print >>fp, '\n'



OUT = open('workshops.php','w')

dump_start( OUT )

#print >>OUT, '\n\n'

four_col = False

if four_col:
    print >>OUT, '<tr><td width="10%" align="center"><b>Date</b></td><td width="50%"><b>Workshop Title</b></td><td width="30%"><b>Organizer Contact</b></td><td width="10%"><b>Submission</b></td></tr>\n\n'
else:
    print >>OUT, '<tr><td width="10%" align="center"><u><b>Date</b></u></td><td width="*"><u><b>Workshop Title / Organizers</b></u></td><td width="10%"><u><b>Submission</b></u></td></tr>\n\n'

def date_cmp( x, y ):
    dx = time.strptime(x['workshop_info']['workshop_date'],'%m/%d/%y')
    dy = time.strptime(y['workshop_info']['workshop_date'],'%m/%d/%y')
    if dx == dy:
        return cmp( x['workshop_info']['workshop_length'], y['workshop_info']['workshop_length'] )
    else:
        return cmp(dx,dy)

with open('input/workshop_info.json','r') as jsonfile:
    JSON = json.load( jsonfile )
    to_shade = True
    #BY_NAME = JSON
    BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['workshop_info']['title'],y['workshop_info']['title']), reverse=False )
    BY_DATE = sorted( BY_NAME, cmp = lambda x,y: date_cmp(x,y), reverse=False )
    for workshop in BY_DATE:
    #for workshop in BY_NAME:
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
            if info['workshop_length'] == 'full-day':
                ws_date = info['workshop_date']
            elif info['workshop_length'] == 'am-half':
                ws_date = '%s</br><i>(AM only)</i>'% info['workshop_date']
            elif info['workshop_length'] == 'pm-half':
                ws_date = '%s</br><i>(PM only)</i>'% info['workshop_date']

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


dump_end( OUT )

