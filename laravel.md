# Laravel #


## Laravel instalatie op windows ##

Voor mijn project maakte ik gebruik van laravel, voor het grootste deel van het project volgde ik gewoon de standaard documentatie op de website van laravel en laracasts. Ik zal in md de problemen die ik heb ondervonden bespreken.

De uiteindelijke aplicatie draait op de rpi2 maar om te ontwikkelen gebruikte ik mijn windows pc. Op de windows pc startte ik eerst met een instalatie van Xampp. Hierdoor is kan ik de aplicatie makkelijk testen op mijn pc maar ook op mijn smartphone door naar het ip adress te surfen van mijn laptop. Ook kan ik mijn database managen door gebruik te maken van Mysql en phpMyadmin.

Om te kunnen starten met ontwikkelen moet er eerst composer geinstalleerd worden.
Op windows installeer je composer gewoon door [https://getcomposer.org/download/](https://getcomposer.org/download/ "De website van composer") te surfen en hier de .exe te downloaden. Deze zal ook composer aan de PATH variablen toevoegen zodat je vanuit de CMD line composer vanuit elke dir kan uitvoeren.

Vanuit de CMD line ga je naar de htdocs map van Xampp en voer je hier het volgende commando uit


	cd c:\xampp\htdocs
	laravel new jouw_projectnaam

Zo wordt er een nieuw laravel project aangemaakt en kan je hier al naartoe surfen.

## De mogelijkheden van laravel ontdekken ##

In de eerste weken van het project volg ik de filmpjes van Laracasts om zo met laravel te leren werken. hier ondervind ik geen echte moeilijkheden. Ik probeer tijdens het werken aan het project veel aandacht te schenken aan user authenticatie. Echter kom ik er na enkele weken achter dat laravel dit met een 1 commando al supper veel voorziet. Ik laat mij werk van de afgelopen weken dan ook voor wat het is en start met een nieuw project en laat deze authenticatie doen door de laravelfunctie.

	laravel new jouw_projectnaam
	php artisan make:auth

Dit is geweldig, ik heb nu ondervonden dat met het gebruik te maken van dit framework je in 5 minuten het werk van enkele weken kan vervangen. Echter moest ik nog wel wat aanpassen omdat de make:auth functie toch nog wat foutjes maakte in mij implementatie. Dit zou kunnen liggen aan het feit dat ik op een windows machine werk, waar de meeste mensen van de communetie linux/mac gebruikers zijn.

Het eerste probleem is dat er totaal geen lay-out was aan mijn aplicatie. Ook was er geen javascript aanwezig. Ik moest het path naar deze 2 files aanpassen asset en het probleem was opgelost. Ik deed ook voor het favicon.

	
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

    <!-- Styles -->
    <!--<link href="css/app.css" rel="stylesheet">-->

    <!--Deel van asset moest toegevoegd worden anders geen layout en geen js-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >    
    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>


Later bij het overzetten naar het rpi werkte de javascript niet meer. Dit kwam doordat de oude js lijn onderaan de layoutfile nog bestond. Door deze te verwijderen loste ik dit probleem ook op.

## Probleem Database ##

Ik had nog het probleem dat ik vanuit laravel geen connectie kon maken met mijn mySql database. De oplossing hier voor was het volgende

	verwijder de any user
	wwRoot aanzetten
	een extra laravel user maken om te verbinden
	
