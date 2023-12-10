<?php

class Category{
    private $id;
    private $name;
    private $db;

    public function __construct(){
        $this->db = Database::connectPDO();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCategories(){
        $stmt = $this->db->query("SELECT * FROM categories ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSingleCategory(){
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function save(){
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }

    public function getCurCategory(){
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update(){
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }
}
