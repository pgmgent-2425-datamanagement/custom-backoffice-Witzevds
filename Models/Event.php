<?php

namespace App\Models;

class Event extends Basemodel
{
  /**
   * Haal alle events op met locatie- en categorienaam (JOIN)
   */
  public static function allWithNames()
  {
    global $db;
    $sql = 'SELECT e.*, l.name AS location_name, c.name AS category_name
                FROM events e
                LEFT JOIN locations l ON e.location_id = l.id
                LEFT JOIN categories c ON e.category_id = c.id
                ORDER BY e.start_date DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $events = [];
    foreach ($rows as $row) {
      $event = new self();
      foreach ($row as $k => $v) {
        $event->$k = $v;
      }
      $events[] = $event;
    }
    return $events;
  }
}
