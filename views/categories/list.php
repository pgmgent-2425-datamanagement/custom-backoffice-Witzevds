<div class="list-layout">
  <div class="list-layout__header">
    <h1 class="list-layout__title">Categories</h1>
    <a href="/categories/create" class="btn btn-primary">+ Add Category</a>
  </div>
  <div class="list-layout__items categories-list">
    <?php foreach ($categories as $category): ?>
      <div class="categories-list__card">
        <strong><?= htmlspecialchars($category->name) ?></strong>
        <div class="categories-list__actions">
          <a href="/categories/<?= $category->id ?>/edit" class="btn btn-sm btn-outline">✏️</a>
          <form action="/categories/<?= $category->id ?>/delete" method="post" style="display:inline;">
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
