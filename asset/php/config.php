<?php
$servername = "localhost";
$username = "root"; // Ganti jika perlu
$password = ""; // Ganti jika perlu
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
