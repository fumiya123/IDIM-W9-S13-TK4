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
        // Misalkan $products adalah array data produk yang diambil dari database
        foreach($products as $product) {
            echo "<tr>";
            echo "<td>{$product['id']}</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$product['stock']}</td>";
            echo "<td>
                <a href='update_product.php?id={$product['id']}'>Edit</a> |
                <a href='delete_product.php?id={$product['id']}' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>