<h1 class="page-title">Beer List</h1>

<div class="form-container">
  <form method="POST" class="beer-form">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Enter beer name" value="">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" id="description" rows="4" placeholder="Enter description"></textarea>
    </div>

    <div class="form-group">
      <label for="type_id">Type ID</label>
      <input type="text" name="type_id" id="type_id" placeholder="Enter type ID" value="">
    </div>

    <div class="form-group">
      <label for="brewery_id">Brewery ID</label>
      <input type="text" name="brewery_id" id="brewery_id" placeholder="Enter brewery ID" value="">
    </div>

    <div class="form-group">
      <label for="image_url">Image URL</label>
      <input type="text" name="image_url" id="image_url" placeholder="Enter image URL" value="">
    </div>

    <div class="form-group">
      <label for="alcohol_percentage">Alcohol Percentage</label>
      <input type="text" name="alcohol_percentage" id="alcohol_percentage" placeholder="Enter alcohol percentage" value="">
    </div>

    <div class="form-actions">
      <input type="submit" value="Save" class="submit-button">
    </div>
  </form>
</div>