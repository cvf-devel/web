#!/usr/bin/python
import csv
import json

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


def parseAuths( authstr ):

    alist = replace_special_chars( authstr ).split('\n')
    authlist = list()
    for entry in alist:
        name = entry.split(' ')
        authlist.append( {'first':name[0],'last':' '.join(name[1:]),'url':''} )
            #olist.append({'first':row[0],'last':row[1],'url':''})
    return authlist

JSON = list()
with open('input/accepted_workshops.csv','r') as csvfile:
    reader = csv.reader(csvfile)
    for row in reader:
        if not row[0] == 'ID':
            authlist = parseAuths(row[2])
            winfo = {'title':row[1],'url':row[3],'submission_deadline':'','workshop_date':row[4] }
            JSON.append( {'workshop_info':winfo,'workshop_organizers':authlist} )
            #print '<tr><td>%s</td><td>%s %s</a></td></tr>' % (row[3],row[0],row[1])

print json.dumps(JSON, sort_keys=True, indent=2, separators=(',', ': '))
