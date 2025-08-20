<?php if (!empty($error)): ?>
  <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<div class="edit-layout">
  <h1 class="edit-layout__title">Edit User</h1>
  <form action="/users/<?= $user->id ?>/update" method="post" enctype="multipart/form-data" class="edit-layout__form">
    <label for="name"><strong>Name</strong></label>
    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user->name) ?>" required>
    <label for="email"><strong>Email</strong></label>
    <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user->email) ?>" required>
    <label for="profile_picture"><strong>Profile picture</strong></label>
    <?php if ($user->profile_picture): ?>
      <img src="/uploads/profiles/<?= htmlspecialchars($user->profile_picture) ?>" alt="Current profile" style="max-width:60px;max-height:60px;display:block;margin-bottom:8px;">
    <?php endif; ?>
    <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
    <small>Laat leeg om huidige afbeelding te behouden.</small>

    <div class="form-group">
      <label><strong>Tickets</strong></label>
      <?php foreach ($allTickets as $ticket): ?>
        <label>
          <input type="checkbox" name="tickets[]" value="<?= $ticket->id ?>"
            <?= in_array($ticket->id, $userTicketIds) ? 'checked' : '' ?>>
          <?= htmlspecialchars($ticket->ticket_code) ?> (<?= htmlspecialchars($ticket->event_name) ?>)
        </label><br>
      <?php endforeach; ?>
    </div>

    <div class="edit-layout__actions">
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <a href="/users" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>