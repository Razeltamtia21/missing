<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    if (strlen($password) < 8) {
        echo "Password harus lebih dari 8 karakter!";
        exit();
    }


    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username atau email sudah terdaftar. <a href='http://localhost/code/index.html'>Silakan login!</a>";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("sss", $username, $email, $hashedPassword);
        $insertStmt->execute();
        
        echo "Akun berhasil dibuat! <a href = 'http://localhost/code/index.html'>Silakan login.</a>";
    }
}
?>
