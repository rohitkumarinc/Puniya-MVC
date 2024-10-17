<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Products</h1>
    <a href="/products/create">Create New Product</a>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= htmlspecialchars($product['name']) ?> - 
                <a href="/products/edit/<?= $product['id'] ?>">Edit</a>
                <form action="/products/delete/<?= $product['id'] ?>" method="POST" style="display:inline;">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
