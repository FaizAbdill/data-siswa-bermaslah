<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Bermasalah</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
    <a href="logout.php" class="logout-button"><i class="fa fa-sign-out animate__animated animate__swing"></i></a>
    <a href="index.php" class="button-link"><h2 class="animate__animated animate__swing">IZEFFECT</h2></a>
    </div>
    <h1>PENDATAAN SISWA BERMASALAH</h1>
    <form action="process.php" method="POST">
        <table class="form-table">
            <!-- Baris untuk Nama Lengkap -->
            <tr>
                <td><label for="nama">Nama Lengkap:</label></td>
                <td><input type="text" id="nama" name="nama" required></td>
            </tr>
            <!-- Baris untuk Umur -->
            <tr>
                <td><label for="umur">Umur:</label></td>
                <td><input type="number" id="umur" name="umur" required></td>
            </tr>
            <!-- Baris untuk Kelas -->
            <tr>
                <td><label for="kelas">Kelas:</label></td>
                <td><input type="text" id="kelas" name="kelas" required></td>
            </tr>
            <!-- Baris untuk Alasan -->
            <tr>
                <td><label for="alasan">Alasan Bermasalah:</label></td>
                <td><textarea id="alasan" name="alasan" required></textarea></td>
            </tr>
            <!-- Baris untuk Wali Kelas -->
            <tr>
                <td><label for="walikelas">Wali Kelas:</label></td>
                <td><input type="text" id="walikelas" name="walikelas" required></td>
            </tr>
            <!-- Baris untuk Tombol Daftar -->
            <tr>
                <td colspan="2">
                    <input type="submit" value="Daftar">
                </td>
            </tr>
            <!-- Baris untuk Tombol Lihat Daftar -->
            <tr>
                <td colspan="2">
                    <a href="daftar.php">
                        <button type="button">Lihat Daftar</button>
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php include "footer.php";?>
