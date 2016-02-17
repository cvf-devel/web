#!/usr/bin/python

from xml.dom import minidom


OUTFILE = open('tmp','w')
FIELD_MAP = {0:'first',1:'last',2:'institution',3:'email',4:'url'}
REP_TABLE = {u'\xe4':'&auml;',u'\xfc':'&uuml;',u'\xe9':'&eacute;'}
def replace_special_chars( text ):
    for key in REP_TABLE:
        text = text.replace(key,REP_TABLE[key])
    return text

xmldoc = minidom.parse('input/Meta-Reviewers.xml')

rows = xmldoc.getElementsByTagName('Row')


people = list()
for row in rows:
    fields = row.getElementsByTagName('Data')
    if len(fields) > 1:
        entry = {}
        #for field in fields:
            #print field.childNodes[0].nodeValue
        for i in FIELD_MAP.keys():
            entry[FIELD_MAP[i]] = replace_special_chars( fields[i].childNodes[0].nodeValue )

        #print entry
        people.append(entry)

for person in people:
    print '            {'
    for key in FIELD_MAP.keys():
        field = FIELD_MAP[key]
        #print >>OUTFILE, '                "%s": "%s"' % (field,person[field])
        print '                "%s": "%s"' % (field,person[field]),
        print ',' if not field == 'url' else ''
    print '            },'

