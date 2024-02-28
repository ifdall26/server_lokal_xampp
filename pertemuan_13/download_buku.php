<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    try {
        // Ganti 'file_data' dan 'file_name' sesuai dengan nama kolom yang benar di tabel database
        $query = $koneksi->prepare("SELECT file_data, file_name FROM buku WHERE kd_buku = :id");
        $query->bindParam(':id', $id_buku);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        $file_data = $result['file_data'];
        $file_name = $result['file_name'];

        // Set header untuk download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file_name . '"');

        // Keluarkan data blob ke output
        echo $file_data;

        exit;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        // Jangan lupa tutup koneksi setelah selesai
        $koneksi = null;
    }
} else {
    die('ID buku tidak valid');
}
?>
