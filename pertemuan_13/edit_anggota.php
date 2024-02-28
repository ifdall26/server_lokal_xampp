<?php
include "koneksi.php";

// Cek apakah parameter id anggota ada pada URL
if (isset($_GET['id'])) {
    $id_anggota = $_GET['id'];

    // Query untuk mendapatkan data anggota berdasarkan id
    $query = $koneksi->prepare("SELECT * FROM anggota WHERE id_anggota = :id");
    $query->bindParam(':id', $id_anggota);
    $query->execute();

    // Fetch data anggota
    $data = $query->fetch(PDO::FETCH_ASSOC);

    // Cek apakah data anggota ditemukan
    if (!$data) {
        die('Data anggota tidak ditemukan.');
    }

    // Proses form jika ada data yang dikirimkan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data yang dikirimkan melalui form
        $nama_anggota = $_POST['nama_anggota'];
        $alamat = $_POST['alamat'];
        $ttl_anggota = $_POST['ttl_anggota'];
        $status_anggota = $_POST['status_anggota'];

        // Query untuk melakukan update data anggota
        $updateQuery = $koneksi->prepare("UPDATE anggota SET nm_anggota = :nama_anggota, alamat = :alamat, ttl_anggota = :ttl_anggota, status_anggota = :status_anggota WHERE id_anggota = :id");
        $updateQuery->bindParam(':id', $id_anggota);
        $updateQuery->bindParam(':nama_anggota', $nama_anggota);
        $updateQuery->bindParam(':alamat', $alamat);
        $updateQuery->bindParam(':ttl_anggota', $ttl_anggota);
        $updateQuery->bindParam(':status_anggota', $status_anggota);

        // Eksekusi query update
        if ($updateQuery->execute()) {
            echo "<script>alert('Data berhasil diupdate'); document.location.href='anggota.php'</script>\n";
        } else {
            echo "<script>alert('Data gagal diupdate'); document.location.href='edit_anggota.php?id=$id_anggota'</script>\n";
        }
    }
} else {
    // Redirect jika id anggota tidak ada pada URL
    header('Location: anggota.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <h2>Edit Anggota</h2>
    <form method="post" action="">
        <label>Nama Anggota:</label>
        <input type="text" name="nama_anggota" value="<?php echo $data['nm_anggota']; ?>" required>

        <label>Alamat:</label>
        <textarea name="alamat" required><?php echo $data['alamat']; ?></textarea>

        <label>TTL Anggota:</label>
        <textarea name="ttl_anggota" required><?php echo $data['ttl_anggota']; ?></textarea>

        <label>Status Anggota:</label>
        <select name="status_anggota">
            <option value="1" <?php echo ($data['status_anggota'] == 1) ? 'selected' : ''; ?>>Aktif</option>
            <option value="2" <?php echo ($data['status_anggota'] == 2) ? 'selected' : ''; ?>>Tidak Aktif</option>
        </select>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
