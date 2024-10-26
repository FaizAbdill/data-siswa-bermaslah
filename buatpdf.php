<?php
// Include FPDF library
require('fpdf/fpdf.php');

// Konfigurasi database
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root";        // Ganti dengan username database Anda
$password = "";            // Ganti dengan password database Anda
$database = "datasiswa";   // Nama database

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari tabel
$sql = "SELECT id, nama, umur, kelas, alasan, walikelas FROM gendeng";
$result = $conn->query($sql);

// Membuat instance FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Judul Surat
$pdf->Cell(0, 10, 'Laporan Siswa Bermasalah', 0, 1, 'C');

// Spasi
$pdf->Ln(10);

// Set font untuk isi surat
$pdf->SetFont('Arial', '', 12);

if ($result->num_rows > 0) {
    $counter = 1;
    
    while ($row = $result->fetch_assoc()) {
        // Header untuk setiap siswa
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Data Siswa ' . $counter++, 0, 1);
        $pdf->Ln(5);

        // Set font normal untuk isi surat
        $pdf->SetFont('Arial', '', 12);

        // Isi surat
        $pdf->SetFont('Times', '', 12);
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

        // Tambahkan spasi setelah setiap siswa
        $pdf->Ln(10);
    }
} else {
    $pdf->Cell(0, 10, 'Tidak ada data siswa yang terdaftar.', 0, 1, 'C');
}

// Menutup koneksi
$conn->close();

// Output PDF
$pdf->Output();
?>
