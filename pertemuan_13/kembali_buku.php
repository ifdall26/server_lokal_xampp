<?php
include "koneksi.php";

$tgl = date('Y-m-d');

try {
    $query = $koneksi->prepare("UPDATE meminjam SET tgl_kembali = :tgl_kembali, kembali = '2' WHERE id_pinjam = :id_pinjam");
    $query->bindParam(':tgl_kembali', $tgl);
    $query->bindParam(':id_pinjam', $_GET['id']);
    $query->execute();

    echo "<script>alert('Buku Sudah Dikembalikan'); document.location.href='pinjam.php'</script>\n";
} catch (PDOException $e) {
    echo "<script>alert('Gagal: " . $e->getMessage() . "'); document.location.href='pinjam.php'</script>\n";
} finally {
    $koneksi = null; // Tutup koneksi setelah selesai menggunakan data
}
?>
