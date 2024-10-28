<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch products from the database
        foreach($products as $product) {
            echo "<tr>";
            echo "<td>{$product['id']}</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$product['stock']}</td>";
            echo "<td>
                <a href='update_product.php?id={$product['id']}'>Edit</a> | 
                <a href='delete_product.php?id={$product['id']}'>Delete</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
