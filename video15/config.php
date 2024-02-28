<?php
//koneksi ke database
$koneksi = mysqli_connect("localhost","root","","db_sekolah");

//cek koneksi
// if (mysqli_connect_errno()){
//     echo "Gagal koneksi";
// } else {
//     echo "Berhasil koneksi";
// }

//url induk
$main_url = "http://localhost/video15/";

function uploadimg($url){
    $namafile  = $_FILES['image']['name'];
    $ukuran    = $_FILES['image']['size'];
    $error     = $_FILES['image']['error'];
    $tmp       = $_FILES['image']['tmp_name'];

    //cek file yang diupload
    $validExtention = ['jpg', 'jpeg', 'png'];
    $fileExtention  = explode ('.', $namafile);
    $fileExtention  = strtolower(end($fileExtention));
    if (!in_array($fileExtention, $validExtention)) {header("location:".$url.'?msg=notimage');
        die;
    }

    //cek ukuran gambar
    if($ukuran > 1000000){
        header("location:".$url.'?msg=oversize');
        die;
    }

    //generate nama file gambar
    if ($url = 'profile-sekolah.php'){
    $namafilebaru = rand(0,50) . '-bgLogin' . $fileExtention;
    } else {
    $namafilebaru = rand(10,1000) . '-' . $namafile;
    }

    //upload gambar
    move_uploaded_file($tmp, "../asset/image/" . $namafilebaru);
    return $namafilebaru;
}

?>