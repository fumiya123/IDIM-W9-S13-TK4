<?php
// Database connection
$conn = new PDO("mysql:host=localhost;dbname=mydb", "username", "password");

// Fetch data for Profit/Loss report
$query = $conn->prepare("
    SELECT 
        p.id AS product_id,
        p.name AS product_name,
        IFNULL(SUM(s.quantity_sold * s.sale_price), 0) AS total_revenue,
        IFNULL(SUM(b.quantity_purchased * b.purchase_cost), 0) AS total_cost,
        (IFNULL(SUM(s.quantity_sold * s.sale_price), 0) - IFNULL(SUM(b.quantity_purchased * b.purchase_cost), 0)) AS profit_loss
    FROM 
        products p
    LEFT JOIN 
        sales s ON p.id = s.product_id
    LEFT JOIN 
        purchases b ON p.id = b.product_id
    GROUP BY 
        p.id, p.name
");
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Rugi Laba</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Dashboard Laporan Rugi Laba</h1>
    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Total Penjualan</th>
            <th>Total Biaya</th>
            <th>Laba/Rugi</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                <td><?php echo number_format($row['total_revenue'], 2); ?></td>
                <td><?php echo number_format($row['total_cost'], 2); ?></td>
                <td><?php echo number_format($row['profit_loss'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Optional: Pie chart or bar chart to visualize profit/loss by product -->
    <canvas id="profitLossChart" width="400" height="200"></canvas>
    <script>
        const ctx = document.getElementById('profitLossChart').getContext('2d');
        const chartData = {
            labels: <?php echo json_encode(array_column($data, 'product_name')); ?>,
            datasets: [{
                label: 'Laba/Rugi',
                data: <?php echo json_encode(array_column($data, 'profit_loss')); ?>,
                backgroundColor: <?php echo json_encode(array_map(fn($p) => $p > 0 ? 'green' : 'red', array_column($data, 'profit_loss'))); ?>
            }]
        };
        new Chart(ctx, {
            type: 'bar',
            data: chartData
        });
    </script>
</body>
</html>
