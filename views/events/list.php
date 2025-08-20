<?php

use App\Models\Event;

function getNameById($arr, $id)
{
  foreach ($arr as $item) {
    if ($item->id == $id) return $item->name;
  }
  return $id;
}

?>


<div class="list-layout">
  <div class="list-layout__header">
    <h1 class="list-layout__title">Events</h1>
    <a href="/events/create" class="btn btn-primary">+ Add Event</a>
  </div>
  <div class="list-layout__items events-list">
    <?php foreach ($events as $event): ?>
      <div class="events-list__card">
        <div class="events-list__info">
          <strong><?= htmlspecialchars($event->name) ?></strong>
          <span><?= date('d-m-Y', strtotime($event->start_date)) ?> - <?= date('d-m-Y', strtotime($event->end_date)) ?></span>
        </div>
        <div class="events-list__actions">
          <a href="/events/<?= $event->id ?>" class="btn btn-sm btn-outline">👁️</a>
          <a href="/events/<?= $event->id ?>/edit" class="btn btn-sm btn-outline">✏️</a>
          <form action="/events/<?= $event->id ?>/delete" method="post" style="display:inline;">
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this event?')">Delete</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>