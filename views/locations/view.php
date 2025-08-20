<?php

use App\Models\Location;
?>

<link rel="stylesheet" href="/css/components.css">
<link rel="stylesheet" href="/css/locations.css">

<div class="detail-card">
  <h1 class="detail-card__title"><?= htmlspecialchars($location->name ?? 'Location') ?></h1>
  <div class="detail-card__meta">
    <p><strong>Address:</strong> <?= htmlspecialchars($location->address) ?></p>
    <p><strong>City:</strong> <?= htmlspecialchars($location->city) ?></p>
    <p><strong>Country:</strong> <?= htmlspecialchars($location->country) ?></p>
  </div>
  <div class="detail-card__actions">
    <a href="/locations/<?= $location->id ?>/edit" class="btn btn-secondary">Edit</a>
    <form action="/locations/<?= $location->id ?>/delete" method="post" style="display:inline;">
      <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this location?')">Delete</button>
    </form>
    <a href="/locations" class="btn btn-outline">Back to Locations</a>
  </div>
</div>