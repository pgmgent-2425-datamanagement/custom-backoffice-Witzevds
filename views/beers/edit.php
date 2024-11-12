<h1>Edit Beer</h1>

<form action="/beers/update/<?= htmlspecialchars($beer->beer_id) ?>" method="POST">
  <p>
    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($beer->name) ?>" required>
  </p>
  <p>
    <label>Description</label>
    <textarea name="description" rows="4" required><?= htmlspecialchars($beer->description) ?></textarea>
  </p>
  <p>
    <label>Type ID</label>
    <input type="number" name="type_id" value="<?= htmlspecialchars($beer->type_id) ?>" required>
  </p>
  <p>
    <label>Brewery ID</label>
    <input type="number" name="brewery_id" value="<?= htmlspecialchars($beer->brewery_id) ?>" required>
  </p>
  <p>
    <label>Image URL</label>
    <input type="text" name="image_url" value="<?= htmlspecialchars($beer->image_url) ?>">
  </p>
  <p>
    <label>Alcohol Percentage</label>
    <input type="number" step="0.1" name="alcohol_percentage" value="<?= htmlspecialchars($beer->alcohol_percentage) ?>" required>
  </p>
  <button type="submit">Save Changes</button>
</form>