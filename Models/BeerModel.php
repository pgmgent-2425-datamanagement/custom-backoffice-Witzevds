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

  public function save()
  {
    // print_r('Doe de save van een cocktail');
    $sql = "INSERT INTO `beers` (`name`, `description`, `type_id`, `brewery_id`, `image_url`, `alcohol_percentage`) VALUES ( :name, :description, :type_id, :brewery_id, :image_url, :alcohol_percentage)";

    $pdo_statement = $this->db->prepare($sql);
    $succes =  $pdo_statement->execute([
      ':name' => $this->name,
      ':description' => $this->description,
      ':type_id' => $this->type_id,
      ':brewery_id' => $this->brewery_id,
      ':image_url' => $this->image_url,
      ':alcohol_percentage' => (float)$this->alcohol_percentage
    ]);

    return $succes;
  }
  protected $table = 'beers';

  protected $pk = 'beer_id';
}
