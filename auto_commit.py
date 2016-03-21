#!/usr/bin/env python2.7

import os

stream = os.popen("find . -type f -print0 | perl -0nE 'say if -f and -s _ and -T _'")
for entry in stream:
	entry = entry.rstrip()
	print entry
	sys_call = "git add " + str(entry)
	print sys_call
	os.system(sys_call)

stream = os.popen("date")
date_info = ''
for item in stream:
	date_info += item

os.system("git commit -m" + date_info)

