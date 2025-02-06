<?php
session_start();
include 'db.php'; // Koneksi ke database

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $candidate = $_POST['candidate'];
    $user_id = $_SESSION['user_id']; // ID pengguna yang login

    // Simpan suara ke database
    $stmt = $conn->prepare("INSERT INTO votes (user_id, candidate) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $candidate);
    
    if ($stmt->execute()) {
        echo "Suara Anda telah diterima! <a href='results.php'>Lihat Hasil</a>";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>