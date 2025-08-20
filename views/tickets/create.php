<?php
// views/tickets/create.php
?>
<div class="create-layout">
  <h1 class="create-layout__title">Add Ticket</h1>
  <form action="/tickets" method="post" class="create-layout__form">
    <div class="detail-card__meta">
      <label for="user_id"><strong>User</strong></label>
      <input type="number" name="user_id" id="user_id" class="form-control" required>
      <label for="event_id"><strong>Event</strong></label>
      <input type="number" name="event_id" id="event_id" class="form-control" required>
      <label for="price"><strong>Price</strong></label>
      <input type="number" name="price" id="price" class="form-control" step="0.01" required>
      <label for="ticket_code"><strong>Ticket Code</strong></label>
      <input type="text" name="ticket_code" id="ticket_code" class="form-control" required>
    </div>
    <div class="create-layout__actions">
      <button type="submit" class="btn btn-primary">Add Ticket</button>
      <a href="/tickets" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>