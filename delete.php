<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datasiswa";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_GET['id']; // Mendapatkan ID dari URL
// Menghapus data dari database
$sql = "DELETE FROM gendeng WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: daftar.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
