<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<h2>Laporan Penjualan</h2>
<table>
    <tr>
        <th>Menu</th>
        <th>Jumlah Terjual</th>
    </tr>
    <?php
    $sql = "SELECT menu.name, SUM(orders.quantity) as total_sold FROM orders JOIN menu ON orders.menu_id = menu.id GROUP BY orders.menu_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["total_sold"] . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>Belum ada penjualan</td></tr>";
    }
    $conn->close();
    ?>
</table>
<?php include 'footer.php'; ?>
