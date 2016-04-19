date=`date +%s`.tar.gz
# cp -r /home/deploy_cvpr /home/cvfconf/conferences/web/deploy_cvpr
tar cf - ../web/ | gzip > $date
mv $date ~/Dropbox/$date

# backup deploy_cvpr

# date=`date +%s`deploy_cvpr.tar.gz
# tar cf - /home/deploy_cvpr | gzip > $date
# mv $date ~/Dropbox/$date
