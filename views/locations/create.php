<?php if (!empty($error)): ?>
  <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<h1>Add Location</h1>
<form action="/locations" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" name="country" id="country" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Add Location</button>
  <a href="/locations" class="btn btn-outline">Cancel</a>
</form>