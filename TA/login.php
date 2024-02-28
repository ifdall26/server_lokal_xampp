<?php 
require 'functions.php';
session_start(); // Mulai sesi di awal script

// Periksa apakah pengguna sudah memiliki sesi atau cookie login
if(isset($_SESSION["username"])) {
    // Jika ya, arahkan ke halaman utama
    header("Location: index.php");
    exit();
}

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_daftar WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $cek = mysqli_fetch_assoc($result);
        if(password_verify($password, $cek["password"])){
            // Setel sesi login
            $_SESSION["username"] = $username;

        }
    } else {
        echo "
        <script>
            alert('Username/password salah!');
            document.location.href='login.php';
        </script>";
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/logreg.css">
        <link rel="shortcut icon" href="img/pp.png" type="image/x-icon">
    </head>
    <body>
        <div class="container">
          <h1>Login</h1>
            <form method="POST">

                

                <label>Username</label>
                <br>
                <input name="username" type="text">
                <br>
                <label>Password</label>
                <br>
                <input name="password" type="password">
                <br>

                <?php if(isset($error)) : ?>
                    <p style="color:red;font-style:italic;">Username / password salah!</p>
                    <br>

                <?php endif; ?>
                <button type="submit" name="submit">Log In</button>
                
                <p> Belum punya akun?
                  <a href="daftar.php">Daftar di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>