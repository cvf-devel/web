#!/usr/bin/python

#from xml.dom import minidom
import csv
import json


OUTFILE = open('tmp','w')

#FIELD_MAP = {0:'first',1:'last',2:'institution',3:'email',4:'url'}
#FIELD_MAP = {0:'first',1:'last',2:'primary-subject-area',3:'secondary-subject-areas',4:'web-url',5:'google-microsoft-url',6:'dblp-url',7:'institution',8:'email'}
FIELD_MAP = {0:'first',1:'last',2:'primary-subject-area',3:'secondary-subject-areas',4:'url',5:'google-microsoft-url',6:'dblp-url',7:'institution',8:'email'}

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

def hash_to_comma( text_in ):
    return text_in.replace('#',',')

def replace_special_chars( text_in ):
    #print text_in
    text_out = ''
    for char in text_in:
        if char in REP_TABLE.keys():
            text_out += REP_TABLE[char]
        else:
            text_out += char
    return text_out


#xmldoc = minidom.parse('input/Meta-Reviewers-detailed.xml')

#sheet = xmldoc.getElementsByTagName('Worksheet')
#rows = sheet[0].getElementsByTagName('Row')

rows = csv.reader( open('input/meta-reviewers-detailed.csv') )

people = list()
for row in rows:
    #fields = row.getElementsByTagName('Data')
    #print fields
    #if len(fields) > 1:
    if True:
        entry = {}
        #for field in fields:
            #print field.childNodes[0].nodeValue
        for i in FIELD_MAP.keys():
            #if i < len(fields):
            if row[i]:
                #print '%d:'%i,
                #print ' %s' % (replace_special_chars( fields[i].childNodes[0].nodeValue ))
                #entry[FIELD_MAP[i]] = replace_special_chars( fields[i].childNodes[0].nodeValue )
                #print '%s' % row[i]
                print '%s' % hash_to_comma( replace_special_chars( row[i] ) )
                entry[FIELD_MAP[i]] = hash_to_comma( replace_special_chars( row[i] ) )
            else:
                entry[FIELD_MAP[i]] = None

        #print entry
        if not entry['last'] == 'Last Name':
            people.append(entry)

for person in sorted(people,cmp = lambda x,y: cmp(x['last'],y['last']), reverse=False):
    print '            {'
    for field in sorted(FIELD_MAP[x] for x in FIELD_MAP.keys()):
        #field = FIELD_MAP[key]
        #print >>OUTFILE, '                "%s": "%s"' % (field,person[field])
        #print '                "%s": "%s"' % (field,person[field]),
        #print ',' if not field == 'url' else ''
        print '                "%s": "%s"%s' % (field,person[field],',' if not field == 'url' else '')
    print '            },'

