<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn = null;
    protected $tableName = null;
    protected $primaryKey = 'id';
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

    /**
     * create: thêm mới dữ liệu từ 1 bảng
     * $data: dữ liệu mảng có key và value trong key là tên cột còn value là giá trị tương ứng
     */
    public static function create($data)
    {
        $model =  new static;
        $sql = "INSERT INTO $model->tableName(";
        $values = "VALUES(";
        foreach ($data as $column => $val) {
            $sql .= "`$column`, ";
            $values .= ":$column, ";
        }

        $sql = rtrim($sql, ', ') . ") " . rtrim($values, ', ') . ")";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
    }

    /**
     * delete: là phương thức xóa dữ liệu theo id
     */
    public static function delete($id)
    {
        $model = new static;
        $sql = "DELETE FROM $model->tableName WHERE $model->primaryKey=:$model->primaryKey";
        // dd($sql);
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["$model->primaryKey" => $id]);
    }

    /**
     * update: phương thức cập nhật
     * @data: là mảng dữ liệu dùng để cập nhật có key là tên cột và value tương ứng
     * @id: là giá trị của khóa chính
     */
    public static function update($data, $id)
    {
        $model = new static;
        $sql = "UPDATE $model->tableName SET ";

        foreach ($data as $column => $val) {
            $sql .= "`$column` = :$column, ";
        }
        //Loại bỏ dấu ", " và thêm điều kiện
        $sql = rtrim($sql, ", ") . " WHERE $model->primaryKey=:$model->primaryKey";

        $stmt = $model->conn->prepare($sql);

        //Thêm $id vào trong mảng $data
        $data["$model->primaryKey"] = $id;

        return $stmt->execute($data);
    }

    /**
     * @find: phương thức Lấy 1 dữ liệu theo id
     */
    public static function find($id)
    {
        $model = new static;
        $sql = "SELECT * FROM $model->tableName WHERE $model->primaryKey=:$model->primaryKey";

        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["$model->primaryKey" => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result[0] ?? [];
    }

    /**
     * @where: phương thức lấy dữ liệu theo điều kiện
     * @param $column: tên cột làm điều kiện
     * @param $operator: biểu thức điều kiện
     * @param $value: giá trị
     */
    public static function where($column, $operator, $value)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `$column` $operator '$value'";
        return $model;
    }

    /**
     * @method get: lấy dữ liệu
     */
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
