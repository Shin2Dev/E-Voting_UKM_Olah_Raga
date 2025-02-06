<?php
session_start();
include 'db.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_induk = $_POST['nomor_induk'];

    // Cek kredensial pengguna
    $stmt = $conn->prepare("SELECT id, password FROM pengurus WHERE nama_lengkap = ?");
    $stmt->bind_param("s", $nama_lengkap);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();
        if ($nomor_induk === $hashed_password) { // Cek nomor induk
            $_SESSION['user_id'] = $user_id;
            header("Location: index.html");
            exit();
        } else {
            echo "Nama lengkap atau nomor induk salah.";
        }
    } else {
        echo "Nama lengkap atau nomor induk salah.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<div class="login-container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required>
        <label for="nomor_induk">Nomor Induk:</label>
        <input type="text" id="nomor_induk" name="nomor_induk" required>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
</html>