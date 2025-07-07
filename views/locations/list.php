<?php

use App\Models\Location;
?>

<link rel="stylesheet" href="/css/components.css">
<link rel="stylesheet" href="/css/locations.css">

<div>
  <h1>📍 Locations</h1>
  <a href="/locations/create">+ Add New Location</a>
</div>

<?php if (!empty($locations)): ?>
  <div>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>Country</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($locations as $location): ?>
          <tr>
            <td><a href="/locations/<?= $location->id ?>"><strong><?= htmlspecialchars($location->name) ?></strong></a></td>
            <td><?= htmlspecialchars($location->address) ?></td>
            <td><?= htmlspecialchars($location->city) ?></td>
            <td><?= htmlspecialchars($location->country) ?></td>
            <td>
              <a href="/locations/<?= $location->id ?>">View</a>
              <a href="/locations/<?= $location->id ?>/edit">Edit</a>
              <form action="/locations/<?= $location->id ?>/delete" method="post" style="display:inline;">
                <button type="submit" onclick="return confirm('Delete this location?')">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div>
    <h3>No Locations Found</h3>
    <p>There are no locations in the system yet. Add the first location to get started!</p>
    <a href="/locations/create">Add First Location</a>
  </div>
<?php endif; ?>