def replace(file_name):
	f = open(file_name, 'r')
	content = []
	for line in f:
		content.append(line)
	f.close()
	old_strings = ['http://cvl.umiacs.umd.edu/conferences/cvpr2010/images/SponsorGoogle.png', 'http://developer.download.nvidia.com/compute/cuda/2_3/toolkit/docs/online/nvidia_logo.jpg', 'http://cvl.umiacs.umd.edu/conferences/cvpr2010/images/SponsorPtGrey.png', 'http://cvl.umiacs.umd.edu/conferences/cvpr2010/images/SponsorOV.png', 'http://cvl.umiacs.umd.edu/conferences/cvpr2010/images/SponsorKitware.png']
	
	new_strings = ['images/google_research.jpg', 'images/nvidia_logo.png', 'images/ptgrey_logo.jpeg', 'images/kitware_logo.png', 'images/objectvideo_logo.jpeg']
	
	for i in range(len(content)):
		for j in range(len(old_strings)):
			if old_strings[j] in content[i]:
				content[i] = content[i].replace(old_strings[j], new_strings[j])
				print content[i]
				print old_strings[j]
				print new_strings[j]
	f = open(file_name, 'w')
	for i in range(len(content)):
		f.write(content[i])
	f.close()


file_list = ['corporatedonor.html','jobs.html', 'associatedevents.html', 'camera.html', 'venue.html', 'search.html', 'tuesdayorals.html' 'tueposters.html', 'wednesdayorals.html', 'wedposters.html', 'thursdayorals.html', 'thuposters.html', 'workshops.html', 'tutorials.html', 'demos.html', 'DoctorialConsortium.html', 'exhibitors.html', 'studentvolunteers.html', 'videos.html', 'posterinstructions.html', 'camera.html', 'statistics.html', 'reviewing.html', 'submission.html', 'reviewer_guidelines.html', 'ac_guidelines.html', 'hotel.html', 'AreaInfo.html', 'search.html' ]
for i in range(len(file_list)):
	replace(file_list[i])
