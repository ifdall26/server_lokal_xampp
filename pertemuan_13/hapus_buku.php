<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    try {
        // Periksa apakah ada peminjaman terkait dengan buku ini
        $queryCheckPeminjaman = $koneksi->prepare("SELECT COUNT(*) FROM meminjam WHERE kd_buku = :id AND kembali = 1");
        $queryCheckPeminjaman->bindParam(':id', $id_buku);
        $queryCheckPeminjaman->execute();
        $jumlahPeminjaman = $queryCheckPeminjaman->fetchColumn();

        if ($jumlahPeminjaman > 0) {
            echo "<script>alert('Buku sedang dipinjam dan tidak dapat dihapus'); document.location.href='buku.php'</script>\n";
        } else {
            // Jika tidak ada peminjaman, hapus buku
            $queryHapusBuku = $koneksi->prepare("DELETE FROM buku WHERE kd_buku = :id");
            $queryHapusBuku->bindParam(':id', $id_buku);
            $queryHapusBuku->execute();

            echo "<script>alert('Buku berhasil dihapus'); document.location.href='buku.php'</script>\n";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $koneksi = null;
    }
} else {
    echo "ID buku tidak valid";
}
?>
