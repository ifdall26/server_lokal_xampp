<?php
include "koneksi.php";

// Cek apakah parameter id buku ada pada URL
if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    // Query untuk mendapatkan data buku berdasarkan id
    $query = $koneksi->prepare("SELECT * FROM buku WHERE kd_buku = :id");
    $query->bindParam(':id', $id_buku);
    $query->execute();

    // Fetch data buku
    $data = $query->fetch(PDO::FETCH_ASSOC);

    // Cek apakah data buku ditemukan
    if (!$data) {
        die('Data buku tidak ditemukan.');
    }

    // Proses form jika ada data yang dikirimkan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data yang dikirimkan melalui form
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $jenis = $_POST['jenis'];
        $penerbit = $_POST['penerbit'];

        // Query untuk melakukan update data buku
        $updateQuery = $koneksi->prepare("UPDATE buku SET judul_buku = :judul, pengarang = :pengarang, jenis_buku = :jenis, penerbit = :penerbit WHERE kd_buku = :id");
        $updateQuery->bindParam(':id', $id_buku);
        $updateQuery->bindParam(':judul', $judul);
        $updateQuery->bindParam(':pengarang', $pengarang);
        $updateQuery->bindParam(':jenis', $jenis);
        $updateQuery->bindParam(':penerbit', $penerbit);

        // Eksekusi query update
        if ($updateQuery->execute()) {
            echo "<script>alert('Data berhasil diupdate'); document.location.href='buku.php'</script>\n";
        } else {
            echo "<script>alert('Data gagal diupdate'); document.location.href='edit_buku.php?id=$id_buku'</script>\n";
        }
    }
} else {
    // Redirect jika id buku tidak ada pada URL
    header('Location: buku.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <h2>Edit Buku</h2>
    <form method="post" action="">
        <label>Judul Buku:</label>
        <input type="text" name="judul" value="<?php echo $data['judul_buku']; ?>" required>

        <label>Pengarang:</label>
        <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" required>

        <label>Jenis Buku:</label>
        <input type="text" name="jenis" value="<?php echo $data['jenis_buku']; ?>" required>

        <label>Penerbit:</label>
        <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" required>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
