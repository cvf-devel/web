import json
import math


J = json.load( open('input/accepted_papers.json','r') )

NCOL = 15
npercol = int(math.ceil( len(J) / NCOL ))
#print npercol
#print len(J)
J2 = []
offset = 0
while offset < npercol:
    for col in range(15):
        if (offset + col*npercol) <= len(J):
            J2.append(J[offset + col*npercol])
            #J2.append(offset + col*npercol)
    offset += 1
    

print '<tr>',
for i in range(len(J2)):
    print '<td align="center"> %d </td>'%J2[i],
    #print '%d'%J2[i],
    if i%NCOL==(NCOL-1):
        print '</tr>\n',
        #print '\n',
        if not (i+1)==len(J2):
            print '<tr>',

