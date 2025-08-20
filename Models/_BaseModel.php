<?php

namespace App\Models;

#[\AllowDynamicProperties]
class BaseModel
{

    protected static $table;
    protected $pk;
    protected $db;

    public static function __callStatic($method, $arg)
    {
        $obj = new static;
        $result = call_user_func_array(array($obj, $method), $arg);
        if (method_exists($obj, $method))
            return $result;
        return $obj;
    }

    public function __construct()
    {
        if (!isset(static::$table)) {
            $single = strtolower($this->getClassName(get_called_class()));
            switch (substr($single, -1)) {
                case 'y':
                    //for example: Category model => categories table
                    static::$table = substr($single, 0, -1) . 'ies';
                    break;
                case 's':
                    //for example: News model => news table
                    static::$table = $single;
                    break;
                default:
                    //for example: User model => users table
                    static::$table = $single . 's';
            }
        }
        if (!isset($this->pk)) {
            $this->pk = 'id';
        }
        if (!isset($this->db)) {
            global $db;
            $this->db = $db;
        }
    }

    private function all()
    {

        $sql = 'SELECT * FROM `' . static::$table . '`';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll();

        return self::castToModel($db_items);
    }

    public static function find(int $id)
    {
        $obj = new static;
        $sql = 'SELECT * FROM `' . static::$table . '` WHERE `' . $obj->pk . '` = :p_id';
        $pdo_statement = $obj->db->prepare($sql);
        $pdo_statement->execute([':p_id' => $id]);
        $db_item = $pdo_statement->fetchObject();
        return $obj->castToModel($db_item);
    }

    protected function castToModel($object)
    {
        if (!is_object($object) && isset($object[0]) && is_array($object[0])) {
            //array of items
            $items = [];
            foreach ($object as $db_item) {
                $items[] = $this->castToModel($db_item);
            }
            return $items;
        }
        $db_item = (object) $object;
        //Creates new Model
        $model_name = get_class($this);
        $item = new $model_name();
        //Loops through the db columns and 

        foreach ($db_item as $column => $value) {
            $item->{$column} = $value;
        }
        return $item;
    }

    //static method to call like: Model::deleteById(1);
    private function deleteById(int $id)
    {
        $sql = 'DELETE FROM `' . static::$table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $this->db->prepare($sql);
        return $pdo_statement->execute([':p_id' => $id]);
    }

    //public method to call like: $my_model->delete();
    public function delete()
    {
        $this->deleteById($this->{$this->pk});
    }

    public static function create(array $data)
    {
        $obj = new static;
        $table = static::$table;
        $columns = array_keys($data);
        $placeholders = array_map(fn($col) => ':' . $col, $columns);
        $sql = "INSERT INTO `$table` (" . implode(',', $columns) . ") VALUES (" . implode(',', $placeholders) . ")";
        global $db;
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        $id = $db->lastInsertId();
        return static::find($id);
    }

    public function save()
    {
        $table = static::$table;
        $pk = $this->pk;
        $columns = [];
        $params = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($key === 'table' || $key === 'pk' || $key === 'db') continue;
            if ($key === $pk) continue; // skip primary key in SET
            $columns[] = "`$key` = :$key";
            $params[":$key"] = $value;
        }
        $params[":pk"] = $this->{$pk};
        $sql = "UPDATE `$table` SET " . implode(', ', $columns) . " WHERE `$pk` = :pk";
        global $db;
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }

    private function getClassName($classname)
    {
        return (substr($classname, strrpos($classname, '\\') + 1));
    }
}
