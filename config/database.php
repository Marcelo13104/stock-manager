<?php
// config/database.php
$host = 'localhost';
$dbname = 'stock_manager';
$username = 'root';
$password = 'Elk*1202';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>