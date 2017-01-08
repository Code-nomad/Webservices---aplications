# Apache met vHost + PHP#

voor mijn website te runnen op mij rpi moest ik nog een webserver opzetten.
Hiervoor volgde ik de tutorial op de site van raspberry pi en ondernam volgende stappen.

	sudo apt-get install apache2

Je kan je server testen door naar het ip van de pi te surfen. Ook moest php nog geïnstaleerd worden

	sudo apt-get install php5 libapache2-mod-php5 -y

Dit kan je nu testen door de index.html van de apache te vervangen door index.php en hier volgende code in te plaatsen

	<?php phpinfo(); ?>

Ook nog Mysql in order brengen

	sudo apt-get -y install php5-mysql

Ik installeer composer op de pi. Moet nog extra lijn toevoegen .bashrc om composer te laten werken

	sudo nano ./bashrc
	export PATH="PATH":$HOME/.config/composer/vendor/bin

Ik zet mijn files over van windows naar de pi via winSCP. Zo kan ik makkelijk blijven ontwikkelen op mijn pc.

Echter om de site correct te laten werken moet de apache folder van de www-data user en groep zijn. Voor winSCP kan ik hier niet mee inloggen dus als ik de site wil updaten moet ik dit terug naar de pi user en groep zetten

	sudo chown -R www-data:www-dat /var/www
	sudo chown -R pi:pi /var/www

Ook moet de apache2.conf file nog aangepast worden

	sudo nano /etc/apache2/apache2.conf

	<Directory /var/www/>
		Options Indexes FollowSymLinks
		AllowOverride All
		Require all granted
	</Directory>

En als laatste moet je rewrite voor apache nog activeren.

	sudo a2enmod rewrite



##De vHost configuratie

Voor de vhost maak ik een extra domein aan op no-ip waar ik mijn cv op host. zo heb ik 2 site's om te hosten. Voor de nieuwe site moet je ook nog een dir aanmaken in de apache web folder en de juiste rechten toekenen.

CV --> [http://vandesselstijn.ddns.net/](http://vandesselstijn.ddns.net/)

Nu enkel de configuratie nog voor de vhost.
We laten de website naar de juite plaats wijzen.

	sudo nano /etc/apache2/sites-available/000.default.conf

	<VirtualHost *:80>
			...
	        DocumentRoot /var/www/html/ProjectFridge/public
			...
	</VirtualHost>

Ook voor de SSL config

	<VirtualHost *:443>
			...
	        DocumentRoot /var/www/html/ProjectFridge/public
			...
	</VirtualHost>

En voor de extra site

	<VirtualHost *:80>
			...
			ServerName vandesselstijn.ddns.net
			ServerAlias www.vandesselstijn.ddns.net
	        DocumentRoot /var/www/html/vandesselstijn.ddns.net
			...
	</VirtualHost>	

En Dan.

	sudo a2ensite vandesselstijn-default.conf
	sudo service apache2 restart

Zo draaien er nu 2 sites op mijn apache

## Bronnen

[https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md](https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md)
[https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts)