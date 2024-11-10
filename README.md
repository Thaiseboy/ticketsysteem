# Laravel Ticketsysteem

Dit project is een eenvoudig ticketsysteem gebouwd met het Laravel PHP framework. De applicatie maakt gebruik van **TailwindCSS** voor de styling en volgt de specificaties van de testopdracht.

## Functionaliteiten
- Lijstweergave van alle tickets.
- Detailweergave van één ticket.
- Aanmaak- en bewerkweergave voor tickets.
- Validatie van gebruikersinput (titel is verplicht).
- Mogelijkheid om een ticket als voltooid te markeren, waarbij de voltooiingstijd wordt opgeslagen.
- Gebruik van TailwindCSS voor een eenvoudige, nette styling.

## Technische Vereisten
- PHP 8.1 of hoger.
- Bootstrap of Tailwind als CSS-framework.
- Titel is verplicht, omschrijving mag leeg zijn.
- Validatie op gebruikersinput(Zijn verplichte velden ingevuld + security).
- Bewaar in de database de datum tijd van het moment waarop een taak als "Uitgevoerd" wordt gemarkeerd. De taak verdwijnt daarna uit het overzicht.

## 📦 Installatie
Volg de onderstaande stappen om het project lokaal op te zetten:

1. **Clone de repository:**
- git clone [repository-url]
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

✨ Bedankt!
Bedankt voor het bekijken van dit project! Neem gerust contact op als je vragen hebt.