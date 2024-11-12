<h1 class="page-title">Beer List</h1>

<div class="form-container">
  <form method="POST" action="/beers/add" enctype="multipart/form-data" class="beer-form">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Enter beer name" required>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" id="description" rows="4" placeholder="Enter description" required></textarea>
    </div>

    <div class="form-group">
      <label for="type_id">Type ID</label>
      <input type="text" name="type_id" id="type_id" placeholder="Enter type ID" required>
    </div>

    <div class="form-group">
      <label for="brewery_id">Brewery ID</label>
      <input type="text" name="brewery_id" id="brewery_id" placeholder="Enter brewery ID" required>
    </div>

    <div class="form-group">
      <label for="image">Upload Image</label>
      <input type="file" name="image" id="image" accept="image/*" required>
    </div>

    <div class="form-group">
      <label for="alcohol_percentage">Alcohol Percentage</label>
      <input type="number" step="0.1" name="alcohol_percentage" id="alcohol_percentage" placeholder="Enter alcohol percentage" required>
    </div>

    <div class="form-actions">
      <button type="submit" class="submit-button">Save</button>
    </div>
  </form>
</div>