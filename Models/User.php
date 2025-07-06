<?php

namespace App\Models;

class User extends BaseModel
{
  /**
   * Haal alle events die deze user heeft bijgewoond (many-to-many via event_user)
   */
  public function getEvents()
  {
    global $db;
    $sql = 'SELECT e.* FROM events e
                INNER JOIN event_user eu ON eu.event_id = e.id
                WHERE eu.user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->execute(['user_id' => $this->id]);
    $rows = $stmt->fetchAll();
    // Cast naar Event model
    $events = [];
    foreach ($rows as $row) {
      $event = new \App\Models\Event();
      foreach ($row as $k => $v) {
        $event->$k = $v;
      }
      $events[] = $event;
    }
    return $events;
  }
}
