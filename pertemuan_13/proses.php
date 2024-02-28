<?php
include "koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$ttl = $_POST['ttl'];
$status = $_POST['status'];

// Gunakan prepared statement untuk mencegah SQL injection
$query = $koneksi->prepare('INSERT INTO anggota(nm_anggota, alamat, ttl_anggota, status_anggota) VALUES (:nama, :alamat, :ttl, :status)');
$query->bindParam(':nama', $nama, PDO::PARAM_STR);
$query->bindParam(':alamat', $alamat, PDO::PARAM_STR);
$query->bindParam(':ttl', $ttl, PDO::PARAM_STR);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$result = $query->execute();

if ($result) {
    echo "<script>alert('Data berhasil disimpan'); document.location.href='anggota.php'</script>\n";
} else {
    echo "<script>alert('Data gagal disimpan'); document.location.href='input_anggota.php'</script>\n";
}
?>
