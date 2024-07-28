<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<h2>Register</h2>
<form method="post" action="register.php">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Register</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = "user"; // Default role

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<?php include 'footer.php'; ?>
