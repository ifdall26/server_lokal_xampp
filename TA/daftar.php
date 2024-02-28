<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign-Up</title>
        <link rel="stylesheet" href="css/logreg.css">
        <link rel="shortcut icon" href="img/pp.png" type="image/x-icon">
    </head>
    <body>
        <div class="container">
          <h1>Daftar</h1>
            <form method="POST" action="">
                <label>Username</label>
                <br>
                <input name="username" type="text">
                <br>
                <label>Password</label>
                <br>
                <input name="password" type="password">
                <br>
                <label>Konfirmasi Password</label>
                <br>
                <input name="password2" type="password">
                <br>
                <button name="submit">Daftar</button>
                <p> Sudah punya akun?
                  <a href="login.php">Login</a>
                </p>
            </form>
        </div>
    </body>
</html>

<link rel="shortcut icon" href="image/logo_unp.png">
<?php 

require 'functions.php';

if( isset($_POST["submit"])){
    if(daftar($_POST) > 0){
        echo"
        <script>
            alert('Terdaftar!');
            document.location.href='login.php';
        </script>

        ";
        
        
    }
    return mysqli_error($conn);
}




?>






