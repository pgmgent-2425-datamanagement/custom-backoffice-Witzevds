<div class="edit-layout">
  <h1 class="edit-layout__title">Edit Category</h1>
  <form action="/categories/<?= $category->id ?>/update" method="post" class="edit-layout__form">
    <label for="name"><strong>Name</strong></label>
    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($category->name) ?>" required>
    <div class="edit-layout__actions">
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <a href="/categories" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>
