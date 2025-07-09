<?php

use App\Models\User;
?>

<h1><?= htmlspecialchars($user->name ?? 'Unknown User') ?></h1>
<p><strong>Email:</strong> <?= htmlspecialchars($user->email ?? 'No email provided') ?></p>
<p><strong>Joined:</strong> <?= htmlspecialchars($user->created_at ?? 'Unknown date
') ?></p>
<?php if ($user->profile_picture): ?>
  <img src="/uploads/profiles/<?= htmlspecialchars($user->profile_picture) ?>" alt="Profile Picture" class="profile-picture">
<?php else: ?>
  <div class="profile-picture-placeholder">
    <?= strtoupper(substr(htmlspecialchars($user->name), 0, 1)) ?>
  </div>
<?php endif; ?>
<p><strong>Bio:</strong> <?= htmlspecialchars($user->bio ?? 'No bio available') ?></p>
<p><strong>Location:</strong> <?= htmlspecialchars($user->location ?? 'Unknown') ?></p>
<p><strong>Events Attended:</strong></p>
<ul>
  <?php if (!empty($user->events)): ?>
    <?php foreach ($user->events as $event): ?>
      <li>
        <a href="/events/<?= $event->id ?>" class="event-link">


          <?= htmlspecialchars($event->name) ?>
        </a>
      </li>
    <?php endforeach; ?>
  <?php else: ?>
    <li>No events attended.</li>
  <?php endif; ?>
</ul>
<p><strong>Tickets in bezit:</strong></p>
<ul>
  <?php if (!empty($user->tickets)): ?>
    <?php foreach ($user->tickets as $ticket): ?>
      <li>
        <?= htmlspecialchars($ticket['ticket_code'] ?? '') ?>
        (voor <a href="/events/<?= $ticket['event_id'] ?? '' ?>">
          <?= htmlspecialchars($ticket['event_name'] ?? '') ?>
        </a>, €<?= number_format($ticket['price'] ?? 0, 2, ',', '.') ?>)
      </li>
    <?php endforeach; ?>
  <?php else: ?>
    <li>Geen tickets in bezit.</li>
  <?php endif; ?>
</ul>