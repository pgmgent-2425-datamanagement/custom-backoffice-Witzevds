<?php

require_once __DIR__ . '/../Seeder.php';

class LocationsSeeder extends Seeder
{
  public function run()
  {
    echo "Seeding locations...\n";

    // Clear existing data
    $this->truncate('locations');

    $locations = [
      [
        'name' => 'Antwerp Convention Center',
        'address' => 'Koningin Astridplein 20',
        'city' => 'Antwerp',
        'country' => 'Belgium'
      ],
      [
        'name' => 'Brussels Expo',
        'address' => 'Atomiumsquare 1',
        'city' => 'Brussels',
        'country' => 'Belgium'
      ],
      [
        'name' => 'Ghent Opera House',
        'address' => 'Schouwburgstraat 3',
        'city' => 'Ghent',
        'country' => 'Belgium'
      ],
      [
        'name' => 'Leuven Music Hall',
        'address' => 'Bondgenotenlaan 15',
        'city' => 'Leuven',
        'country' => 'Belgium'
      ],
      [
        'name' => 'Hasselt Cultural Center',
        'address' => 'Kunstlaan 5',
        'city' => 'Hasselt',
        'country' => 'Belgium'
      ],
      [
        'name' => 'Rotterdam Ahoy',
        'address' => 'Ahoyweg 10',
        'city' => 'Rotterdam',
        'country' => 'Netherlands'
      ],
      [
        'name' => 'Amsterdam RAI',
        'address' => 'Europaplein 24',
        'city' => 'Amsterdam',
        'country' => 'Netherlands'
      ]
    ];

    $this->insertMultiple('locations', $locations);

    echo "Locations seeded successfully!\n";
  }
}
