#!/usr/bin/env python2.7

import os

stream = os.popen("find . -type f -print0 | perl -0nE 'say if -f and -s _ and -T _'")
for entry in stream:
	entry = entry.rstrip()
	entry = entry.rstrip('\x00')
	if '.git' in entry:
		continue
	sys_call = "git add " + str(entry)
	os.system(sys_call)

stream = os.popen("date")
date_info = ''
for item in stream:
	date_info += item

print repr(date_info)
date_info = date_info.rstrip()
sys_call = "git commit -m '" + str(date_info) + "'"
os.system(sys_call)
print "here!"
