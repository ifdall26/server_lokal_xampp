<?php
include "koneksi.php";

// Cek apakah parameter id pinjam ada pada URL
if (isset($_GET['id'])) {
    $id_pinjam = $_GET['id'];

    // Query untuk mendapatkan data peminjaman berdasarkan id
    $query = $koneksi->prepare("SELECT * FROM meminjam WHERE id_pinjam = :id");
    $query->bindParam(':id', $id_pinjam);
    $query->execute();

    // Fetch data peminjaman
    $data = $query->fetch(PDO::FETCH_ASSOC);

    // Cek apakah data peminjaman ditemukan
    if (!$data) {
        die('Data peminjaman tidak ditemukan.');
    }

    // Proses form jika ada data yang dikirimkan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data yang dikirimkan melalui form
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $jumlah_pinjam = $_POST['jumlah_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];

        // Query untuk melakukan update data peminjaman
        $updateQuery = $koneksi->prepare("UPDATE meminjam SET tgl_pinjam = :tgl_pinjam, jumlah_pinjam = :jumlah_pinjam, tgl_kembali = :tgl_kembali WHERE id_pinjam = :id");
        $updateQuery->bindParam(':id', $id_pinjam);
        $updateQuery->bindParam(':tgl_pinjam', $tgl_pinjam);
        $updateQuery->bindParam(':jumlah_pinjam', $jumlah_pinjam);
        $updateQuery->bindParam(':tgl_kembali', $tgl_kembali);

        // Eksekusi query update
        if ($updateQuery->execute()) {
            echo "<script>alert('Data berhasil diupdate'); document.location.href='pinjam.php'</script>\n";
        } else {
            echo "<script>alert('Data gagal diupdate'); document.location.href='edit_pinjam.php?id=$id_pinjam'</script>\n";
        }
    }
} else {
    // Redirect jika id pinjam tidak ada pada URL
    header('Location: pinjam.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <h2>Edit Peminjaman Buku</h2>
    <form method="post" action="">
        <label>Tanggal Pinjam:</label>
        <input type="date" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" required>

        <label>Jumlah Pinjam:</label>
        <input type="number" name="jumlah_pinjam" value="<?php echo $data['jumlah_pinjam']; ?>" required>

        <label>Tanggal Kembali:</label>
        <input type="date" name="tgl_kembali" value="<?php echo $data['tgl_kembali']; ?>" required>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
