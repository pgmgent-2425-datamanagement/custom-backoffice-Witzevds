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

  public static function view($id)
  {
    $ticket = \App\Models\Ticket::findWithRelations($id);
    if (!$ticket) {
      self::loadView('errors/404', ['title' => 'Ticket Not Found']);
      return;
    }
    self::loadView('tickets/view', ['ticket' => $ticket]);
  }

  public static function edit($id)
  {
    $ticket = \App\Models\Ticket::findWithRelations($id);
    if (!$ticket) {
      self::loadView('errors/404', ['title' => 'Ticket Not Found']);
      return;
    }
    self::loadView('tickets/edit', ['ticket' => $ticket]);
  }

  public static function create()
  {
    self::loadView('tickets/create', ['title' => 'Add Ticket']);
  }

  public static function store()
  {
    $user_id = $_POST['user_id'] ?? null;
    $event_id = $_POST['event_id'] ?? null;
    $price = $_POST['price'] ?? null;
    $ticket_code = $_POST['ticket_code'] ?? null;
    if ($user_id && $event_id && $price && $ticket_code) {
      \App\Models\Ticket::create([
        'user_id' => $user_id,
        'event_id' => $event_id,
        'price' => $price,
        'ticket_code' => $ticket_code
      ]);
      self::redirect('/tickets');
    } else {
      self::loadView('tickets/create', [
        'title' => 'Add Ticket',
        'error' => 'All fields are required.'
      ]);
    }
  }

  public static function update($id)
  {
    $ticket = \App\Models\Ticket::find($id);
    if (!$ticket) {
      self::loadView('errors/404', ['title' => 'Ticket Not Found']);
      return;
    }
    $user_id = $_POST['user_id'] ?? null;
    $event_id = $_POST['event_id'] ?? null;
    $price = $_POST['price'] ?? null;
    $ticket_code = $_POST['ticket_code'] ?? null;
    if ($user_id && $event_id && $price && $ticket_code) {
      $ticket->user_id = $user_id;
      $ticket->event_id = $event_id;
      $ticket->price = $price;
      $ticket->ticket_code = $ticket_code;
      $ticket->save();
      self::redirect('/tickets/' . $ticket->id);
    } else {
      self::loadView('tickets/edit', [
        'title' => 'Edit Ticket',
        'ticket' => $ticket,
        'error' => 'All fields are required.'
      ]);
    }
  }
}
