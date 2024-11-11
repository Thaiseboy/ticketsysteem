# Laravel Ticketsysteem

Dit project is een eenvoudig ticketsysteem gebouwd met het Laravel PHP framework. De applicatie maakt gebruik van **TailwindCSS** voor de styling en volgt de specificaties van de testopdracht.

## Functionaliteiten
- **Lijstweergave:** Bekijk een overzicht van alle onvoltooide tickets.
- **Detailweergave:** Bekijk de details van een individueel ticket.
- **Aanmaken en Bewerken:** Mogelijkheid om nieuwe tickets aan te maken en bestaande tickets te bewerken.
- **Voltooien van Tickets:** Markeer een ticket als voltooid. De voltooiingstijd worden opgeslagen om onbedoelde acties te voorkomen.
- **Bevestigingsvraag:** Bevestigingspop-up voor het voltooien en verwijderen van tickets om onbedoelde acties te voorkomen.
- **Logging:** Fouten en exeptions worden gelogd voor eenvoudige foutopsporing. 
- **Responsieve UI:** Gebruik van **TailwindCSS** inplaats van **Bootstrap**.

## Technische Vereisten
- PHP 8.1 of hoger.
- Bootstrap of Tailwind als CSS-framework.
- Titel is verplicht, omschrijving mag leeg zijn.
- Validatie op gebruikersinput(Zijn verplichte velden ingevuld + security).
- Bewaar in de database de datum tijd van het moment waarop een taak als "Uitgevoerd" wordt gemarkeerd. De taak verdwijnt daarna uit het overzicht.

## Opdracht Specificaties
**1. De applicatie bevat 3 hoofdpagina's:**
- Een index/lijstweergave.
- Een detailweergave van 1 ticket.
- Een aanmaakt/bewerkingspagina.
**2. De input wordt gevalideerd op verplichte velden en veilligeheid.**
**3. De datum/tijd van voltooiing wordt opgeslagen in de database, en voltooide tickets worden niet meer getoond in het overzicht.**
**4. Foutafhendeling en logging zijn geimplementeerd voor onderhoudbaarheid.**



## Installatie
Volg de onderstaande stappen om het project lokaal op te zetten:

1. **Clone de repository:**
- git clone [https://github.com/Thaiseboy/ticketsysteem.git]
- cd ticketsysteem

2. **Installeer PHP dependencies:**
-  composer install

3. **Installeer JavaScript**
-  npm install

4. **Pas de database-instellingen aan in .env file:**
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=ticketsysteem
- DB_USERNAME=root
- DB_PASSWORD=

5. **Voer de migraties uit:**
- php artisan migrate

6. **Complieer de asset**
- npm run dev

5. **Start de server:**
- php artisan serve

6. Open de applicatie in je browser op **http:127.0.0.1:8000**

## Contact
Neem gerust contact op als je vragen hebt of feedback wilt delen.
- **Auteur:** Master Supakon Karanyawad (Get)
- **Portfolio:** getdeveloper.nl
- **E-mail:** get_sarun@hotmail.com

✨ Bedankt!
Bedankt voor het bekijken van dit project! 