<div class="create-layout">
  <h1 class="create-layout__title">Add Category</h1>
  <form action="/categories" method="post" class="create-layout__form">
    <label for="name"><strong>Name</strong></label>
    <input type="text" name="name" id="name" class="form-control" required>
    <div class="create-layout__actions">
      <button type="submit" class="btn btn-primary">Add Category</button>
      <a href="/categories" class="btn btn-outline">Cancel</a>
    </div>
  </form>
</div>
