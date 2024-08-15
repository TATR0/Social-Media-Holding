<?php
$host = 'localhost';
$db = 'my_database';
$user = 'root';
$pass = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function addProduct($product) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO products (title, price, description, image, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$product['title'], $product['price'], $product['description'], $product['image'], $product['category']]);
}

function getProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
