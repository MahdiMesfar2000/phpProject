<?php

class Order{
    private $id;
    private $user_id;
    private $state;
    private $city;
    private $address;
    private $total_price;
    private $status;
    private $date;
    private $time;
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

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getTotal_price()
    {
        return $this->total_price;
    }

    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    public function getProducts(){
        $stmt = $this->db->query("SELECT * FROM orders ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function save(){
        $sql = "INSERT INTO orders (user_id, state, city, address, total_price, status, date, time) VALUES (:user_id, :state, :city, :address, :total_price, 'confirmed', CURDATE(), CURTIME())";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $stmt->bindParam(':state', $this->state, PDO::PARAM_STR);
        $stmt->bindParam(':city', $this->city, PDO::PARAM_STR);
        $stmt->bindParam(':address', $this->address, PDO::PARAM_STR);
        $stmt->bindParam(':total_price', $this->total_price, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }

    public function getCurProduct(){
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = :id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function saveOrderProducts() {
        // Get ID of the last order
        $stmt = $this->db->query("SELECT LAST_INSERT_ID() as 'order'");
        $orderId = $stmt->fetch(PDO::FETCH_OBJ)->order;

        // Insert last order in ordersProducts table
        foreach ($_SESSION['cart'] as $index => $value) {
            $product = $value['product'];

            // Update the stock of the product
            $newStock = $product->stock - $value['unities'];
            $this->updateProductStock($product->id, $newStock);

            // Insert into ordersProducts table
            $insert = "INSERT INTO ordersProducts VALUES(NULL, :orderId, :productId, :unities)";
            $stmt = $this->db->prepare($insert);
            $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
            $stmt->bindParam(':productId', $product->id, PDO::PARAM_INT);
            $stmt->bindParam(':unities', $value['unities'], PDO::PARAM_INT);

            $result = $stmt->execute();
        }

        return $result;
    }

    private function updateProductStock($productId, $newStock) {
        $sql = "UPDATE products SET stock = :newStock WHERE id = :productId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':newStock', $newStock, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function getLastOrder(){
        // Get last order
        $stmt = $this->db->query("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAllByUser(){
        // Get all orders by a specific user
        $sql = "SELECT o.* FROM orders AS o WHERE o.user_id = :user_id ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllByUserWithUserInfo() {
        // Get all orders by a specific user along with user information
        $sql = "SELECT o.*, u.first_name, u.last_name
        FROM orders AS o
        INNER JOIN users AS u ON o.user_id = u.id
        ORDER BY o.id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }



    public function getSpecificOrder(){
        $sql = "SELECT * FROM orders WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getOneByUser(){
        $sql = "SELECT * FROM orders AS o WHERE user_id = :user_id ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getProductsByOrder(){
        $sql = "SELECT p.*, op.unities FROM products p INNER JOIN ordersProducts op ON p.id = op.product_id WHERE op.order_id = :order_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':order_id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUnities(){
        $sql = "SELECT *, COUNT(unities) AS cnt FROM ordersProducts WHERE order_id = :order_id HAVING cnt > 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':order_id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(){
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }
}
