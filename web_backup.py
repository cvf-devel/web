#!/usr/bin/env python2.7

import os

# this section commits all non binary file to the current git repo

stream = os.popen("find . -type f -print0 | perl -0nE 'say if -f and -s _ and -T _'")
for entry in stream:
	entry = entry.rstrip()
	entry = entry.rstrip('\x00') # dealing with some weird formatting issue
	if '.git' in entry:
		continue
	sys_call = "git add " + str(entry)
	os.system(sys_call)

stream = os.popen("date")
date_info = ''
for item in stream:
	date_info += item

# print repr(date_info) // prints out all special charcters, for debugging
date_info = date_info.rstrip()
sys_call = "git commit -m 'Automated git commit, " + str(date_info) + "'"
os.system(sys_call)

# this section creates a snap shot of the entire repo in it's current state and names it the seconds since epoch

file_stream = os.popen("find . -type f -print")
date = os.popen("date +%s")
date = date.readline()
date = date.strip()
sys_call = "mkdir " + str(date)
os.system(sys_call)
# The directory has been created and the file_stream object contains all of the files in the working directory
'''
for file_name in file_stream:
	# create a copy of the file with a .bak extension
	file_name = file_name.strip('\n')
	sys_call = "cp " + str(file_name) + " " + str(file_name) + ".bak"
	sys_call = sys_call.strip('\n')
	print repr(sys_call)
	# os.system(sys_call)
	# mv the .bak to the 
	file_bak = str(file_name) + ".bak"
	sys_call = "mv " + file_bak + " Dropbox/" + file_bak
	print repr(sys_call)
	print file_bak + " moved"


# attempt to use gzip for everything
sys_call = "tar cvfz test_compress.tar.gz ."
os.system(sys_call)

'''





