<?php

use App\Models\User;

?>


<div class="list-layout">
  <div class="list-layout__header">
    <h1 class="list-layout__title">Users</h1>
    <a href="/users/create" class="btn btn-primary">+ Add User</a>
  </div>
  <div class="list-layout__items users-list">
    <?php foreach ($users as $user): ?>
      <div class="users-list__card">
        <div class="users-list__profile">
          <?php if ($user->profile_picture): ?>
            <img src="/uploads/profiles/<?= htmlspecialchars($user->profile_picture) ?>" alt="Profile" class="users-list__profile-img">
          <?php else: ?>
            <div class="users-list__profile-placeholder">
              <?= strtoupper(substr(htmlspecialchars($user->name), 0, 1)) ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="users-list__info">
          <strong class="users-list__name"><?= htmlspecialchars($user->name) ?></strong>
          <a href="mailto:<?= htmlspecialchars($user->email) ?>" class="users-list__email"><?= htmlspecialchars($user->email) ?></a>
          <span class="users-list__date"><?= date('M j, Y', strtotime($user->created_at ?? 'now')) ?></span>
        </div>
        <div class="users-list__actions">
          <a href="/users/<?= $user->id ?>" class="btn btn-sm btn-outline users-list__action" title="View User">👁️</a>
          <a href="/users/<?= $user->id ?>/edit" class="btn btn-sm btn-outline users-list__action" title="Edit User">✏️</a>
          <form action="/users/<?= $user->id ?>/delete" method="post" style="display:inline;">
            <button type="submit" class="btn btn-sm btn-danger users-list__action" onclick="return confirm('Delete this user?')">Delete</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>