<h1>
  <?= htmlspecialchars($beers->name); ?>
</h1>

<p>
  <strong>Description:</strong> <?= htmlspecialchars($beers->description); ?>
</p>


<p>
  <strong>Alcohol Percentage:</strong> <?= htmlspecialchars($beers->alcohol_percentage); ?>%
</p>

<a href="/beers/edit/<?= htmlspecialchars($beers->beer_id ?? '') ?>" class="btn">Edit Beer</a>