<?php

require_once __DIR__ . '/../Seeder.php';

class EventsSeeder extends Seeder
{
  public function run()
  {
    echo "Seeding events...\n";

    // Clear existing data (will cascade to tickets and event_user)
    $this->truncate('events');

    $events = [
      [
        'name' => 'Tech Conference 2025',
        'description' => 'Annual technology conference featuring the latest innovations in AI, Web Development, and Cloud Computing',
        'start_date' => '2025-08-15',
        'end_date' => '2025-08-17',
        'location_id' => 1,
        'category_id' => 1,
        'image' => 'tech_conf.jpg'
      ],
      [
        'name' => 'PHP Workshop for Beginners',
        'description' => 'Hands-on PHP development workshop covering basics to advanced concepts',
        'start_date' => '2025-07-20',
        'end_date' => '2025-07-20',
        'location_id' => 4,
        'category_id' => 2,
        'image' => 'php_workshop.jpg'
      ],
      [
        'name' => 'Summer Music Festival',
        'description' => 'Three-day outdoor music festival featuring international and local artists',
        'start_date' => '2025-07-25',
        'end_date' => '2025-07-27',
        'location_id' => 2,
        'category_id' => 4,
        'image' => 'music_fest.jpg'
      ],
      [
        'name' => 'Modern Art Exhibition',
        'description' => 'Contemporary art showcase featuring works from emerging artists across Europe',
        'start_date' => '2025-08-01',
        'end_date' => '2025-08-31',
        'location_id' => 3,
        'category_id' => 7,
        'image' => 'art_expo.jpg'
      ],
      [
        'name' => 'Web Development Webinar',
        'description' => 'Online session about modern web development trends and best practices',
        'start_date' => '2025-07-10',
        'end_date' => '2025-07-10',
        'location_id' => 5,
        'category_id' => 5,
        'image' => null
      ],
      [
        'name' => 'Startup Networking Event',
        'description' => 'Connect with fellow entrepreneurs and investors in the startup ecosystem',
        'start_date' => '2025-09-15',
        'end_date' => '2025-09-15',
        'location_id' => 1,
        'category_id' => 8,
        'image' => 'networking.jpg'
      ],
      [
        'name' => 'Digital Marketing Conference',
        'description' => 'Learn the latest strategies in social media, SEO, and online advertising',
        'start_date' => '2025-10-05',
        'end_date' => '2025-10-06',
        'location_id' => 6,
        'category_id' => 1,
        'image' => 'marketing_conf.jpg'
      ],
      [
        'name' => 'Photography Workshop',
        'description' => 'Professional photography techniques for beginners and intermediate photographers',
        'start_date' => '2025-09-22',
        'end_date' => '2025-09-22',
        'location_id' => 7,
        'category_id' => 2,
        'image' => 'photo_workshop.jpg'
      ]
    ];

    $this->insertMultiple('events', $events);

    echo "Events seeded successfully!\n";
  }
}
