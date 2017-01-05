# Backup Databank naar FTP #

Voor het backuppen van mijn databank schreef ik een script. Ik zocht eerst uit hoe ik juist met FTP moest werken. Daarna voegede ik 2 scripen die online vond samen tot het volgend script.

De FTP server die ik gebruik is deze van de webruimte die standaard bij mijn telenet pakket bij zit.

	#!/bin/bash
	
	# Basic configuration: datestamp e.g. YYYYMMDD
	
	DATE=$(date +"%Y%m%d")
	
	# Location of your backups (create the directory first!)
	
	BACKUP_DIR="/backup/mysql"
	
	# MySQL login details
	
	MYSQL_USER="laravel"
	MYSQL_PASSWORD="*******"
	
	# MySQL executable locations (no need to change this)
	
	MYSQL=/usr/bin/mysql
	MYSQLDUMP=/usr/bin/mysqldump
	
	# MySQL databases you wish to skip
	
	SKIPDATABASES="Database|information_schema|performance_schema|mysql"
	
	# Number of days to keep the directories (older than X days will be removed)
	
	RETENTION=90
	
	# ---- DO NOT CHANGE BELOW THIS LINE ------------------------------------------
	#
	# Create a new directory into backup directory location for this date
	
	mkdir -p $BACKUP_DIR/$DATE
	
	# Retrieve a list of all databases
	
	databases=`$MYSQL -u$MYSQL_USER -p$MYSQL_PASSWORD -e "SHOW DATABASES;" | grep -Ev "($SKIPDATABASES)"`
	
	# Dumb the databases in seperate names and gzip the .sql file
	
	for db in $databases; do
	echo $db
	$MYSQLDUMP --force --opt --user=$MYSQL_USER -p$MYSQL_PASSWORD --skip-lock-tables --events --databases $db | gzip > "$BACKUP_DIR/$DATE/$DATE-$db.sql.gz"
	done
	
	# Remove files older than X days
	
	find $BACKUP_DIR/* -mtime +$RETENTION -delete
	
	# ---- FTP --------------------------------------------------
	
	HOST=users.telenet.be 	 #This is the FTP servers host or IP address.
	USER=v576568             #This is the FTP user that has access to the server.
	PASS=******         	 #This is the password for the FTP user.
	
	# Go to correct dir
	cd $BACKUP_DIR/$DATE
	
	# Call 1. Uses the ftp command with the -inv switches. 
	#-i turns off interactive prompting. 
	#-n Restrains FTP from attempting the auto-login feature. 
	#-v enables verbose and progress. 
	
	ftp -inv $HOST << EOF
	
	# Call 2. Here the login credentials are supplied by calling the variables.
	
	user $USER $PASS
	
	# Call 3. Here you will change to the directory where you want to put or get
	#cd /
	
	# Call4.  Here you will tell FTP to put or get the file.
	put $DATE-$db.sql.gz
	
	# End FTP Connection
	bye

Telkens dit script uitgevoerd wordt heb ik een locale en online backup van mijn databank.

Na het maken van dit script moet er nog een dir gemaakt worden naarwaar het script schrijft.

	mkdir /backup/mysql

De rechten van het script moeten ook nog aangepast worden.

	chmod 755 backup.sh
	
Nu moeten we ook nog de "crontab" file aanpassen zodat de we het script automatisch op een bepaald tijdstip laten uitvoeren.

	sudo nano /etc/crontab
	0 3 * * * root /usr/local/sbin/backup.sh

Zo wordt er tekens om 3u 's nachts een backup gemaakt.

## bronnen ##


Backup - [https://www.kinamo.be/nl/support/faq/mysql-automatische-backup-van-database](https://www.kinamo.be/nl/support/faq/mysql-automatische-backup-van-database)

FTP -[http://http://serverfault.com/questions/279176/ftp-uploading-in-bash-script](http://http://serverfault.com/questions/279176/ftp-uploading-in-bash-script)



	
	