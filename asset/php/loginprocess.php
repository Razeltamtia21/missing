<?php
session_start();
require 'config.php'; // Pastikan Anda memiliki file config.php untuk koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengambil data pengguna dari database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Memverifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php"); // Halaman setelah login
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username belum terdaftar. <a href='http://localhost/code/index.html'>Silakan registrasi!";
    }
}
?>
