<?php if (!empty($error)): ?>
  <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<h1>Add User</h1>
<form action="/users" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="profile_picture">Profile picture (upload)</label>
    <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
  </div>
  <button type="submit" class="btn btn-primary">Add User</button>
  <a href="/users" class="btn btn-outline">Cancel</a>
</form>