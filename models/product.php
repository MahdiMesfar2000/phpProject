<?php

class Product {
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $date;
    private $image;
    private $db;

    public function __construct() {
        $this->db = Database::connectPDO();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getCategory_id() {
        return $this->category_id;
    }

    public function setCategory_id($category_id) {
        $this->category_id = $category_id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
        return $this;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    public function getProducts() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function delete(){
        $sql = "DELETE FROM products WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function save() {
        $sql = "INSERT INTO products (category_id, name, description, price, stock, date, image) VALUES (:category_id, :name, :description, :price, :stock, CURDATE(), :image)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $this->stock, PDO::PARAM_INT);
        $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }

    public function searchProducts($searchText) {
        $searchText = "%{$searchText}%";
        $sql = "SELECT * FROM products WHERE name LIKE :searchText";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':searchText', $searchText, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function sortProductsInCategory($sortType, $categoryId)
    {
        $sql = "SELECT * FROM products WHERE category_id = :category_id ORDER BY ";

        // Adjust the sorting based on the specified criteria
        switch ($sortType) {
            case 'lowToHigh':
                $sql .= "price ASC";
                break;
            case 'highToLow':
                $sql .= "price DESC";
                break;
            // Add more cases for additional sorting criteria if needed
            default:
                // Default sorting, you can adjust this based on your preference
                $sql .= "name ASC";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function searchProductsInCategory($searchText, $categoryId)
    {
        $searchText = "%{$searchText}%";
        $sql = "SELECT * FROM products WHERE category_id = :category_id AND name LIKE :searchText";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindParam(':searchText', $searchText, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() {
        $sql = "UPDATE products SET category_id = :category_id, name = :name, description = :description, price = :price, stock = :stock";

        if ($this->image !== null) {
            $sql .= ", image = :image";
        }

        $sql .= " WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $this->stock, PDO::PARAM_INT);

        // Bind image only if it's not null
        if ($this->image !== null) {
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
        }

        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }


    public function getAllProductsWithCategory() {
        $query = "SELECT p.*, c.name as category_name
                  FROM products p
                  INNER JOIN categories c ON p.category_id = c.id";

        $products = $this->db->query($query)->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    public function getCurProductWithCategory() {
        $query = "SELECT p.*, c.name as category_name
                  FROM products p
                  INNER JOIN categories c ON p.category_id = c.id
                  WHERE p.id = {$this->getId()}";

        $product = $this->db->query($query)->fetchObject();

        return $product;
    }

    public function getCurProduct() {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_OBJ);

        // Check if stock is zero
        if ($product && $product->stock == 0) {
            $product->stock_empty = true;
        } else {
            $product->stock_empty = false;
        }

        return $product;
    }

    public function getRandom($limit){
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getCatProducts() {
        $sql = "SELECT p.*, c.name AS 'catName' FROM products p "
            . "INNER JOIN categories c ON c.id = p.category_id "
            . "WHERE p.category_id = :category_id "
            . "ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


}
