# 🌱 Database Seeding

Dit document legt uit hoe je het database seeding systeem gebruikt om test data in je database te laden.

## 📁 Structuur

```
database/
├── Seeder.php              # Basis abstracte class
├── DatabaseSeeder.php      # Master seeder die alles runt
├── SEEDING.md              # Deze documentatie
└── seeders/
    ├── CategoriesSeeder.php # Vult categories tabel
    ├── LocationsSeeder.php  # Vult locations tabel  
    ├── UsersSeeder.php      # Vult users tabel
    └── EventsSeeder.php     # Vult events tabel
```

## 🚀 Gebruik

### Alle data seeden (aanbevolen)

```bash
ddev exec php database/DatabaseSeeder.php
```

Dit runt alle seeders in de juiste volgorde en vult je database met test data.

### Individuele seeders runnen

Als je alleen één tabel wilt seeden:

```bash
# Alleen categories
ddev exec php -r "require_once 'database/seeders/CategoriesSeeder.php'; (new CategoriesSeeder())->run();"

# Alleen locations  
ddev exec php -r "require_once 'database/seeders/LocationsSeeder.php'; (new LocationsSeeder())->run();"

# Alleen users
ddev exec php -r "require_once 'database/seeders/UsersSeeder.php'; (new UsersSeeder())->run();"

# Alleen events
ddev exec php -r "require_once 'database/seeders/EventsSeeder.php'; (new EventsSeeder())->run();"
```

## 📊 Test Data Overzicht

Na het runnen van alle seeders heb je de volgende test data:

### Categories (10 items)
- Conference, Workshop, Concert, Festival, Webinar, Sports, Art & Culture, Networking, Training, Exhibition

### Locations (7 items)
- Antwerp Convention Center
- Brussels Expo  
- Ghent Opera House
- Leuven Music Hall
- Hasselt Cultural Center
- Rotterdam Ahoy
- Amsterdam RAI

### Users (8 items)
- John Doe, Jane Smith, Bob Johnson, Alice Brown, Charlie Wilson, Emma Davis, Mike Thompson, Sarah Connor

### Events (8 items)
- Tech Conference 2025
- PHP Workshop for Beginners
- Summer Music Festival
- Modern Art Exhibition
- Web Development Webinar
- Startup Networking Event
- Digital Marketing Conference
- Photography Workshop

## ⚠️ Belangrijk

- **Seeding wist alle bestaande data** - Alle tabellen worden geleegd voordat nieuwe data wordt toegevoegd
- **Foreign keys** - Seeders runnen in de juiste volgorde om foreign key constraints te respecteren
- **Herbruikbaar** - Je kunt seeding zo vaak runnen als je wilt voor fresh test data

## 🔧 Nieuwe Seeder Toevoegen

1. **Maak een nieuwe seeder file:**
   ```bash
   touch database/seeders/NieuweTabelSeeder.php
   ```

2. **Gebruik deze template:**
   ```php
   <?php
   
   require_once __DIR__ . '/../Seeder.php';
   
   class NieuweTabelSeeder extends Seeder
   {
       public function run()
       {
           echo "Seeding nieuwe_tabel...\n";
           
           // Clear existing data
           $this->truncate('nieuwe_tabel');
           
           $data = [
               ['kolom1' => 'waarde1', 'kolom2' => 'waarde2'],
               ['kolom1' => 'waarde3', 'kolom2' => 'waarde4'],
           ];
           
           $this->insertMultiple('nieuwe_tabel', $data);
           
           echo "Nieuwe tabel seeded successfully!\n";
       }
   }
   ```

3. **Voeg toe aan DatabaseSeeder.php:**
   ```php
   require_once __DIR__ . '/seeders/NieuweTabelSeeder.php';
   
   // In de run() methode:
   $seeders = [
       new CategoriesSeeder(),
       new LocationsSeeder(), 
       new UsersSeeder(),
       new EventsSeeder(),
       new NieuweTabelSeeder()  // ← Voeg hier toe
   ];
   ```

## 🐛 Troubleshooting

### "Connection refused" error
- Zorg dat DDEV draait: `ddev start`
- Check of je in de project directory bent

### "Table doesn't exist" error  
- Importeer eerst je database schema: `ddev import-db --src=database_schema.sql`

### Foreign key constraint errors
- Check de volgorde van seeders in `DatabaseSeeder.php`
- Parent tabellen (categories, locations, users) moeten eerst

## 📝 Tips

- Run seeding na elke database schema wijziging
- Gebruik realistische test data voor betere testing
- Pas data aan in de seeder files, niet in de database zelf
- Commit seeder wijzigingen naar Git voor teamwork
