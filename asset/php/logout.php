<?php
session_start(); // Memulai sesi

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan ke halaman login
header("Location: http://localhost/code/index.html");
exit();
?>
