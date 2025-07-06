<?php

use App\Models\Event;
?>

<link rel="stylesheet" href="/css/components.css">
<link rel="stylesheet" href="/css/events.css">

<div class="event-detail-card">
  <h1><?= htmlspecialchars($event->name ?? 'Event') ?></h1>
  <?php if (!empty($event->image)): ?>
    <img src="/uploads/<?= htmlspecialchars($event->image) ?>" alt="<?= htmlspecialchars($event->name) ?>" class="event-image">
  <?php endif; ?>
  <div class="event-meta">
    <p><strong>Start:</strong> <?= htmlspecialchars($event->start_date) ?></p>
    <p><strong>End:</strong> <?= htmlspecialchars($event->end_date) ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($event->location_name ?? $event->location_id) ?></p>
    <p><strong>Category:</strong> <?= htmlspecialchars($event->category_name ?? $event->category_id) ?></p>
  </div>
  <div class="event-description">
    <p><?= nl2br(htmlspecialchars($event->description)) ?></p>
  </div>
  <div class="event-actions">
    <a href="/events/<?= $event->id ?>/edit" class="btn btn-secondary">Edit</a>
    <form action="/events/<?= $event->id ?>/delete" method="post" style="display:inline;">
      <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this event?')">Delete</button>
    </form>
    <a href="/events" class="btn btn-outline">Back to Events</a>
  </div>
</div>