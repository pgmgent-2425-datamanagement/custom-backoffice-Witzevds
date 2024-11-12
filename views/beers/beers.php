<h1 class="page-title">Beer List</h1>

<!-- Search Form -->
<div class="search-container">
  <form method="GET" class="search-form">
    <label for="search"></label>
    <input type="text" name="search" placeholder="Zoekterm" value="<?= isset($search) ? htmlspecialchars($search) : '' ?>" class="search-input">
    <input type="submit" value="Zoeken" class="search-button">
  </form>
</div>

<!-- Beer List -->
<div class="beer-list">
  <?php if (!empty($beers)): ?>
    <?php foreach ($beers as $beer): ?>
      <div class="beer-card">
        <div class="beer-info">
          <?php if (!empty($beer->name)): ?>
            <p><strong>Name:</strong> <?= htmlspecialchars($beer->name) ?></p>
          <?php endif; ?>
          <?php if (!empty($beer->alcohol_percentage)): ?>
            <p><strong>Alcohol Percentage:</strong> <?= htmlspecialchars($beer->alcohol_percentage) ?>%</p>
          <?php endif; ?>
          <?php if (!empty($beer->description)): ?>
            <p><strong>Description:</strong> <?= htmlspecialchars($beer->description) ?></p>
          <?php endif; ?>
          <?php if (!empty($beer->brewery_id)): ?>
            <p><strong>Brewery ID:</strong> <?= htmlspecialchars($beer->brewery_id) ?></p>
          <?php endif; ?>
          <?php if (!empty($beer->location)): ?>
            <p><strong>Location:</strong> <?= htmlspecialchars($beer->location) ?></p>
          <?php endif; ?>
        </div>
        <div class="beer-actions">
          <a href="/beers/<?= $beer->beer_id; ?>" class="info-link">Meer informatie</a>
          <form action="/beers/delete/<?= htmlspecialchars($beer->beer_id) ?>" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this beer?');">
            <button type="submit" class="delete-button">Delete Beer</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="no-results">No beers found.</p>
  <?php endif; ?>
</div>