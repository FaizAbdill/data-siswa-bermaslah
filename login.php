<?php
session_start();
include('connect.php'); // Koneksi ke database

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hashing password dengan MD5

    // Query untuk memeriksa admin
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username; // Set session admin
        header("Location: index.php"); // Redirect ke halaman dashboard admin
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<div class="navbar">
    <a href="index.php" class="button-link"><h2 class="animate__animated animate__swing"> IZEFFECT </h2></a>
</div>
    <h2>Login Admin</h2>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
</body>
</html>

<?php include "footer.php";?>
