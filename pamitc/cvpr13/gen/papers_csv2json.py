#!/usr/bin/python
import csv
import json

ORAL_LIST = [ 118, 119, 138, 151, 176, 196, 204, 237, 254, 286, \
              331, 334, 363, 401, 462, 484, 511, 538, 539, 573, \
              637, 642, 657, 728, 738, 770, 820, 843, 858, 860, \
              881,1008,1072,1152,1159,1207,1245,1266,1288,1320, \
             1321,1345,1359,1369,1376,1381,1424,1444,1477,1531, \
             1604,1623,1625,1654,1723,1794,1806,1992,2068,2163 ]

REP_TABLE = { \
              '\x92' : '\'', \
              '\x9a' : 's', \
              '\xe0' : '&agrave;', \
              '\xe1' : '&aacute;', \
              '\xe3' : '&atilde;', \
              '\xe4' : '&auml;', \
              '\xe7' : '&ccedil;', \
              '\xe8' : '&egrave;', \
              '\xe9' : '&eacute;', \
              '\xed' : '&iacute;', \
              '\xf3' : '&oacute;', \
              '\xf6' : '&ouml;', \
              '\xf8' : '&oslash;', \
              '\xfc' : '&uuml;', \
            }
# <9a> replaced with s
# <92> replaced with '

def replace_special_chars( text_in ):
    #print text_in
    text_out = ''
    for char in text_in:
        if char in REP_TABLE.keys():
            text_out += REP_TABLE[char]
        else:
            text_out += char
    return text_out

             
JSON = list()
with open('input/accepted_papers.csv','r') as csvfile:
    reader = csv.reader(csvfile)
    for row in reader:
        if not row[0] == '':
            paper_id = int(row[0])
            title    = replace_special_chars(row[1]).replace('#',',')
            auths    = row[2]
            auths    = auths.split(';')
            emails   = row[3]
            emails   = emails.split(';')
            assert( len(auths) == len(emails) )

            auth_list = list()
            for i in range(len(auths)):
                email = emails[i].strip()
                auth_parts = (auths[i]).split('#')
                #auth_list.append( (auth_parts[0].strip(),auth_parts[1].strip(),email) )
                #name = auth_parts[0].strip()
                name = replace_special_chars(auth_parts[0].strip())
                #try:
                #    name = replace_special_chars(auth_parts[0].strip())
                #except:
                #    print '***** PROBLEM with paper_id %d' % paper_id

                inst = replace_special_chars(auth_parts[1].strip())
                is_primary = name[-1] == '*'

                name_parts = name.split()
                first      = ' '.join(name_parts[0:-1])
                last       = name_parts[-1][0:-1] if is_primary else name_parts[-1]
                
                auth_entry = {'first':first,'last':last,'institution':inst,'email':email,'is_primary':is_primary}
                auth_list.append( auth_entry )
                #print 'Found author: %s' % auth_entry

            #print '%4d  %s  %s' % (paper_id,title,auth_list)
            accept_type = 'oral' if paper_id in ORAL_LIST else 'poster'
            paper_info = {'paper_id':paper_id, 'title':title, 'authors':auth_list, 'accepted_as':accept_type }
            JSON.append( paper_info )

            #auth_list = list()
            #auth_list.append({'first':row[0],'last':row[1],'url':''})
            #winfo = {'title':row[3],'url':'','submission_deadline':'' }
            #JSON.append( {'workshop_info':winfo,'workshop_organizers':olist} )
            #print '<tr><td>%s</td><td>%s %s</a></td></tr>' % (row[3],row[0],row[1])

#print json.dumps(JSON, sort_keys=True, indent=2, separators=(',', ': '))
with open('input/accepted_papers.json','w') as jsonfile:
    json.dump(obj=JSON, fp=jsonfile, sort_keys=True, indent=2, separators=(',', ': '))

