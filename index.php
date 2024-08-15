<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apiUrl = 'https://dummyjson.com/products/search?q=iPhone';
    $response = file_get_contents($apiUrl);
    $products = json_decode($response, true)['products'];

    foreach ($products as $product) {
        addProduct($product);
    }
}

$products = getProducts();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Продукты</title>
</head>
<body>
    <h1>Продукты iPhone</h1>
    <form method="POST">
        <button type="submit">Добавить продукты iPhone</button>
    </form>

    <h2>Сохраненные продукты:</h2>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <strong><?php echo htmlspecialchars($product['title']); ?></strong> - 
                <?php echo htmlspecialchars($product['price']); ?>₽
                <br>
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" width="100">
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
