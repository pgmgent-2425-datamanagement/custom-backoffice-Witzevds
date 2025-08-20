<?php

use App\Models\Ticket;
?>

<link rel="stylesheet" href="/css/components.css">
<link rel="stylesheet" href="/css/tickets.css">

<div class="list-layout">
  <div class="list-layout__header">
    <h1 class="list-layout__title">Tickets</h1>
    <a href="/tickets/create" class="btn btn-primary">+ Add Ticket</a>
  </div>
  <div class="list-layout__items tickets-list">
    <?php if (!empty($tickets)): ?>
      <table class="tickets-table">
        <thead>
          <tr>
            <th>Ticket Code</th>
            <th>User</th>
            <th>Event</th>
            <th>Price</th>
            <th>Created</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tickets as $ticket): ?>
            <tr>
              <td><?= htmlspecialchars($ticket->ticket_code) ?></td>
              <td><?= htmlspecialchars($ticket->user_name ?? $ticket->user_id) ?></td>
              <td><?= htmlspecialchars($ticket->event_name ?? $ticket->event_id) ?></td>
              <td>€<?= number_format($ticket->price, 2, ',', '.') ?></td>
              <td><?= htmlspecialchars($ticket->created_at) ?></td>
              <td>
                <a href="/tickets/<?= $ticket->id ?>" class="btn btn-sm btn-outline">View</a>
                <a href="/tickets/<?= $ticket->id ?>/edit" class="btn btn-sm btn-secondary">Edit</a>
                <form action="/tickets/<?= $ticket->id ?>/delete" method="post" style="display:inline;">
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this ticket?')">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="empty-state">
        <h3>No Tickets Found</h3>
        <p>There are no tickets in the system yet. Add the first ticket to get started!</p>
        <a href="/tickets/create" class="btn btn-primary">Add First Ticket</a>
      </div>
    <?php endif; ?>
  </div>
</div>