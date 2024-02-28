<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_pinjam = $_GET['id'];

    try {
        $query = $koneksi->prepare("DELETE FROM meminjam WHERE id_pinjam = :id");
        $query->bindParam(':id', $id_pinjam);
        $query->execute();

        echo "<script>alert('Data berhasil dihapus'); document.location.href='pinjam_buku.php'</script>\n";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $koneksi = null;
    }
} else {
    echo "ID peminjaman tidak valid";
}
?>
