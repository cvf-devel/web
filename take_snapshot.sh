date=`date +%s`.tar.gz

# move external directories (deploy_cvpr, databases, etc...)  to /home/cvfconf/conferences/web

cp -r /home/deploy_cvpr /home/cvfconf/conferences/web/deploy_cvpr
cp -r /home/deploy_cvpr /home/cvfconf/conferences/web/deploy_cvpr2017
cp -r /var/lib/postgresql/9.3/main /home/cvfconf/conferences/web/postgres_backup

tar cf - ../web/ | gzip > $date
mv $date ~/Dropbox/$date

rm -r /home/cvfconf/conferences/web/deploy_cvpr
rm -r /home/cvfconf/conferences/web/deploy_cvpr2017
rm -r /home/cvfconf/conferences/web/postgres_backup

