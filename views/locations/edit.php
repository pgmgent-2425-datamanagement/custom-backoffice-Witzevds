<?php if (!empty($error)): ?>
  <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<h1>Edit Location</h1>
<form action="/locations/<?= $location->id ?>/update" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($location->name) ?>" required>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" class="form-control" value="<?= htmlspecialchars($location->address) ?>" required>
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city" class="form-control" value="<?= htmlspecialchars($location->city) ?>" required>
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" name="country" id="country" class="form-control" value="<?= htmlspecialchars($location->country) ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Save Changes</button>
  <a href="/locations" class="btn btn-outline">Cancel</a>
</form>