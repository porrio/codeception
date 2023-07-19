Codeception Acceptance
=============================

Docker
=============================
Om de applicatie in (Docker) containers te starten, heb je allereerst een Docker installatie nodig. Docker kun je downloaden op https://www.docker.com/get-docker en kies voor de Community Edition (CE). In de CE heb je ook direct de beschikking over docker-compose, die je nodig zult hebben om de applicatie te starten in containers.

Eenmaal Docker gedownload en geïnstalleerd, zul je een Docker ID moeten aanmaken op https://hub.docker.com om gebruik te kunnen maken van de Docker HUB waar de containers vandaan gedownload zullen gaan worden. Na het aanmaken van het Docker ID kun je hiermee inloggen op je eigen Docker installatie en ben je klaar om met containers te gaan werken.

Je bent nu klaar om je docker container te builden en runnen. Dit kan door het volgend command uit te voeren in je commandline.

    docker-compose up -d --build

Composer
=============================
Een composer install is nodig om wat pakketjes te installeren dit gebeurd moet vanuit de docker container.
Bash dus in je Docker container met het volgende command.

    docker exec -it dashboard_phpfpm bash

Je zit nu in de container daar kan de install uitgevoerd worden.

    composer install

Een nieuwe Acceptance Test maken
=============================
Bash in je docker container als je hier nog niet in zit en voor het volgende command uit.

Let op! Login is hier de naam van de test deze dus even aanpassen

    php vendor/bin/codecept generate:cest Acceptance Login

In de directory test/Acceptance is nu een file aangemaakt die begint met jouw gekozen test name.

In de aangemaakte class kun je je test schrijven zie als voorbeeld LoginCest.php
In loginCest word getest of de login van Cameranu werkt.

Een Test runnen
=============================
Voor dat je een test kunt runnen heb je een docker container met een webDriver nodig.

Voer hiervoor het volgende commando uit op je comment line

    docker run -d -p 4444:4444 -p 7900:7900 --shm-size="2g" selenium/standalone-firefox:latest

Pas nu je hosts file aan deze vind je in /etc/hosts
Voeg het volgende toe

    127.0.0.1 selenium.loc

Bash in je docker container, en voer het volgende commando uit. LoginCest is hier de naam van je test.

    php vendor/bin/codecept run Acceptance LoginCest

Je zit nu of de test slaagt of faalt en waarom. In de map tests/_output verschijnt een html en een png op het moment dat een test faalt of slaagt.

Live meekijken met een test
============================
Selenium draait op poort 4444 ga dus in je browser naar selenium.loc:4444

Als je nu een test runt zie je hem hier verschijnen onder sessions als je klikt op het video icoontje vraagt hij om een wachtwoord vul hier secret in en voila.