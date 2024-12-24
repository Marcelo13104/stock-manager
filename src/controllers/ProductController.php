<?php
class ProductController {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function create($data) {
        $sql = "INSERT INTO products (name, description, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$data['name'], $data['description'], $data['quantity'], $data['price']]);
    }
    
    public function read($id = null) {
        if ($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $this->pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $data) {
        $sql = "UPDATE products SET name = ?, description = ?, quantity = ?, price = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$data['name'], $data['description'], $data['quantity'], $data['price'], $id]);
    }
    
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>