<?php
class Product{
    private $conn;
    public function __construct(){
        include('Connect.php');
        $this->conn = $conn;
    }
    public function getAll(){
        $sql = 'SELECT * FROM courses';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getById($id){
        $sql = 'SELECT * FROM courses WHERE id='.$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function store($name, $instructor, $price, $duration, $thumbnail){
        $sql = "INSERT INTO courses(name, instructor, price, duration, thumbnail)
                        VALUES ('".$name."','".$instructor."', '".$price."', '".$duration."', '".$thumbnail."' )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return 'Thêm thành công';
    }
    public function update($id, $name, $instructor, $price, $duration, $thumbnail){
        $sql = "UPDATE courses SET
                name = '".$name."',
                instructor = '".$instructor."',
                price = '".$price."',
                duration = '".$duration."',
                thumbnail = '".$thumbnail."'
                WHERE id = $id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return 'Sửa thành công';
    }
    public function delete($id){
        $sql = 'DELETE FROM courses WHERE id ='. $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return 'Xóa thành công';
    }
}