<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
    $nip = htmlspecialchars($_POST['nip']);
    $nama = htmlspecialchars($_POST['nama']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $agama = htmlspecialchars($_POST['agama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $foto = $_FILES['image']['name'];

    $cekNip = mysqli_query($koneksi, "SELECT nip FROM tbl_guru WHERE nip = '$nip'");

    if (mysqli_num_rows($cekNip) > 0){
        header('location:add-guru.php?msg=cancel');
        exit();
    }

    if (!empty($foto)) {
        $url = "add-guru.php";
        $foto = uploadimg($url); // Pastikan fungsi uploadimg() telah didefinisikan dengan benar
    } else {
        $foto = 'default.png';
    }

    mysqli_query($koneksi, "INSERT INTO tbl_guru VALUES (null,'$nip','$nama','$agama','$alamat','$telepon','$foto')");

    header('location:add-guru.php?msg=added');
    exit();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nip = htmlspecialchars($_POST['nip']);
    $nama = htmlspecialchars($_POST['nama']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $agama = htmlspecialchars($_POST['agama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $fotoLama = htmlspecialchars($_POST['fotoLama']);

    $sqlGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");
    $data = mysqli_fetch_array($sqlGuru);
    $curNIP = $data['nip'];

    $newNIP = mysqli_query($koneksi, "SELECT nip FROM tbl_guru WHERE nip = '$nip'");

    if ($nip != $curNIP) {
        if (mysqli_num_rows($newNIP) > 0) {
            header("location:guru.php?msg=cancel");
            exit();
        }
    }

    $foto = $_FILES['image']['name'];
    if (empty($foto)) {
        $foto = $fotoLama;
    } else {
        $url = "guru.php";
        $foto = uploadimg($url); // Pastikan fungsi uploadimg() telah didefinisikan dengan benar
        if ($fotoLama !== 'default.png') {
            @unlink('../asset/image/' . $fotoLama);
        }
    }

    mysqli_query($koneksi, "UPDATE tbl_guru SET 
                            nip = '$nip', 
                            nama = '$nama', 
                            telepon = '$telepon', 
                            agama = '$agama', 
                            alamat = '$alamat', 
                            foto = '$foto'
                            WHERE id = $id
                        ");

    header("location:guru.php?msg=updated");
    exit();
}

?>
