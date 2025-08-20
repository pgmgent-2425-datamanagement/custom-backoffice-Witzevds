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

  /**
   * Haal alle tickets die deze user bezit
   */
  public function getTickets()
  {
    global $db;
    $sql = 'SELECT t.*, e.name AS event_name FROM tickets t
            LEFT JOIN events e ON t.event_id = e.id
            WHERE t.user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->execute(['user_id' => $this->id]);
    return $stmt->fetchAll();
  }

  /**
   * Haal alle ticket-ids van deze user op
   */
  public function getTicketIds()
  {
    global $db;
    $sql = 'SELECT id FROM tickets WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->execute(['user_id' => $this->id]);
    return array_column($stmt->fetchAll(), 'id');
  }
}
