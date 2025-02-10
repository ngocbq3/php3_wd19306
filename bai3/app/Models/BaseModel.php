<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn = null;
    protected $tableName = null;
    protected $primarKey = 'id';
    protected $sqlBuilder;
    public function __construct()
    {
        try {
            $this->conn = new \PDO("mysql:host=localhost; dbname=php2_wd19306; charset=utf8; port=3306", "root", "");
        } catch (\PDOException $e) {
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
        }
    }

    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
