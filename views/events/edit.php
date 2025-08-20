<?php if (!empty($error)): ?>
  <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
<?php endif; ?>

<div class="edit-layout">
  <h1 class="edit-layout__title">Edit Event</h1>
  <form action="/events/<?= $event->id ?>/update" method="post" enctype="multipart/form-data" class="edit-layout__form">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($event->name) ?>" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" id="description" class="form-control"><?= htmlspecialchars($event->description) ?></textarea>
    </div>
    <div class="form-group">
      <label for="start_date">Start Date</label>
      <input type="date" name="start_date" id="start_date" class="form-control" value="<?= htmlspecialchars($event->start_date) ?>" required>
    </div>
    <div class="form-group">
      <label for="end_date">End Date</label>
      <input type="date" name="end_date" id="end_date" class="form-control" value="<?= htmlspecialchars($event->end_date) ?>" required>
    </div>
    <div class="form-group">
      <label for="location_id">Location</label>
      <select name="location_id" id="location_id" class="form-control" required>
        <option value="">-- Select Location --</option>
        <?php foreach ($locations as $loc): ?>
          <option value="<?= $loc->id ?>" <?= $event->location_id == $loc->id ? 'selected' : '' ?>><?= htmlspecialchars($loc->name) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id" id="category_id" class="form-control" required>
        <option value="">-- Select Category --</option>
        <?php foreach ($categories as $cat): ?>
          <option value="<?= $cat->id ?>" <?= $event->category_id == $cat->id ? 'selected' : '' ?>><?= htmlspecialchars($cat->name) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="edit-layout__actions">
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <a href="/events/<?= $event->id ?>" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>