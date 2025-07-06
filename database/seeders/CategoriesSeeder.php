<?php

require_once __DIR__ . '/../Seeder.php';

class CategoriesSeeder extends Seeder
{
  public function run()
  {
    echo "Seeding categories...\n";

    // Clear existing data
    $this->truncate('categories');

    $categories = [
      ['name' => 'Conference'],
      ['name' => 'Workshop'],
      ['name' => 'Concert'],
      ['name' => 'Festival'],
      ['name' => 'Webinar'],
      ['name' => 'Sports'],
      ['name' => 'Art & Culture'],
      ['name' => 'Networking'],
      ['name' => 'Training'],
      ['name' => 'Exhibition']
    ];

    $this->insertMultiple('categories', $categories);

    echo "Categories seeded successfully!\n";
  }
}
