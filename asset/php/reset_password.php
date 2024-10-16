<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit-reset'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "Email tidak terdaftar! | <a href='http://localhost/code/index.html'>Silahkan Daftar</a>";
    } else {
        
        if (strlen($password) < 8) {
            echo "Password harus lebih dari 8 karakter!";
        } elseif ($password !== $confirm_password) {
            echo "Password dan konfirmasi password tidak cocok!";
        } else {
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET password = ? WHERE email = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $hashed_password, $email);

            if ($update_stmt->execute()) {
                echo "Password berhasil diriset! | <a href='http://localhost/code/index.html'>Silahkan Login</a>";
            } else {
                echo "Gagal mereset password, coba lagi.";
            }
        }
    }


    $stmt->close();
    $conn->close();
}
?>
