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

             
ORALS = list()
with open('input/orals_sessions_and_metadata.csv','r') as csvfile:
    reader = csv.reader(csvfile)
    for row in reader:
        if not row[0] == 'Oral Paper ID':
            paper_id   = int(row[0])
            session_id = row[6]
            session_name = replace_special_chars(row[5]).replace('#',',')

            paper_info = {'paper_id':paper_id, 'oral_session_id':session_id, 'session_name':session_name }
            ORALS.append( paper_info )

with open('input/orals_with_sessions.json','w') as jsonfile:
    json.dump(obj=ORALS, fp=jsonfile, sort_keys=True, indent=2, separators=(',', ': '))



POSTERS = list()
with open('input/posters_sessions_and_metadata.csv','r') as csvfile:
    reader = csv.reader(csvfile)
    for row in reader:
        if not row[0] == 'Poster Paper ID':
            paper_id   = int(row[0])
            session_id = row[12]
            session_name = replace_special_chars(row[11]).replace('#',',')
            spotlight_session_id = session_id.replace('P','S')

            paper_info = {'paper_id':paper_id, 'poster_session_id':session_id, \
                          'spotlight_session_id':spotlight_session_id, 'session_name':session_name }
            POSTERS.append( paper_info )

with open('input/posters_with_sessions.json','w') as jsonfile:
    json.dump(obj=POSTERS, fp=jsonfile, sort_keys=True, indent=2, separators=(',', ': '))

