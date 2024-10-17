<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="/products/edit/<?= $product['id'] ?>" method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        <label>Description:</label>
        <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea>
        <label>Price:</label>
        <input type="text" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="/products">Back to Product List</a>
</body>
</html>
