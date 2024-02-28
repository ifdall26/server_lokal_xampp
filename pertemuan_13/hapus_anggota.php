<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_anggota = $_GET['id'];

    try {
        // Periksa apakah ada peminjaman terkait
        $queryCheckPeminjaman = $koneksi->prepare("SELECT COUNT(*) FROM meminjam WHERE id_anggota = :id");
        $queryCheckPeminjaman->bindParam(':id', $id_anggota);
        $queryCheckPeminjaman->execute();
        $jumlahPeminjaman = $queryCheckPeminjaman->fetchColumn();

        if ($jumlahPeminjaman > 0) {
            echo "<script>alert('Tidak dapat menghapus anggota karena terdapat peminjaman terkait.'); document.location.href='anggota.php'</script>\n";
        } else {
            // Hapus anggota
            $queryDeleteAnggota = $koneksi->prepare("DELETE FROM anggota WHERE id_anggota = :id");
            $queryDeleteAnggota->bindParam(':id', $id_anggota);
            $queryDeleteAnggota->execute();
            
            echo "<script>alert('Data berhasil dihapus'); document.location.href='anggota.php'</script>\n";
        }
    } catch (PDOException $e) {
        // Menampilkan pesan kesalahan
        echo "Error: " . $e->getMessage();
        echo "<script>alert('Data gagal dihapus. Error: " . $e->getMessage() . "'); document.location.href='anggota.php'</script>\n";
    } finally {
        // Jangan lupa tutup koneksi setelah selesai
        $koneksi = null;
    }
} else {
    echo "ID anggota tidak valid";
}
?>
