#!/usr/bin/python
import json
import time
import datetime
import codecs

#OUT = open('workshops.php','w')
OUT = codecs.open('workshops.php',encoding='utf-8',mode='w+')

with open('frags/workshops_start.html') as startfile:
    for line in startfile:
        print >>OUT, line,

print >>OUT, '\n\n'

four_col = False


DAYS = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']


with open('input/workshop_info.json','r') as jsonfile:
    JSON = json.load( jsonfile )
    to_shade = True
    BY_NAME = sorted( JSON, cmp = lambda x,y: cmp(x['workshop_info']['title'],y['workshop_info']['title']), reverse=False )
    BY_DAY = sorted( BY_NAME, cmp = lambda x,y: cmp(x['workshop_info']['workshop_length'],y['workshop_info']['workshop_length']), reverse=False )
    BY_DATE = sorted( BY_DAY, cmp = lambda x,y: cmp(x['workshop_info']['workshop_date'],y['workshop_info']['workshop_date']), reverse=False )
    last_day = None
    for workshop in BY_DATE:
        info       = workshop['workshop_info']
        # organizers = workshop['workshop_organizers']
        if not info['url']=="":
            info_str = '<a href="%s" target="_blank">%s</a>' % (info['url'],info['title'])
        else:
            info_str = '%s' % (info['title'])

        if not last_day or not info['workshop_date'] == last_day:                                                                    
            if last_day:
                print >>OUT, '<tr valign="top"><td align="center" colspan="3">&nbsp;</td><tr>' # extra blank line

            dparts = [int(x) for x in info['workshop_date'].split('/')]
            daystring = DAYS[datetime.date(dparts[2],dparts[0],dparts[1]).weekday()]
            #print '<tr valign="top"><td align="center" colspan="3">&nbsp;<br/>%s %s</td><tr>' % (daystring,info['tutorial_date'])
            print >>OUT, '<tr valign="top"><td align="center" colspan="3">&nbsp;<br/><span class="iccvsectionheader">%s (%s)</span></td><tr>' % (daystring,info['workshop_date'])
            print >>OUT, '<tr><td width="12%" align="center"><b>Time</b></td><td width="12%" align="center"><b>Location</b></td><td width=74%"><b>Workshop Title / Organizers</b></td></tr>\n\n'
        last_day = info['workshop_date']       

        # orglist = list()
        # for org in organizers:
        #     if not org['url']=="":
        #         orglist.append( '<a href="%s" target="_blank">%s&nbsp;%s</a>' % (org['url'], org['first'], org['last']))
        #     else:
        #         orglist.append( '%s&nbsp;%s' % (org['first'], org['last']) )

        orglist = info['organizers'];
        
        ws_date = ''
        if info.has_key('workshop_times'):
            ws_date = '%s<br/>'%info['workshop_times']
        #if info['workshop_date'] == '':
        if info['workshop_length'] == 'full':
            if not info['workshop_date'] == '':
                #ws_date = info['workshop_date']
                ws_date = '%s'%info['workshop_times'] if info.has_key('workshop_times') else ''
            else:
                ws_date = 'full day' #info['workshop_date']
        elif info['workshop_length'] in ['half','am-half','half-am']:
            if not info['workshop_date'] == '':
                #ws_date = '%s <i>(AM only)</i>'% info['workshop_date']
                ws_date += '<font color="#7F7F7F"><i>(AM only)</i></font>'
            else:
                ws_date = 'half day' #'%s <i>(AM only)</i>'% info['workshop_date']
        elif info['workshop_length'] in ['pm-half','half-pm']:
            if not info['workshop_date'] == '':
                #ws_date = '%s <i>(PM only)</i>'% info['workshop_date']
                ws_date += '<font color="#7F7F7F"><i>(PM only)</i></font>'
            else:
                ws_date = 'afternoon' #'%s <i>(PM only)</i>'% info['workshop_date']

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

        #print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td align="center">%s</td><td><b>%s</b><br><i>Organizers: %s</i></td></tr>' % (shade_str, ws_date, ws_loc, info_str, orglist)
        print >>OUT, '<tr valign="top" %s><td align="center">%s</td><td align="center" %s>%s</td><td><b>%s</b><br><i>Organizers: %s</i></td></tr>' % (shade_str, ws_date, loc_shade_str,ws_loc, info_str, orglist)


print >>OUT, '\n\n'


with open('frags/tutorials_end.html') as endfile:
    for line in endfile:
        print >>OUT, line,
