<?php

namespace App\Models;


class BeerModel extends BaseModel
{
  public $name;
  public $description;
  public $type_id;
  public $brewery_id;
  public $image_url;
  public $alcohol_percentage;

  protected $table = 'beers';

  protected $pk = 'beer_id';

  public function getById($id)
  {
    return $this->find($id);
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
    // Handling the uploaded image file
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $uploadDir = 'uploads/images/'; // Directory where images will be saved
      $fileName = basename($_FILES['image']['name']);
      $targetFilePath = $uploadDir . $fileName;

      // Create the upload directory if it doesn't exist
      if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
      }

      // Move the uploaded file to the target directory
      if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        // Set the image URL to be stored in the database
        $this->image_url = $targetFilePath;
      } else {
        echo "Error uploading the image.";
        return false;
      }
    } else {
      // If no image is uploaded, set a default or handle the absence accordingly
      $this->image_url = 'uploads/images/default.jpg'; // Or leave it empty if optional
    }

    // SQL query to insert the beer data into the database
    $sql = "INSERT INTO `beers` (`name`, `description`, `type_id`, `brewery_id`, `image_url`, `alcohol_percentage`) 
              VALUES (:name, :description, :type_id, :brewery_id, :image_url, :alcohol_percentage)";

    $pdo_statement = $this->db->prepare($sql);
    $success = $pdo_statement->execute([
      ':name' => $this->name,
      ':description' => $this->description,
      ':type_id' => $this->type_id,
      ':brewery_id' => $this->brewery_id,
      ':image_url' => $this->image_url,
      ':alcohol_percentage' => (float)$this->alcohol_percentage
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
