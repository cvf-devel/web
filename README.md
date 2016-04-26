
Websites and content for the Computer Vision Foundation

To restore the backup for the conference websites up to 2015, run ./restore_backup.sh in the conferences directory.
It will say that ./web and /home/cvfconf/conferences/web are the same directory but it still runs mv just fine.

The other backups (deploy_cvpr, deploy_cvpr2017, and postgres_backup) will need to be manually moved back into their
proper locations. they will be placed into the current directory after running restore_backup.sh 
