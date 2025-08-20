<?php

use App\Models\User;
?>

<div class="detail-card">
  <h1 class="detail-card__title"><?= htmlspecialchars($user->name ?? 'User') ?></h1>
  <div class="detail-card__meta">
    <p><strong>Email:</strong> <?= htmlspecialchars($user->email ?? 'No email provided') ?></p>
    <?php if ($user->profile_picture): ?>
      <img src="/uploads/profiles/<?= htmlspecialchars($user->profile_picture) ?>" alt="Profile Picture" style="width:80px;border-radius:50%;margin:12px 0;">
    <?php else: ?>
      <div class="profile-picture-placeholder">
        <?= strtoupper(substr(htmlspecialchars($user->name), 0, 1)) ?>
      </div>
    <?php endif; ?>
    <p><strong>Geregistreerd op:</strong> <?= date('d-m-Y', strtotime($user->created_at ?? 'now')) ?></p>
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
  </div>
  <div class="detail-card__actions">
    <a href="/users/<?= $user->id ?>/edit" class="btn btn-secondary">Edit</a>
    <form action="/users/<?= $user->id ?>/delete" method="post" style="display:inline;">
      <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this user?')">Delete</button>
    </form>
    <a href="/users" class="btn btn-outline">Back to Users</a>
  </div>
</div>