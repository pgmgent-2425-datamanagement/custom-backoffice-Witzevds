<?php

require_once __DIR__ . '/../config.php';

abstract class Seeder
{
  protected $db;

  public function __construct()
  {
    // DDEV default database credentials
    $this->db = new PDO(
      'mysql:host=db;dbname=db;charset=utf8mb4',
      'db',
      'db',
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]
    );
  }

  /**
   * Run the database seeder
   */
  abstract public function run();

  /**
   * Insert data into a table
   */
  protected function insert(string $table, array $data)
  {
    $columns = implode(',', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));

    $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
    $stmt = $this->db->prepare($sql);

    return $stmt->execute($data);
  }

  /**
   * Insert multiple records
   */
  protected function insertMultiple(string $table, array $records)
  {
    foreach ($records as $record) {
      $this->insert($table, $record);
    }
  }

  /**
   * Clear table data
   */
  protected function truncate(string $table)
  {
    $this->db->exec("SET FOREIGN_KEY_CHECKS = 0");
    $this->db->exec("TRUNCATE TABLE {$table}");
    $this->db->exec("SET FOREIGN_KEY_CHECKS = 1");
  }
}
