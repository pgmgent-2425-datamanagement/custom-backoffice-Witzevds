<?php

namespace App\Models;

class Ticket extends BaseModel
{
  /**
   * Haal ticket op inclusief user en event naam
   */
  public static function findWithRelations($id)
  {
    global $db;
    $sql = 'SELECT t.*, u.name AS user_name, e.name AS event_name
                FROM tickets t
                LEFT JOIN users u ON t.user_id = u.id
                LEFT JOIN events e ON t.event_id = e.id
                WHERE t.id = :id';
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    if (!$row) return null;
    $ticket = new self();
    foreach ($row as $k => $v) {
      $ticket->$k = $v;
    }
    return $ticket;
  }

  /**
   * Haal alle tickets op met eventnaam
   */
  public static function allWithEventNames()
  {
    global $db;
    $sql = 'SELECT t.*, e.name AS event_name FROM tickets t LEFT JOIN events e ON t.event_id = e.id';
    $stmt = $db->query($sql);
    $rows = $stmt->fetchAll();
    $tickets = [];
    foreach ($rows as $row) {
      $ticket = new self();
      foreach ($row as $k => $v) {
        $ticket->$k = $v;
      }
      $tickets[] = $ticket;
    }
    return $tickets;
  }
}
