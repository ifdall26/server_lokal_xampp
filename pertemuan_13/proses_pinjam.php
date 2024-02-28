<?php
include "koneksi.php";

$anggota = $_POST['anggota'];
$buku = $_POST['buku'];
$tgl_kembali = $_POST['tgl_kembali'];

try {
    $query = $koneksi->prepare('INSERT INTO meminjam (tgl_pinjam, jumlah_pinjam, tgl_kembali, id_anggota, kd_buku, kembali) VALUES (:tgl_pinjam, 1, :tgl_kembali, :anggota, :buku, 1)');
    $query->bindParam(':tgl_pinjam', date('Y-m-d'));
    $query->bindParam(':tgl_kembali', $tgl_kembali);
    $query->bindParam(':anggota', $anggota);
    $query->bindParam(':buku', $buku);

    $query->execute();

    echo "<script>alert('Data berhasil disimpan'); document.location.href='pinjam.php'</script>\n";
} catch (PDOException $e) {
    echo "<script>alert('Data gagal disimpan: " . $e->getMessage() . "'); document.location.href='pinjam.php'</script>\n";
} finally {
    $koneksi = null; // Tutup koneksi setelah selesai menggunakan data
}
?>
