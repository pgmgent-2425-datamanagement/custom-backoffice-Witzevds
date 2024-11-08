<h2>Reviews</h2>

<?php foreach ($list as $reviews) : ?>
  <h2><?= $reviews->rating ?>/5</h2>
  <p><?= $reviews->review_text ?></p>
  <a href="">Bekijk alles</a>
<?php endforeach; ?>