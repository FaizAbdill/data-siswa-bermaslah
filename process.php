<?php

// Konfigurasi database
$servername = "localhost"; 
$username = "root";        
$password = "";            
$database = "datasiswa";   

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start(); // Memulai session di atas kode PHP

// ... Kode koneksi database dan validasi form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $umur = htmlspecialchars($_POST['umur']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $alasan = htmlspecialchars($_POST['alasan']);
    $walikelas = htmlspecialchars($_POST['walikelas']);

    // Query untuk memasukkan data ke dalam tabel `gendeng`
    $sql = "INSERT INTO gendeng (nama, umur, kelas, alasan, walikelas) 
            VALUES ('$nama', '$umur', '$kelas', '$alasan', '$walikelas')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['data'] = [
            'nama' => $nama,
            'umur' => $umur,
            'kelas' => $kelas,
            'alasan' => $alasan,
            'walikelas' => $walikelas
        ];
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi setelah query selesai
$conn->close();}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran Siswa Bermasalah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styleprocess.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
    <a href="logout.php" class="logout-button"><i class="fa fa-sign-out animate__animated animate__swing"></i></a>
    <a href="index.php" class="button-link"><h2 class="animate__animated animate__swing">IZEFFECT</h2></a>
    </div>

    <!-- Container utama -->
    <div class="container">
        <h1 class="font"> SISWA TELAH TERDAFTAR!!</h1>
        
        <p><strong>Nama Lengkap:</strong> <?php echo $_SESSION['data']['nama']; ?></p>
        <p><strong>Umur:</strong> <?php echo $_SESSION['data']['umur']; ?></p>
        <p><strong>Kelas:</strong> <?php echo $_SESSION['data']['kelas']; ?></p>
        <p><strong>Alasan Bermasalah:</strong> <?php echo nl2br($_SESSION['data']['alasan']); ?></p>
        <p><strong>Wali Kelas:</strong> <?php echo $_SESSION['data']['walikelas']; ?></p>

        <div class="kembali">
            <a href="daftar.php"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">LIHAT DAFTAR</button></a>
            <a href="index.php"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</button></a>
        </div>
    </div>
</body>
</html>

<?php include "footer.php";?>