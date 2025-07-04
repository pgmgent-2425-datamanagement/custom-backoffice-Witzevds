# 🎟️ Event Management Backoffice

## 👤 Studentgegevens

- **Naam:** [Jouw Naam]
- **Studentnummer:** [Jouw Studentnummer]
- **Klasgroep:** [Jouw klas]

---

## 📝 Overzicht

Deze applicatie is een **backoffice voor het beheren van evenementen**, gebouwd met een eenvoudige Base MVC-structuur in PHP.

Beheerders kunnen:
- Evenementen aanmaken, bewerken en verwijderen
- Gebruikers, locaties en categorieën beheren
- Tickets volgen en koppelen aan gebruikers
- Inschrijvingen opvolgen via een many-to-many relatie
- Bestanden uploaden (zoals eventafbeelding of profielfoto)
- Statistieken bekijken in een dashboard
- Gegevens opvragen en verzenden via een publieke API

---

## 🧱 Projectstructuur (Base MVC)

De applicatie maakt gebruik van een aangepaste **Model View Controller** structuur. Dit zorgt voor gescheiden verantwoordelijkheden en duidelijke organisatie van de code.

| Onderdeel     | Functie                                                       | Locatie                    |
|---------------|----------------------------------------------------------------|-----------------------------|
| **Routing**   | Verbindt URL's met de juiste controller/methode               | `/app.php`, `routes.php`   |
| **Controllers** | Verwerken requests, roepen models aan, tonen views             | `/Controllers/`            |
| **Models**    | Beheren database-interactie via SQL                            | `/Models/`                 |
| **Views**     | Bevat HTML-weergave van specifieke content                     | `/views/`                  |
| **Templates** | Algemene layout van de pagina                                  | `/views/_templates/`       |

---

## 🔀 Routing

Routes worden gedefinieerd in `routes.php`. Een route koppelt een URL aan een controller en method.

### Voorbeeld:

```php
$router->get('/event/(\d+)', 'App\Controllers\EventController@detail');
$router->post('/event/add', 'App\Controllers\EventController@create');
📂 Controller
Controllers behandelen de logica: ze verwerken gebruikersinput, halen data op via models en tonen een view.

EventController.php:
php
Copy
Edit
namespace App\Controllers;
use App\Models\Event;

class EventController extends BaseController {

    public static function detail($id) {
        $event = Event::find($id);

        self::loadView('/event/detail', [
            'event' => $event
        ]);
    }

    public static function create() {
        // Validatie van formuliergegevens ($_POST)
        // Opslaan via Event model
        // Redirect naar lijst
    }
}
🗃️ Model
Een model communiceert met de database. Elk model komt meestal overeen met één tabel.

Event.php:
php
Copy
Edit
namespace App\Models;

class Event extends BaseModel {
    protected static $table = 'events';

    public static function find($id) {
        return self::query("SELECT * FROM events WHERE id = ?", [$id], true);
    }

    public static function getAll() {
        return self::query("SELECT * FROM events ORDER BY start_date DESC");
    }
}
📄 View
Views bevatten de HTML-weergave van data. Ze worden opgeroepen vanuit controllers.

/views/event/detail.php:
php
Copy
Edit
<h1><?= $event->name; ?></h1>
<img src="/uploads/<?= $event->image; ?>" alt="<?= $event->name; ?>">
<p><?= $event->description; ?></p>
<p>Datum: <?= $event->start_date; ?> – <?= $event->end_date; ?></p>
🧱 Template
Templates bevatten de algemene layout van de pagina met <html>, <head> en <body>. De variabele $content wordt hierin geladen.

/views/_templates/main.php:
php
Copy
Edit
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Admin Backoffice</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
  <header>
    <h1>Backoffice</h1>
  </header>

  <main>
    <?= $content; ?>
  </main>

  <footer>
    <p>&copy; <?= date('Y'); ?> Event Manager</p>
  </footer>
</body>
</html>
📊 Functionaliteiten van de Backoffice
✅ CRUD voor events, locaties, categorieën en gebruikers

✅ Bestand uploaden (event afbeelding, profielfoto gebruiker)

✅ Filemanager om geüploade bestanden te beheren

✅ Dashboard met statistieken via Chart.js

✅ Zoek- en filterfunctie op eventlijst

✅ Dropdowns voor relaties (event ↔ locatie, event ↔ categorie)

✅ Checkbox-lijsten voor many-to-many relaties (user ↔ events)

✅ SQL-injectie preventie via prepared statements

✅ Publieke API:

GET /api/events

POST /api/comments

📊 Dashboard
Op het dashboard worden twee grafieken weergegeven via Chart.js:

Aantal evenementen per maand

Aantal verkochte tickets per event

🔐 Logingegevens
Indien van toepassing (gebruik testlogin of admin login)

URL: http://localhost/admin

E-mail: admin@example.com

Wachtwoord: admin123

📂 Screencast
Een korte video van maximaal 3 minuten toont de belangrijkste functionaliteiten van de backoffice.

📁 Bestand: ./screencast.mp4

🛠️ Gebruikte Technologieën
PHP (Base MVC structuur)

MySQL database

Composer voor dependency management

Bootstrap (SASS) voor styling

Chart.js voor dashboard visualisaties

Bramus Router voor routing

⚙️ Installatie
Installeer de nodige dependencies via Composer:

bash
Copy
Edit
ddev composer install
Start de development server via DDEV of localhost en navigeer naar de adminomgeving.