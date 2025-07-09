<?php if (!empty($error)): ?>
  <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<h1>Edit User</h1>
<form action="/users/<?= $user->id ?>/update" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user->name) ?>" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user->email) ?>" required>
  </div>
  <div class="form-group">
    <label for="profile_picture">Profile picture (upload)</label>
    <?php if ($user->profile_picture): ?>
      <img src="/uploads/profiles/<?= htmlspecialchars($user->profile_picture) ?>" alt="Current profile" style="max-width:60px;max-height:60px;display:block;margin-bottom:8px;">
    <?php endif; ?>
    <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
    <small>Laat leeg om huidige afbeelding te behouden.</small>
  </div>
  <button type="submit" class="btn btn-primary">Save Changes</button>
  <a href="/users" class="btn btn-outline">Cancel</a>
</form>