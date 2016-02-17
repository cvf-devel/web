#!/usr/bin/python
#import csv
import json
import math


def format_secondary( secondary_string ):
    str_2ndary = ''
    parts = secondary_string.split(';')
    #print '%s'  % secondary_string
    #print '%s'  % parts
    first_keys = {}
    second_list = {}
    for p in parts:
        pp = p.strip();
        #print 'pp="%s"'  % pp,
        if '#' in p:
            pparts = pp.split('#')
            first = pparts[0].strip()
            second = pparts[1].strip()
        else:
            first = pp
            second = None
        #print ', first="%s",second="%s"' % (first, second)
        if not first_keys.has_key(first):
            first_keys[first] = 1
            second_list[first] = list()
        if second:
            second_list[first].append(second)

    lists = list()
    #print '%s' % first_keys
    for key in sorted(first_keys.keys()):
        #print '%s'  % key
        if len(second_list[key]) > 0:
            lists.append( '<b>%s</b> (%s)' % (key, (', ').join(second_list[key])) )
        else:
            lists.append( '<b>%s</b>' % key )
    str_2ndary = ('<br>').join(lists)
    #print '%s' % str_2ndary
    return str_2ndary


#with open('input/accepted_workshops.csv','r') as csvfile:
    #reader = csv.reader(csvfile)
    #for row in reader:
        #if not row[0] == '':
            #print '<tr><td>%s</td><td>%s %s</a></td></tr>' % (row[3],row[0],row[1])

OUT = open('people.php','w')
OUT_PROFILES = open('ac_profiles.php','w')

with open('frags/start_people.html') as startfile:
    for line in startfile:
        print >>OUT, line,
print >>OUT, '\n\n'

with open('frags/start_ac_profiles.html') as startfile2:
    for line in startfile2:
        print >>OUT_PROFILES, line,
print >>OUT_PROFILES, '\n\n'


#with open('input/people_info.json','r') as jsonfile:
with open('input/people_info_detailed.json','r') as jsonfile:
    JSON = json.load( jsonfile )

    # Top level table
    print >>OUT, '<table border="0"><tr><td valign="top">'
    print >>OUT_PROFILES, '<table border="0"><tr><td valign="top">'

    # Non-AC table
    print >>OUT, '<table border="0" cellpadding="0">'

    # Now do all non-AC groups
    for group in JSON:
        name   = group['group']
        if name == "Area Chairs":
            continue
        people = group['people']

        if group.has_key('email_link'):
            print >>OUT, '<tr><td valign="top"><div class="paragraph" style="text-align:left;"><strong style="">%s</strong> (<a href="%s" target="_blank">email</a>)<strong style="">:</strong>&nbsp;</div></td>' % (name, group['email_link']),
        elif group.has_key('url'):
            print >>OUT, '<tr><td valign="top"><div class="paragraph" style="text-align:left;"><strong style=""><a href="%s" target="_blank">%s</a></strong></div></td>' % (group['url'], name),
        else:
            print >>OUT, '<tr><td valign="top"><div class="paragraph" style="text-align:left;"><strong style="">%s:&nbsp;</strong></div></td>' % name,
		
		
		
        chairlist = list()
        for person in people:
            if not person['url']=="":
                chairlist.append( '<a href="%s" target="_blank">%s&nbsp;%s</a>' % (person['url'], person['first'], person['last']))
            else:
                chairlist.append( '%s&nbsp;%s' % (person['first'], person['last']) )

        print >>OUT, '<td width="20"/>'
        print >>OUT, '<td valign="top"><div class="paragraph">%s</div></td></tr>' % ('<br> '.join(chairlist))


    # Now switch for AC Group
    print >>OUT, '</table></td><td width="100"/><td valign="top"><table border="0" cellpadding="0">'
    print >>OUT_PROFILES, '<table border="0" cellpadding="0">'

    # Now do AC Group
    for group in JSON:
        name   = group['group']
        if name == "Area Chairs":
            people = group['people']

            print >>OUT, '<tr><td valign="top"><div class="paragraph" style="text-align:left;"><strong style="">%s:&nbsp;</strong></div></td>' % name,
            print >>OUT, '<td width="20"/>'

            aclist = list()
            for person in people:
                if not person['url']=="":
                    aclist.append( '<a href="%s" target="_blank">%s&nbsp;%s</a>' % (person['url'], person['first'], person['last']))
                else:
                    aclist.append( '%s&nbsp;%s' % (person['first'], person['last']) )

            print >>OUT, '<td valign="top"><div class="paragraph">%s</div></td>' % ('<br> \n'.join(aclist[0:int(len(aclist)/2.0)]))
            print >>OUT, '<td width="20"/>'
            print >>OUT, '<td valign="top"><div class="paragraph">%s</div></td></tr>' % ('<br> \n'.join(aclist[int(len(aclist)/2.0):]))

            #print >>OUT_PROFILES, '<tr><td><b>Area</b></td><td>Chair Name</td><td>DBLP</td><td>Google Scholar/Microsoft Academic</td><td>Secondary Suject Areas</td></tr>'
            AREAS = {}
            for person in people:
                if not AREAS.has_key(person['primary-subject-area']):
                    AREAS[person['primary-subject-area']] = list()
                AREAS[person['primary-subject-area']].append( person )

            for area in sorted(AREAS.keys()):
                print >>OUT_PROFILES, '<tr><td colspan="5"><br><u>Primary Subject Area: </u><span class="iccvparagraphheader"><u>%s</u></span></td></tr>' % area
                area_experts = AREAS[area]
                for person in area_experts:
                    print >>OUT_PROFILES, '<tr><td>&nbsp;</td></tr>'
                    print >>OUT_PROFILES, '<tr valign="top"><td width="25" align="right">&nbsp;</td><td>&bull;&nbsp;<a href="%s" target="_blank">%s&nbsp;%s</a></td>' % (person['url'],person['first'], person['last'])
                    print >>OUT_PROFILES, '<td align="center"><a href="%s" target="_blank">&nbsp;&nbsp;[DBLP]</a></td>' % person['dblp-url'],
                    print >>OUT_PROFILES, '<td align="center"><a href="%s" target="_blank">&nbsp;&nbsp;[%s]&nbsp;&nbsp;</a></td>' % ( person['google-microsoft-url'], \
                        'Google&nbsp;Scholar' if person['google-microsoft-url'].startswith('http://scholar.google') else 'Microsoft&nbsp;Academic')
                    #if person['secondary-subject-areas']:
                    if not person['secondary-subject-areas'] == 'None':
                        secondary_areas = format_secondary( person['secondary-subject-areas'] )
                        print >>OUT_PROFILES, '<td><u>Secondary Subject Areas:</u><br><i>%s</i></td>' % secondary_areas,
                    else:
                        print >>OUT_PROFILES, '<td><u>Secondary Subject Areas:</u> <i>None</i></td>'
                    print >>OUT_PROFILES, '</tr>'

                # Print a blank separator between areas
                print >>OUT_PROFILES, '<tr><td colspan="5">&nbsp;</td></tr>'

    # Finish AC Group, add the reviewers, and finish top-level table
    print >>OUT, '</table></td></tr>'
    print >>OUT, '</table>'
    print >>OUT_PROFILES, '</table></td></tr></table>'




print >>OUT, '\n\n'
print >>OUT_PROFILES, '\n\n'


with open('frags/end_people.html') as endfile:
    for line in endfile:
        print >>OUT, line,
        print >>OUT_PROFILES, line,

