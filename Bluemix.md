#IBM Bluemix

Bij het bespreken van de doelstelling van het project werd er afgesproken dat ik gebruik zou maken van een paas. Aangezien ik er tijdens de loop van het project er voor koos om de Rpi als server te gebruiken hield ik dit deel echter beperkt. De keuze voor de PI ipv de PAAS was er vooral omdat er maandelijks extra kosten aan de Bluemix hangen en ik dit niet echt zie zitten. Voor het project kan ik dit wel testen aangezien de eerste 30 dagen gratis zijn. 

Je kan de test app hier terug vinden [https://projectfridge.mybluemix.net/](https://projectfridge.mybluemix.net/)

Het doel hier voor mij was om kort kennis te maken met het platform. Ik doorliep volgende stappen.

1. Acount aanmaken op [https://console.ng.bluemix.net/](https://console.ng.bluemix.net/)
2. Een service kiezen, ik koos voor een .php project
3. Enkele ogenblikken wachten tot IBM alles klaarmaakt
4. Bluemix en CF Command Line Interface Downloaden en istalleren

Hiervoor maakte ik wel gebruik van een linux machine omdat ik dit niet in orde kreeg op mijn windows

De sourcecode downloaden en naar de map gaan waar ze zich bevind
	cd your_new_directory

Aanpassing maken die je wil en dan connecteren met Bluemix 
	bluemix api https://api.ng.bluemix.net

inloggen
	bluemix login -u vandesselstijn@gmail.com -o vandesselstijn -s webapp

Pushen naar IBM
	cf push "ProjectFridge"

En de site staat online.

##Bronnen

[https://console.ng.bluemix.net/](https://console.ng.bluemix.net/)
	



	