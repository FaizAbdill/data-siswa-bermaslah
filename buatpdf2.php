<?php
require('fpdf/fpdf.php'); // Path ke FPDF

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datasiswa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id siswa dari URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan id adalah angka

    // Query untuk mendapatkan data siswa berdasarkan id
    $sql = "SELECT * FROM gendeng WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);  // Bind parameter id
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Inisialisasi PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Judul
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Data Siswa Bermasalah', 0, 1, 'C');

        // Data Siswa
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'Nama: ', 0, 0);
        $pdf->Cell(0, 10, $row['nama'], 0, 1);

        $pdf->Cell(40, 10, 'Umur: ', 0, 0);
        $pdf->Cell(0, 10, $row['umur'], 0, 1);

        $pdf->Cell(40, 10, 'Kelas: ', 0, 0);
        $pdf->Cell(0, 10, $row['kelas'], 0, 1);

        $pdf->Cell(40, 10, 'Alasan: ', 0, 0);
        $pdf->MultiCell(0, 10, $row['alasan'], 0, 1);

        $pdf->Cell(40, 10, 'Wali Kelas: ', 0, 0);
        $pdf->Cell(0, 10, $row['walikelas'], 0, 1);

        // Output file PDF ke browser
        $pdf->Output();
    } else {
        echo "Data siswa tidak ditemukan.";
    }
} else {
    echo "ID siswa tidak diberikan.";
}

$conn->close();
?>
