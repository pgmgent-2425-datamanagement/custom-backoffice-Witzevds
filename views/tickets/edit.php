<?php
// views/tickets/edit.php
?>
<div class="edit-layout">
  <h1 class="edit-layout__title">Edit Ticket</h1>
  <form action="/tickets/<?= $ticket->id ?>/update" method="post" class="edit-layout__form">
    <div class="edit-layout__meta">
      <div class="form-group">
        <label for="user_id"><strong>User</strong></label>
        <input type="number" name="user_id" id="user_id" class="form-control" value="<?= htmlspecialchars($ticket->user_id) ?>" required>
      </div>
      <div class="form-group">
        <label for="event_id"><strong>Event</strong></label>
        <input type="number" name="event_id" id="event_id" class="form-control" value="<?= htmlspecialchars($ticket->event_id) ?>" required>
      </div>
      <div class="form-group">
        <label for="price"><strong>Price</strong></label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" value="<?= htmlspecialchars($ticket->price) ?>" required>
      </div>
      <div class="form-group">
        <label for="ticket_code"><strong>Ticket Code</strong></label>
        <input type="text" name="ticket_code" id="ticket_code" class="form-control" value="<?= htmlspecialchars($ticket->ticket_code) ?>" required>
      </div>
    </div>
    <div class="edit-layout__actions">
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <a href="/tickets/<?= $ticket->id ?>" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>