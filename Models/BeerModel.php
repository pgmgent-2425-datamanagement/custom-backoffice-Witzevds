<?php

namespace App\Models;


class BeerModel extends BaseModel
{
  protected $table = 'beers'; // Naam van de tabel in de database
  protected $pk = 'beer_id';   // Primaire sleutel van de tabel

}
