<?php

require_once __DIR__ . '/../Seeder.php';

class EventUserSeeder extends Seeder
{
  public function run()
  {
    echo "Seeding event_user (registrations)...\n";

    // Clear existing data
    $this->truncate('event_user');

    // Koppelingen: user_id, event_id
    $registrations = [
      // user_id, event_id
      ['user_id' => 1, 'event_id' => 1],
      ['user_id' => 1, 'event_id' => 3],
      ['user_id' => 2, 'event_id' => 1],
      ['user_id' => 2, 'event_id' => 4],
      ['user_id' => 3, 'event_id' => 2],
      ['user_id' => 3, 'event_id' => 5],
      ['user_id' => 4, 'event_id' => 3],
      ['user_id' => 4, 'event_id' => 4],
      ['user_id' => 5, 'event_id' => 5],
      ['user_id' => 5, 'event_id' => 1],
      // Voeg meer combinaties toe als je meer users/events seed
    ];

    $this->insertMultiple('event_user', $registrations);

    echo "event_user seeded successfully!\n";
  }
}
