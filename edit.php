<?php
// Kode untuk koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datasiswa";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mendapatkan ID dari URL dan pastikan ini integer untuk keamanan

    // Proses form ketika dikirim dengan metode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mengambil data dari form
        $nama = $_POST['nama'];
        $umur = intval($_POST['umur']); // Pastikan umur berupa integer
        $kelas = $_POST['kelas'];
        $alasan = $_POST['alasan'];
        $walikelas = $_POST['walikelas'];

        // Validasi apakah semua data telah diisi
        if (!empty($nama) && !empty($umur) && !empty($kelas) && !empty($alasan) && !empty($walikelas)) {
            // Mengupdate data di database menggunakan prepared statement
            $stmt = $conn->prepare("UPDATE gendeng SET nama=?, umur=?, kelas=?, alasan=?, walikelas=? WHERE id=?");
            $stmt->bind_param("sisssi", $nama, $umur, $kelas, $alasan, $walikelas, $id);

            if ($stmt->execute()) {
                header("Location: daftar.php"); // Kembali ke halaman daftar setelah update berhasil
                exit;
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Semua bidang harus diisi!";
        }
    } else {
        // Mengambil data dari database berdasarkan ID menggunakan prepared statement
        $stmt = $conn->prepare("SELECT * FROM gendeng WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data tidak ditemukan!";
            exit;
        }
        $stmt->close();
    }
} else {
    echo "ID tidak ditemukan di URL!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Data Siswa</h1>

        <form method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo isset($row['nama']) ? htmlspecialchars($row['nama']) : ''; ?>" required>

            <label for="umur">Usia:</label>
            <input type="number" name="umur" id="umur" value="<?php echo isset($row['umur']) ? htmlspecialchars($row['umur']) : ''; ?>" required>

            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" value="<?php echo isset($row['kelas']) ? htmlspecialchars($row['kelas']) : ''; ?>" required>

            <label for="alasan">Alasan:</label>
            <input type="text" name="alasan" id="alasan" value="<?php echo isset($row['alasan']) ? htmlspecialchars($row['alasan']) : ''; ?>" required>

            <label for="walikelas">Wali Kelas:</label>
            <input type="text" name="walikelas" id="walikelas" value="<?php echo isset($row['walikelas']) ? htmlspecialchars($row['walikelas']) : ''; ?>" required>

            <button type="submit">Update</button> 
        </form>

        <a href="daftar.php">Kembali</a>
    </div>
</body>
</html>
