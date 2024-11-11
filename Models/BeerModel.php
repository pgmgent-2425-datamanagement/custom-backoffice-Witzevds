<?php

namespace App\Models;


class BeerModel extends BaseModel
{

  protected $table = 'beers';

  protected $pk = 'beer_id';

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


  public function delete($id)
  {
    $sql = 'DELETE FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :id';
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([':id' => $id]);
  }

  public function update($id, $data)
  {
    $sql = "UPDATE `{$this->table}` SET 
                `name` = :name, 
                `description` = :description, 
                `type_id` = :type_id, 
                `brewery_id` = :brewery_id, 
                `image_url` = :image_url, 
                `alcohol_percentage` = :alcohol_percentage 
                WHERE `{$this->pk}` = :id";

    $stmt = $this->db->prepare($sql);

    // Bind parameters and execute the statement
    return $stmt->execute([
      ':id' => $id,
      ':name' => $data['name'],
      ':description' => $data['description'],
      ':type_id' => $data['type_id'],
      ':brewery_id' => $data['brewery_id'],
      ':image_url' => $data['image_url'],
      ':alcohol_percentage' => $data['alcohol_percentage']
    ]);
  }
}
