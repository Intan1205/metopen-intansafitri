// File: add_admin.php (jalankan sekali saja untuk menambahkan admin)
<?php
include 'config.php';

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);
$role = "admin";

$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Admin berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
