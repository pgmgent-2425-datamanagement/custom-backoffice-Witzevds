<?php
// views/tickets/view.php
?>
<div class="detail-card">
  <h1 class="detail-card__title">Ticket <?= htmlspecialchars($ticket->ticket_code ?? '') ?></h1>
  <div class="detail-card__meta">
    <p><strong>User:</strong> <?= htmlspecialchars($ticket->user_name ?? $ticket->user_id) ?></p>
    <p><strong>Event:</strong> <?= htmlspecialchars($ticket->event_name ?? $ticket->event_id) ?></p>
    <p><strong>Price:</strong> €<?= number_format($ticket->price ?? 0, 2, ',', '.') ?></p>
    <p><strong>Date:</strong> <?= date('d-m-Y', strtotime($ticket->created_at ?? 'now')) ?></p>
  </div>
  <div class="detail-card__actions">
    <a href="/tickets/<?= $ticket->id ?>/edit" class="btn btn-secondary">Edit</a>
    <form action="/tickets/<?= $ticket->id ?>/delete" method="post" style="display:inline;">
      <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this ticket?')">Delete</button>
    </form>
    <a href="/tickets" class="btn btn-outline">Back to Tickets</a>
  </div>
</div>