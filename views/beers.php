<h1>Beer List</h1>
<ul>
  <?php if (!empty($beers)): ?>
    <?php foreach ($beers as $beer): ?>
      <li class="beer-card">
        <strong>Name:</strong> <?= htmlspecialchars($beer->name) ?><br>
        <strong>Alcohol Percentage:</strong> <?= htmlspecialchars($beer->alcohol_percentage) ?>%<br>
        <strong>Brewery ID:</strong> <?= htmlspecialchars($beer->brewery_id) ?>
        <strong>Beer ID:</strong> <?= htmlspecialchars($beer->beer_id) ?>
      </li>
    <?php endforeach; ?>
  <?php else: ?>
    <p>No beers found.</p>
  <?php endif; ?>
</ul>

<h2>Reviews</h2>
<ul>
  <?php if (!empty($reviews)): ?>
    <?php foreach ($reviews as $review): ?>
      <li class="review-card">
        <strong>Review ID:</strong> <?= htmlspecialchars($review->review_id) ?><br>
        <strong>User ID:</strong> <?= htmlspecialchars($review->user_id) ?><br>
        <strong>Review Text:</strong> <?= htmlspecialchars($review->review_text) ?>
        <strong>Beer ID:</strong> <?= htmlspecialchars($review->beer_id) ?>
      </li>
    <?php endforeach; ?>
  <?php else: ?>
    <p>No reviews found.</p>
  <?php endif; ?>
</ul>