#Project Web Aplicaties 

##Stockbeheer systeem

Het doel van project is een systeem te ontwerpen waarbij een stock beheer systeem wordt ontworpen voor een toepassing bij mij thuis.

Tijdens mijn weekends breng ik tmijn tijd door samen met mijn vrienden in ons thuinhuis. Hier staat er een ijskast waar onze vooraad aan drinken in zit.
Ik had nu graag een systeem gemaakt dat het huidige systeem vervangt waarbij we een op een papier een streepje moeten zetten achter de drank die we genomen hadden.
Graag had ik de volgende onderdelen in mijn project gehad

1. Systeem voor aan te geven wat je gaat drinken	
	- voor 1 of meerdere personen tegelijk
2. Het checken van de stock en het melden wanneer 
	- een standaard overzicht
	- mail sturen wanneer er nieuwe drank moet aagekocht worden
3. Het checken van de schuld per gebruiker
	- een overzicht
	- een mail systeem om te melden dat er moet betaald worden
4. Een log waarbij er gekeken kan worden wie wat de afgelopen tijd gedronken is
	- dit om te kijken of iedereen wel eerlijk is
5. Een systeem voor het beheer van de gebuikerers 
6. Een backup systeem

Ik had graag deze aplicatie gedraad op een Raspberrypi zodat we hier steeds over kunnen beschikken(dit eventueel gewoon lokaal draaien)

###Gebruikte onderdelen

1. Front-end 
	- Bootstrap
2. back-end
	- laravel
3. Service
	- Apache met vHost en handler
4. Security/maintenance
	- Https
	- Backup
	
###Les 3 start project

Tijdens deze les werd er samen gezeten met de docent. Hier overlegde we het project.
Ook kwam er nog het exrta idee voor een pi camera te gebruiken om te chekken wie een product genomen heeft.
Zo zouden we wanneer de ijkast open gaat dit met een switch detecteren, dan met de pi een foto nemen.
Zo kunnen we in de log dit opnemen en wanneer er binnen een bepaalde tijd geen melding is gedaan via de aplicatie dit als een verdachte transactie beschouwen.

###Les 4 - 8 Laravel
Tijdens deze lessen worden gebruikt om kennis te maken met het laravel framework. Tijdens de eerste les wordt mijn pc klaargemaakt voor een laravel project te maken. Composer wordt geinstaleer en Xampp wordt geinstaleerd om te testen 

