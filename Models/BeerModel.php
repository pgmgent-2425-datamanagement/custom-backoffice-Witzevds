<?php

namespace App\Models;


class BeerModel extends BaseModel
{
  protected function search($search)
  {

    $sql = 'SELECT * FROM `' . $this->table . '` WHERE `name` LIKE :search OR `description` LIKE :search';
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute(['search' => '%' . $search . '%']);

    $db_items = $pdo_statement->fetchAll();

    return self::castToModel($db_items);
  }
  protected $table = 'beers'; // Naam van de tabel in de database
  protected $pk = 'beer_id';   // Primaire sleutel van de tabel

}
