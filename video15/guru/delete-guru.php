<?php

// Lakukan pengecekan sesuai kebutuhan, seperti pengecekan otentikasi, koneksi database, dll.

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan koneksi ke database
    require_once "../config.php";

    // Query untuk menghapus data guru berdasarkan ID
    $query = mysqli_query($koneksi, "DELETE FROM tbl_guru WHERE id = $id");

    if($query) {
        // Jika penghapusan berhasil
        header("location:guru.php?msg=deleted");
        exit();
    } else {
        // Jika terjadi kesalahan dalam penghapusan
        header("location:guru.php?msg=error");
        exit();
    }
} else {
    // Jika ID tidak valid
    header("location:guru.php?msg=invalid_id");
    exit();
}
