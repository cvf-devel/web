#!/usr/bin/python
import csv
import cv
import math
import shutil
import os.path as P

tiers = ['gold','silver','bronze','overall']
accum = {'gold':[],'silver':[],'bronze':[],'overall':[]}
per_row = {'gold':1,'silver':2,'bronze':3,'overall':2}

with open('input/sponsor_list.csv','r') as csvfile:
    reader = csv.reader(csvfile)
    for row in reader:
        if not row[0] == '':
            accum[row[1]].append( row )

for tier in tiers:
    stier = sorted( accum[tier], cmp = lambda x,y: cmp(int(x[2]),int(y[2])), reverse=True )
    if tier=='overall':
        print '<br><a href="sponsor_exhibitor_info.php">Sponsorship and Exhibitor Information</a><br><br><br>'
        print '<table class="cvprtable" border="0" width="600" cellpadding="10">'
        print '  <th class="cvprtable cvprtableheader">Overall Meeting Sponsors</th>'
    else:
        print '<br>'
        print '<table class="cvprtable" border="0" width="640" cellpadding="10">'
        print '  <th class="cvprtable cvprtableheader">%c%s Sponsors (<a href="sponsor_exhibitor_info.php">info</a>)</th>' % (tier[0].upper(),tier[1:])
    print '  <tr><td align="center">'
    tcount = 0
    max_per_row = per_row[tier]
    print '<table border="0" cellpadding="5" cellspacing="0">',
    for row in stier:
        #print '***** Dumping row: %s *****' % row
        in_file = 'images/sponsors/%s'%row[3]
        out_file = in_file.replace('_full.','.')
        if not P.exists(out_file):
            print '***** Generating image: %s *****' % out_file
            im = cv.LoadImageM( in_file )
            w = im.width
            h = im.height
            area = w*h;
            des_area = int(row[2])*3.0;
            scale = math.sqrt(des_area/area);
            out_im = cv.CreateMat(int(h*scale),int(w*scale),cv.CV_8UC3);
            cv.Resize(im,out_im,interpolation=cv.CV_INTER_CUBIC)
            cv.SaveImage(out_file,out_im)
            if (tier == 'Overall Meeting'):# or (tier == 'gold'):
                shutil.copyfile(in_file,out_file)
        if (tcount%max_per_row==0):
            print '<tr><td align="center" valign="middle">'
        tcount += 1
        print '    ',
        print '<a href="%s"><img border="0" alt="%s" src="%s"></a>' % (row[4],row[0],out_file)
        if (tcount%max_per_row==0):
            print '</td></tr>',
        else:
            if tier=='overall':
                print '</td><td width="20"/><td align="center" valign="middle">',
            else:
                print '</td><td align="center" valign="middle">',
    if (not tcount%max_per_row==0):
            print '</td></tr>',
    print '</table>'
    print '  </td></tr>'
    print '</table>'

