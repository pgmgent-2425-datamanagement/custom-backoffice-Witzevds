<?php

namespace App\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Event;

class TicketController extends BaseController
{
  public static function list()
  {
    global $db;
    $sql = 'SELECT t.*, u.name AS user_name, e.name AS event_name FROM tickets t
                LEFT JOIN users u ON t.user_id = u.id
                LEFT JOIN events e ON t.event_id = e.id
                ORDER BY t.created_at DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $tickets = [];
    while ($row = $stmt->fetchObject()) {
      $tickets[] = $row;
    }
    self::loadView('tickets/list', [
      'title' => 'Tickets',
      'tickets' => $tickets
    ]);
  }
}
