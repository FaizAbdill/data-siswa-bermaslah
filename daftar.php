<?php
// Kode untuk koneksi ke database (sama seperti sebelumnya)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datasiswa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, nama, umur, kelas, alasan, walikelas FROM gendeng"; 
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa Yang Terdaftar</title>
    <link rel="stylesheet" href="styledaftar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
</head>
<body>
<div class="navbar">
    <a href="logout.php" class="logout-button"><i class="fa fa-sign-out animate__animated animate__swing"></i></a>
    <a href="index.php" class="button-link"><h2 class="animate__animated animate__swing"> IZEFFECT </h2></a>
</div>
    <h1 class="title">Siswa Yang Telah Terdaftar</h1>
<div class="container">     
    <?php if ($result->num_rows == 0): ?>
        <p class="no-data">Tidak ada siswa yang terdaftar.</p>
    <?php else: ?>
        <table class="student-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Kelas</th>
                    <th>Alasan</th>
                    <th>WaliKelas</th>
                    <th>Aksi</th>
                    <th>Print</th> <!-- Kolom baru untuk print -->
                </tr>
            </thead>
            <tbody>
                <?php 
                $counter = 1;
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo htmlspecialchars(trim($row['nama'])); ?></td>
                        <td><?php echo htmlspecialchars(trim($row['umur'])); ?></td>
                        <td><?php echo htmlspecialchars(trim($row['kelas'])); ?></td>
                        <td><?php echo htmlspecialchars(trim($row['alasan'])); ?></td>
                        <td><?php echo htmlspecialchars(trim($row['walikelas'])); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="action-button">Edit</a> 
                            <br><br> 
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="action-button1" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">Delete</a>
                        </td>
                        <td>
                            <a href="buatpdf2.php?id=<?php echo $row['id']; ?>" class="action-button back-link"><i class="fa fa-print pdflogo" style="font-size:18px"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
    
    <a class="back-link" href="process.php">Kembali</a>
    <a href="buatpdf.php" class="back-link"><i class="fa fa-print pdflogo" style="font-size:18px"></i></a>
</div>
</body>
</html>

<?php include "footer.php"; ?>
