<?php

namespace App\Models;


class ReviewModel extends BaseModel
{
  public int $review_id;
  public string $rating;
  public string $review_text;


  protected $table = 'reviews'; // Naam van de tabel in de database
  protected $pk = 'review_id';   // Primaire sleutel van de tabel

}
