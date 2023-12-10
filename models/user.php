<?php

class User {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $role;
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

    public function getFirst_name() {
        return $this->first_name;
    }

    public function setFirst_name($first_name) {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLast_name() {
        return $this->last_name;
    }

    public function setLast_name($last_name) {
        $this->last_name = $last_name;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPassword() {
        return password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
        return $this;
    }

    public function save() {
        $sql = "INSERT INTO users (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, 'user')";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->getPassword(), PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }

    public function login() {
        $result = false;

        $email = $this->email;
        $password = $this->password;

        // Check if the user exists
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            // Check password
            if (password_verify($password, $user->password)) {
                $result = $user;
            }
        }

        return $result;
    }
}
