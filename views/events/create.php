<?php if (!empty($error)): ?>
  <div> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<h1>Add Event</h1>
<form action="/events" method="post">
  <div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>
  </div>
  <div>
    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>
  </div>
  <div>
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" required>
  </div>
  <div>
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" required>
  </div>
  <div>
    <label for="location_id">Location</label>
    <select name="location_id" id="location_id" required>
      <option value="">-- Select Location --</option>
      <?php foreach ($locations as $loc): ?>
        <option value="<?= $loc->id ?>"><?= htmlspecialchars($loc->name) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" required>
      <option value="">-- Select Category --</option>
      <?php foreach ($categories as $cat): ?>
        <option value="<?= $cat->id ?>"><?= htmlspecialchars($cat->name) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <label for="image">Image (URL of bestandsnaam)</label>
    <input type="text" name="image" id="image">
  </div>
  <button type="submit">Add Event</button>
  <a href="/events">Cancel</a>
</form>