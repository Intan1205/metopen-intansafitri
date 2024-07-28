<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<h2>Pemesanan</h2>
<form method="post" action="order.php">
    <label for="menu">Menu:</label>
    <select name="menu" id="menu">
        <?php
        $sql = "SELECT id, name FROM menu";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
        }
        ?>
    </select>
    <label for="quantity">Jumlah:</label>
    <input type="number" name="quantity" id="quantity" min="1" required>
    <button type="submit">Pesan</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu_id = $_POST["menu"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO orders (menu_id, quantity) VALUES ('$menu_id', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "Pesanan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<?php include 'footer.php'; ?>
