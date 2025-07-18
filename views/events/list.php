<?php

use App\Models\Event;

function getNameById($arr, $id)
{
  foreach ($arr as $item) {
    if ($item->id == $id) return $item->name;
  }
  return $id;
}

?>

<link rel="stylesheet" href="/css/components.css">
<link rel="stylesheet" href="/css/events.css">

<div>
  <h1>📅 Events</h1>
  <a href="/events/create">+ Add New Event</a>
</div>

<?php if (!empty($events)): ?>
  <div>
    <table>
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Start</th>
          <th>End</th>
          <th>Location</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($events as $event): ?>
          <tr>
            <td>
              <?php if (!empty($event->image)): ?>
                <img src="/uploads/<?= htmlspecialchars($event->image) ?>" alt="<?= htmlspecialchars($event->name) ?>">
              <?php else: ?>
                <div>📷</div>
              <?php endif; ?>
            </td>
            <td><a href="/events/<?= $event->id ?>"><strong><?= htmlspecialchars($event->name) ?></strong></a></td>
            <td><?= htmlspecialchars($event->start_date) ?></td>
            <td><?= htmlspecialchars($event->end_date) ?></td>
            <td><?= htmlspecialchars(getNameById($locations, $event->location_id)) ?></td>
            <td><?= htmlspecialchars(getNameById($categories, $event->category_id)) ?></td>
            <td>
              <a href="/events/<?= $event->id ?>">View</a>
              <a href="/events/<?= $event->id ?>/edit">Edit</a>
              <form action="/events/<?= $event->id ?>/delete" method="post" style="display:inline;">
                <button type="submit" onclick="return confirm('Delete this event?')">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div>
    <h3>No Events Found</h3>
    <p>There are no events in the system yet. Add the first event to get started!</p>
    <a href="/events/create">Add First Event</a>
  </div>
<?php endif; ?>