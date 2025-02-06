<?php
$servername = "localhost"; 
$username = "your_username"; 
$password = "your_password"; 
$dbname = "evoting"; 

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>