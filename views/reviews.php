<h2>Reviews</h2>
<ul>
  <?php if (!empty($reviews)): ?>
    <?php foreach ($reviews as $review): ?>
      <li class="review-card">
        <strong>Review ID:</strong> <?= htmlspecialchars($review->review_id) ?><br>
        <strong>User ID:</strong> <?= htmlspecialchars($review->user_id) ?><br>
        <strong>Review Text:</strong> <?= htmlspecialchars($review->review_text) ?>
      </li>
    <?php endforeach; ?>
  <?php else: ?>
    <p>No reviews found.</p>
  <?php endif; ?>
</ul>