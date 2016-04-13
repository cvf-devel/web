#!/usr/bin/env python2.7

import os
import sys

path_to_dropbox = sys.argv[1]
stream = os.popen("find ~/Dropbox -name '*.gz'")
list_of_backups = []
for item in stream:
	list_of_backups.append(item)
	
if len(list_of_backups) > 4:
	os.chdir(path_to_dropbox)
	print os.getcwd()
	stream = os.popen("ls -lS")
	# delete the first entry b/c its the oldest
	stream.readline() # to get rid of the first output which is useless
	old_entry = stream.readline()
	old_entry = old_entry.strip("\n")
	old_entry = old_entry.split(' ')
	# its in old_entry[9]
	print repr(old_entry)
	sys_call = "rm " + str(old_entry[9])
	os.system(sys_call)
