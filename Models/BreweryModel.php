<?php

namespace App\Models;

class BreweryModel extends BaseModel
{
  protected $table = 'breweries';
  protected $pk = 'brewery_id';
  public $name;
  public $brewery_id;
  public $location;

  public function getById($id)
  {
    return $this->findById($this->pk, $id);
  }



  protected function search($search)
  {
    $sql = 'SELECT * FROM `' . $this->table . '` WHERE `name` LIKE :search';
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute(['search' => '%' . $search . '%']);

    $db_items = $pdo_statement->fetchAll();

    return self::castToModel($db_items);
  }

  public function save()
  {
    $sql = "INSERT INTO `{$this->table}` (`name`, `location`, `brewery_id`) VALUES (:name, :location, :brewery_id)";

    $pdo_statement = $this->db->prepare($sql);
    $success = $pdo_statement->execute([
      ':name' => $this->name,
      ':location' => $this->location,
      ':brewery_id' => $this->brewery_id,
    ]);

    return $success;
  }

  public function delete($id)
  {
    $sql = "DELETE FROM `{$this->table}` WHERE `{$this->pk}` = :id";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([':id' => $id]);
  }
}
