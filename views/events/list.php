<?php

use App\Models\Event;

?>

<h1>Events List</h1>

<?php if (!empty($events)): ?>
  <?php foreach ($events as $event): ?>
    <div class="event-item">
      <h2><?= htmlspecialchars($event->name) ?></h2>
      <p><?= htmlspecialchars($event->description) ?></p>
      <p><strong>Start:</strong> <?= htmlspecialchars($event->start_date) ?></p>
      <p><strong>End:</strong> <?= htmlspecialchars($event->end_date) ?></p>
      <hr>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <p>No events found.</p>
<?php endif; ?>