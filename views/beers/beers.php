<h1>Beer List</h1>

<form method="GET">
  <label for="">zoeken
    <input type="text" name="search" placeholder="Zoekterm" value="<?= isset($search) ? htmlspecialchars($search) : '' ?>">
  </label>
  <input type="submit" value="zoeken">
</form>


<ul>
  <?php if (!empty($beers)): ?>
    <?php foreach ($beers as $beer): ?>
      <li class="beer-card">
        <strong>Name:</strong> <?= htmlspecialchars($beer->name) ?><br>
        <strong>Alcohol Percentage:</strong> <?= htmlspecialchars($beer->alcohol_percentage) ?>%<br>
        <strong>description</strong> <?= htmlspecialchars($beer->description) ?><br>
        <strong>Brewery ID:</strong> <?= htmlspecialchars($beer->brewery_id) ?>
        <a href="/beers/<?= $beer->beer_id; ?>">meer informatie</a>
      </li>
      <form action="/beers/delete/<?= $beer->beer_id ?>" method="POST">
        <input type="hidden" name="id" value="<?= $beer->beer_id ?>">
        <button type="submit">Delete</button>
      </form>

    <?php endforeach; ?>
  <?php else: ?>
    <p>No beers found.</p>
  <?php endif; ?>
</ul>