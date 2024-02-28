<link rel="shortcut icon" href="image/logo_unp.png">
<?php 
require 'functions.php';
    
    if(isset($_POST["submit"])){
        if(tambah($_POST) > 0){
            echo"
                <script>
                alert('Data Berhasil Ditambah!');
                document.location.href = 'tabel.php';
                </script>
            ";
            
        } 
            return mysqli_error($conn);
        }
        
    
    


?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Tambah</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
          <h1>Tambah</h1>
            <form method="POST">

                

                <label>Nama</label>
                <br>
                <input name="nama" type="text">
                <br>
                <label>Email</label>
                <br>
                <input name="email" type="text">
                <br>
                <label>Nomor Hp</label>
                <br>
                <input name="phone" type="text">
                <br>
                <label>Prodi</label>
                <br>
                <input name="prodi" type="text">
                <br>
                <label>Asal</label>
                <br>
                <input name="asal" type="text">
                <br>

                
                <button type="submit" name="submit">Tambahkan</button>
            </form>
        </div>
    </body>
</html>