<?php
// views/tickets/create.php
?>
<div class="create-layout">
  <h1 class="create-layout__title">Add Ticket</h1>
  <form action="/tickets" method="post" class="create-layout__form">
    <div class="detail-card__meta">
      <div>
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" required>
          <option value="">-- Select User --</option>
          <?php foreach ($users as $user): ?>
            <option value="<?= $user->id ?>"><?= htmlspecialchars($user->name) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label for="event_id">Event</label>
        <select name="event_id" id="event_id" required>
          <option value="">-- Select Event --</option>
          <?php foreach ($events as $event): ?>
            <option value="<?= $event->id ?>"><?= htmlspecialchars($event->name) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <label for="price"><strong>Price</strong></label>
      <input type="number" name="price" id="price" class="form-control" step="0.01" required>
    </div>
    <div class="create-layout__actions">
      <button type="submit" class="btn btn-primary">Add Ticket</button>
      <a href="/tickets" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>