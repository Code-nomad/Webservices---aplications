# No-ip + Duc configuratie #

Aangezien ik mij site na dit project nog verder wil gebruiken moest deze ergens gehost worden. Tijdens de ontwikkeling draaide deze steeds op mijn pc. Echter wil ik overal aan deze site aankunnen en niet enkel in mij eigen netwerk. De meest voordehand liggende optie voor mij was deze te laten draaien op mij Rpi.

Doordat ik mij Rpi foto's wil laten nemen wanneer de koelkast open was online hosten voor mij niet echt een optie. Daarom koos ik ervoor om No-ip te gebruiken.

Ik ondernam volgende stappen.

### No-ip

Ik registeerde mij op no-ip. Ik maakte hier eerst de domeinaam aan voor de webaplicatie, later maakte ik hier nog een extra domein aan voor mij CV van het voor het vak management op te hosten. Ook kwam er later nog een extra domain voor de configuratie van mailgun.

### DUC

De volgende stap was het configuren van de DUC of Dynamic Update Client. Deze heeft als doel te laten weten aan no-ip op welk WAN-IP de server zich bevind. Dit is van belang omdat het WAN-IP dat je van je ISP krijgt kan veranderen. Je zou op de site van no-ip zelf je wan ip van dat moment kunnen ingeven maar wanneer je isp je dan een ander ip zou toekenne is de server niet meer berijkbaar. Daarom gebruik je deze DUC. Deze zal om een bepaalde tijd (bij mij 30min) het ip waarop de server draait doorgeven aan no-ip. Daardoor is de site altijd berijkbaar. Ik volgde volgende stappen.

Nieuwe map aanmaken voor sourcecode in te downloaden

	mkdir /home/pi/noip
	cd /home/pi/noip

De sourcecode downloaden en uitpakken

	wget http://www.no-ip.com/client/linux/noip-duc-linux.tar.gz
	tar vzxf noip-duc-linux.tar.gz

De code instaleren

	cd noip-2.1.9-1
	sudo make
	sudo make install

Runnen en de stappen volgen

	sudo noip2 ­-S
	

	
	


## Bronnen ##

[http://www.noip.com/support/knowledgebase/install-ip-duc-onto-raspberry-pi/](http://www.noip.com/support/knowledgebase/install-ip-duc-onto-raspberry-pi/)