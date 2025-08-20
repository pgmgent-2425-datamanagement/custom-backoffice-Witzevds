<?php if (!empty($error)): ?>
  <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<div class="create-layout">
  <h1 class="create-layout__title">Add User</h1>
  <form action="/users" method="post" class="create-layout__form" enctype="multipart/form-data">
    <label for="name"><strong>Name</strong></label>
    <input type="text" name="name" id="name" class="form-control" required>
    <label for="email"><strong>Email</strong></label>
    <input type="email" name="email" id="email" class="form-control" required>
    <label for="profile_picture"><strong>Profile picture</strong></label>
    <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
    <div class="create-layout__actions">
      <button type="submit" class="btn btn-primary">Add User</button>
      <a href="/users" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>