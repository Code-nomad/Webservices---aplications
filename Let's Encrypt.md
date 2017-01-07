# Let's Encrypt en Cerbot #

Om Https te gebruiken op mijn site maak ik gebruik van let's encrypt. Om Https te kunnen gebruiken moet je een certificaat krijgen van een CA. Let's encrypt is zo'n CA waar je dit kan aanvragen.

Je site secure maken is echt super gemakelijk via Certbot. Dit is de tool dat let's encrypt aanraad op hun site. In enkele minuten is de site berijkbaar via Https en heb je een mooi groen slotje naast je URL.

Ik volgde volgende stappen

Je moet eerst een backport toevoegen aan je Debian linux omdat certbot nog onstabiel of in testfase is. Dit doe je zo.

	sudo nano /etc/apt/sources.list

	<--Volgende lijn toevoegen aan de sources.list file-->
	deb http://ftp.debian.org/debian jessie-backports main

	apt-get update

Certbot binnen halen en runnen. Het is dan gewoon de stappen volgen.

	sudo apt-get install python-certbot-apache -t jessie-backports
	certbot --apache


## Bronnen ##

[https://certbot.eff.org/#debianjessie-apache](https://certbot.eff.org/#debianjessie-apache)

[https://backports.debian.org/Instructions/](https://backports.debian.org/Instructions/)
