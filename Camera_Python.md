#Camera Python
	
Als extra functie had ik graag een foto genomen wanneer de koelkast opengaat.  Zo weet ik wie er iets name en of hij dit al dan niet heeft doorgegeven op de app. Hiervoor gebuik ik een Rpi camera en een Python script. Ik schrijf deze code al maar implementeer dit nog niet definitief. Dit omdat de pi niet in mijn persoonlijk netwerk zal staan maar in dit van de buren waar het tuinhuis zich bevind. Omdat ik hier niet altijd toegang tot heb draait de server nu bij mij thuis om makelijk aanpassingen te doen, en neem ik dus nog geen foto's. 

Ik schreef het volgende Python script

	from picamera import PiCamera, Color
	from time import sleep
	from datetime import datetime
	
	camera = PiCamera()
	time = datetime.now()
	displaytime = time.strftime("%A %d %b %y - %H:%M:%S")
	pictime = time.strftime("%Y%m%d%H%M%S")
	picname = pictime + '.jpg'
	filelocation = '/home/pi/webservices/pictures/' + picname
	
	camera.annotate_text_size = 50
	camera.annotate_text = displaytime
	sleep(2)
	camera.capture(filelocation)

Ik genereer een timestamp op de foto en als filename. Je moet wel enkele seconden wachten tot de camera zich scherp stelt.

##Bronnen
[https://www.raspberrypi.org/learning/getting-started-with-picamera/worksheet/](https://www.raspberrypi.org/learning/getting-started-with-picamera/worksheet/)