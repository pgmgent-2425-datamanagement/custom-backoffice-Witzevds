<?php

require_once __DIR__ . '/../Seeder.php';

class UsersSeeder extends Seeder
{
  public function run()
  {
    echo "Seeding users...\n";

    // Clear existing data
    $this->truncate('users');

    $users = [
      [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'profile_picture' => 'profile1.jpg'
      ],
      [
        'name' => 'Jane Smith',
        'email' => 'jane.smith@example.com',
        'profile_picture' => 'profile2.jpg'
      ],
      [
        'name' => 'Bob Johnson',
        'email' => 'bob.johnson@example.com',
        'profile_picture' => null
      ],
      [
        'name' => 'Alice Brown',
        'email' => 'alice.brown@example.com',
        'profile_picture' => 'profile4.jpg'
      ],
      [
        'name' => 'Charlie Wilson',
        'email' => 'charlie.wilson@example.com',
        'profile_picture' => null
      ],
    ];

    $this->insertMultiple('users', $users);

    echo "Users seeded successfully!\n";
  }
}
