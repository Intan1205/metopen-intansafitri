<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<h2>Menu</h2>
<table>
    <tr>
        <th>Nama</th>
        <th>Harga</th>
    </tr>
    <?php
    $sql = "SELECT name, price FROM menu";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>Tidak ada menu yang tersedia</td></tr>";
    }
    $conn->close();
    ?>
</table>
<?php include 'footer.php'; ?>
