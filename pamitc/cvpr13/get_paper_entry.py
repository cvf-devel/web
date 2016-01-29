#!/usr/bin/python

# Use this with a paper number needing update (e.g. ./get_paper_entry.py 1538)
# Then paste the output into input/author_updates.json
# Edit the entry as needed and finally, call gen/gen_program.py
#


import sys
import json
import string

if __name__ == '__main__':
    pid = int(sys.argv[1])
    #print '%d' % pid

    J = json.load(open('input/accepted_papers.json','r'))
    ENTRY = [e for e in J if e['paper_id']==pid]

    if ENTRY == []:
        print 'No entry found for paper_id %d!!'%pid
    else:
        entry_str = '%s,' % json.dumps(obj=ENTRY[0], sort_keys=True, indent=2,separators=(',',': '))
        # now need to indent each line by two spaces
        #print '%s' % entry_str
        # now need to indent each line by two spaces
        s = entry_str.split('\n')
        s = ['  '+line for line in s]
        entry_str = ('\n').join(s)
        print '%s' % entry_str
