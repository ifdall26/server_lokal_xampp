<link rel="shortcut icon" href="image/logo_unp.png">
<?php 
require 'functions.php';
    
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM tbl_daftar WHERE username = '$username'");

        if(mysqli_num_rows($result) === 1){
            $cek = mysqli_fetch_assoc($result);
            if(password_verify($password, $cek["password"])){
                header("Location: index.html");
            }
        }else
            echo"
            <script>
                alert('Username/password salah!');
                document.location.href='login.php';
            </script>

            ";
    }


?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
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