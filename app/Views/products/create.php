<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="/products/create" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <label>Price:</label>
        <input type="text" name="price" required>
        <button type="submit">Create</button>
    </form>
    <a href="/products">Back to Product List</a>
</body>
</html>
