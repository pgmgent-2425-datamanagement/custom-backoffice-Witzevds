<h1 class="page-title">Brewery List</h1>


<!-- Brewery List -->
<div class="brewery-list">
  <?php if (!empty($breweries)): ?>
    <?php foreach ($breweries as $brewery): ?>
      <div class="brewery-card">
        <div class="brewery-info">
          <p><strong>Brewery Name:</strong> <?= htmlspecialchars($brewery->name) ?></p>
          <p><strong>Location:</strong> <?= htmlspecialchars($brewery->location) ?></p>
        </div>
        <div class="brewery-actions">
          <a href="/breweries/<?= $brewery->brewery_id; ?>" class="info-link">More Information</a>
          <form action="/breweries/delete/<?= htmlspecialchars($brewery->brewery_id) ?>" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this brewery?');">
            <button type="submit" class="delete-button">Delete Brewery</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="no-results">No breweries found.</p>
  <?php endif; ?>
</div>