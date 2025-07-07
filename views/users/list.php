<?php

use App\Models\User;

?>

<!-- Load CSS files -->
<link rel="stylesheet" href="/css/components.css">
<link rel="stylesheet" href="/css/users.css">

<div>
  <h1>👥 User Management</h1>
  <a href="/users/create">+ Add New User</a>
</div>

<?php if (isset($users) && is_array($users) && count($users) > 0): ?>

  <div>
    <div>
      <span><?= count($users) ?></span>
      <span>Total Users</span>
    </div>
    <div>
      <span><?= count(array_filter($users, fn($u) => $u->profile_picture)) ?></span>
      <span>With Profile Pictures</span>
    </div>
  </div>

  <div>
    <table>
      <thead>
        <tr>
          <th>Profile</th>
          <th>Name</th>
          <th>Email</th>
          <th>Joined</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td>
              <?php if ($user->profile_picture): ?>
                <img src="/uploads/profiles/<?= htmlspecialchars($user->profile_picture) ?>"
                  alt="Profile">
              <?php else: ?>
                <div>
                  <?= strtoupper(substr(htmlspecialchars($user->name), 0, 1)) ?>
                </div>
              <?php endif; ?>
            </td>
            <td>
              <strong><?= htmlspecialchars($user->name) ?></strong>
            </td>
            <td>
              <a href="mailto:<?= htmlspecialchars($user->email) ?>">
                <?= htmlspecialchars($user->email) ?>
              </a>
            </td>
            <td>
              <span>
                <?= date('M j, Y', strtotime($user->created_at ?? 'now')) ?>
              </span>
            </td>
            <td class="actions-cell">
              <div class="action-buttons">
                <a href="/users/<?= $user->id ?>" class="btn btn-sm btn-outline" title="View User">
                  👁️
                </a>
                <a href="/users/<?= $user->id ?>/edit" class="btn btn-sm btn-outline" title="Edit User">
                  ✏️
                </a>
                <form action="/users/<?= $user->id ?>/delete" method="post" style="display:inline;">
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

<?php else: ?>
  <div>
    <h3>No Users Found</h3>
    <p>There are no users in the system yet. Add the first user to get started!</p>
    <a href="/users/create">Add First User</a>
  </div>
<?php endif; ?>