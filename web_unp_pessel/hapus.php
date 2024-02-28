<link rel="shortcut icon" href="image/logo_unp.png">
<?php
require 'functions.php';

   $id = $_GET["id"];

   if( hapus($id) > 0){
   
	echo"
    <script>
	    alert('Data Berhasil dihapus!');
	    document.location.href = 'tabel.php';
    </script>
     ";
   }else{
   	echo"
    <script>
	    alert('Data gagal dihapus!');
	    document.location.href = 'tabel.php';
    </script>
     ";
   }



?>