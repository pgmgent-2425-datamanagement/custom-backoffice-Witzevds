<?php

require_once __DIR__ . '/seeders/CategoriesSeeder.php';
require_once __DIR__ . '/seeders/LocationsSeeder.php';
require_once __DIR__ . '/seeders/UsersSeeder.php';
require_once __DIR__ . '/seeders/EventsSeeder.php';

class DatabaseSeeder
{
  public function run()
  {
    echo "🌱 Starting database seeding...\n\n";

    // Run seeders in the correct order (respecting foreign keys)
    $seeders = [
      new CategoriesSeeder(),
      new LocationsSeeder(),
      new UsersSeeder(),
      new EventsSeeder()
    ];

    foreach ($seeders as $seeder) {
      $seeder->run();
      echo "\n";
    }

    echo "✅ Database seeding completed successfully!\n";
  }
}

// Run seeder if this file is called directly
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
  $seeder = new DatabaseSeeder();
  $seeder->run();
}
