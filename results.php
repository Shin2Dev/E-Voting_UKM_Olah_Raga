<?php
include 'db.php'; // Koneksi ke database

// Ambil hasil suara
$result = $conn->query("SELECT candidate, COUNT(*) as total FROM votes GROUP BY candidate");

echo "<h2>Hasil Pemilihan</h2>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Calon: " . htmlspecialchars($row['candidate']) . " - Suara: " . $row['total'] . "</p>";
    }
} else {
    echo "<p>Belum ada suara yang masuk.</p>";
}

$conn->close();
?>