# Mailgun #

Voor het versturen van mails vanuit mijn aplicatie maak ik gebruik van de mailgun api. Door een acount te maken op de site van mailgun kan je in no time mails sturen vanuit je aplicatie. 

Na het aanmaken van een acount krijg je een sandbox acount dat je direct kan gaan gebruiken in je aplicatie, je kan hier ook je eigen domein registeren en dit gebruiken met de mailgun API.

Ik ondervond hier nog wel een probleem. Bij het registeren van je domein op mailgun moet je een TXT records (SPF & DKIM) toevoegen. In mijn geval moet ik deze records ophalen No-Ip. Spijtig genoeg kan je deze niet verkrijgen bij het gratis acount van no-ip.

Na wat twijfel beslis ik voor een betalend acount aan te maken bij no-ip, met het idee dat ik dan mijn mail volledig in orde kan maken. Als extra voordeel heb ik dan dat ik meer domeinnamen kan aanmaken en dat ik niet meer maandelijks mijn domein moet bevestigen.

Ik maak een enhanced plan aan op no-ip. Op dat moment had ik het idee dat ik de TXT records van mij gratis acount zou kunnen verkrijgen maar dit was niet het geval. Ik moet een nieuwe domeinnaam aanmaken op no-ip. 

Deze domeinnaam registeer ik dan op mailgun en voor de TXT records in. Het acount is volgens mailgun nu volledig in orde.

Mijn idee was enkel deze domeinnaam te gebruiken voor mailgun maar de oude originele domeinnaam gewoon te behouden voor de huidige site. Dit moet in mijn ogen perfect gaan aangezien dit ook mogelijk is als je het standaard sandboxacount van mailgun gebruikt.

Echter werkt dit niet zoals ik dacht en moet ik hier nog naar de oplossing zoeken. Je krijgt telkens deze error terug van laravel.

	Client error: `POST https://api.mailgun.net/v3/tuinhuis.hopto.me/messages.mime` 
	resulted in a `400 BAD REQUEST` response:
	{
	"message": "Free accounts are for test purposes only. Please upgrade or add the address to authorized recipients in (truncated...)
	}

Zeer vreemd aangezien mailgun gratis is voor de eerste 10 000 mails.

Aangezien ik maar 7 vaste gebruikers heb op mijn aplictie voeg ik hun mailadressen toe aan de "Authorized Recipients" lijst. Zo kunnen zij wel mails ontvangen.

De configuratie van de mail doe je in de .env file als volgt. (je kan dit allemaal terugvinden op je mailgun acount)

	MAIL_DRIVER=mailgun
	MAIL_HOST=smtp.mailgun.org
	MAIL_PORT=587
	MAIL_USERNAME=postmaster@tuinhuis.hopto.me
	MAIL_PASSWORD=****************************
	MAIL_ENCRYPTION=tls

Nu kan ik mails versturen vanuit laravel. Ik doe dit bijvoorbeeld zo.

	Mail::send('emails.betalingmail', ['user' => $user], function ($m) use ($user) 
	{
    	$m->to($user->email, 'Het Tuinhuis')->subject('Bestelling '.$user->lastpayed);
    });

Je moet nu enkel een extra vieuw aanmaken. Deze vieuw plaats ik een extra emails folder. Deze vieuw wordt dan doorgemaild aan je gebruiker en je hebt dus onmiddelijk een mooie layout. Hier een voorbeeld.

![](https://raw.githubusercontent.com/vandesselstijn/Webservices---aplications/master/Knipsel2.PNG)

#### Note

Ik merk wel op dat sommige van mij gebruikers de mail in hun spam folder ontvangen. Dit is enkel het geval bij hotmail gebruikers, niet bij de gmail gebruikers. Dit zou kunnen liggen aan het feit dat je html als mail stuur.



	 
