<link rel="shortcut icon" href="image/logo_unp.png">
<?php
require 'functions.php';

    $rows = query("SELECT * FROM data_mhs");


 ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman daftar</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        body{
            text-align:center;
            width:100%;
            height:100vh;
            display:flex;
            justify-content: center;
            align-items:center;
            flex-direction:column;
            background-color:white; padding:20px;
        }
        table{
            width:80%;
        }
        th{
            padding:10px;
        }
        td{
            padding:10px;
        }
    </style>
   
    <body>





        <a href="index.html">Kembali ke halaman utama</a>
        <a href="tambah.php">Tambahkan data</a>
        <br>
        <br>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>PRODI</th>
                 <th>ASAL</th>
                 <th>ACTION</th>
            </tr>
            <?php $i=1; ?>
            <?php foreach($rows as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["phone"]; ?></td>
                <td><?= $row["prodi"]; ?></td>
                <td><?= $row["asal"]; ?></td>
                 <td>
                     <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
                     <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin??');">Hapus</a>
                 </td>
            </tr>
            <?php $i++; ?> 
            <?php endforeach; ?>
            
        </table>
    </body>
</html>