<?php
require_once '../config/database.php';
require_once '../src/Controllers/ProductController.php';

header('Content-Type: application/json');
$productController = new ProductController($pdo);

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $id = $_GET['id'] ?? null;
        echo json_encode($productController->read($id));
        break;
        
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $productController->create($data);
        echo json_encode(['success' => $result]);
        break;
        
    case 'PUT':
        $id = $_GET['id'] ?? null;
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $productController->update($id, $data);
        echo json_encode(['success' => $result]);
        break;
        
    case 'DELETE':
        $id = $_GET['id'] ?? null;
        $result = $productController->delete($id);
        echo json_encode(['success' => $result]);
        break;
}
?>