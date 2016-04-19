
cur_backup=`ls -S /home/cvfconf/Dropbox | grep .tar.gz | head -n1`
echo $cur_backup
tar -xzvf /home/cvfconf/Dropbox/$cur_backup

# mv ./web/deploy_cvpr /home/deploy_cvpr_backup
# put web folder back in proper place
mv ./web /home/cvfconf/conferences/

