<link rel="shortcut icon" href="image/logo_unp.png">
<?php 
require 'functions.php';

$id = $_GET["id"];

$row = query("SELECT * FROM data_mhs WHERE id = $id")[0];
    
    if(isset($_POST["submit"])){

        if(edit($_POST) > 0){
            echo"
                <script>
                alert('Data Berhasil Diubah!');
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
        <title>Edit</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
          <h1>Edit</h1>
            <form method="POST">

                
                <input name="id" type="hidden" value="<?= $row["id"]; ?>">
                <label>Nama</label>
                <br>
                <input name="nama" type="text" value="<?= $row["nama"]; ?>" required>
                <br>
                <label>Email</label>
                <br>
                <input name="email" type="text" value="<?= $row["email"]; ?>" required>
                <br>
                <label>Nomor Hp</label>
                <br>
                <input name="phone" type="text" value="<?= $row["phone"]; ?>" required>
                <br>
                <label>Prodi</label>
                <br>
                <input name="prodi" type="text" value="<?= $row["prodi"]; ?>" required>
                <br>
                <label>Asal</label>
                <br>
                <input name="asal" type="text" value="<?= $row["asal"]; ?>" required>
                <br>

                
                <button type="submit" name="submit">Edit</button>
            </form>
        </div>
    </body>
</html>