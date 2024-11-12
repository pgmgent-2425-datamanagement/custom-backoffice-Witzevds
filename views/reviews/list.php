<h2 class="reviews-title">Reviews</h2>

<div class="reviews-list">
  <?php foreach ($list as $reviews) : ?>
    <div class="review-card">
      <h3 class="review-rating"><?= htmlspecialchars($reviews->rating) ?>/5</h3>
      <p class="review-text"><?= htmlspecialchars($reviews->review_text) ?></p>
      <a href="/reviews" class="view-all-link">Bekijk alles</a>
    </div>
  <?php endforeach; ?>
</div>