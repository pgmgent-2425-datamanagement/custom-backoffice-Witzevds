<?php

use App\Models\Event;
?>

<link rel="stylesheet" href="/css/components.css">
<link rel="stylesheet" href="/css/events.css">

<div class="detail-card">
  <h1 class="detail-card__title"><?= htmlspecialchars($event->name ?? 'Event') ?></h1>
  <div class="detail-card__meta">
    <p><strong>Start:</strong> <?= htmlspecialchars($event->start_date) ?></p>
    <p><strong>End:</strong> <?= htmlspecialchars($event->end_date) ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($event->location_name ?? $event->location_id) ?></p>
    <p><strong>Category:</strong> <?= htmlspecialchars($event->category_name ?? $event->category_id) ?></p>
    <p><?= nl2br(htmlspecialchars($event->description)) ?></p>
  </div>
  <div class="detail-card__actions">
    <a href="/events/<?= $event->id ?>/edit" class="btn btn-secondary">Edit</a>
    <form action="/events/<?= $event->id ?>/delete" method="post" style="display:inline;">
      <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this event?')">Delete</button>
    </form>
    <a href="/events" class="btn btn-outline">Back to Events</a>
  </div>
</div>