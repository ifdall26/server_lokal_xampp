<?php
include "koneksi.php";

// Mengambil data dari formulir
$kode = $_POST['kode'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$jenis = $_POST['jenis'];
$penerbit = $_POST['penerbit'];

// File upload handling
$uploadedFile = $_FILES['file']['tmp_name'];
$uploadedFileName = $_FILES['file']['name'];


// Validasi ukuran file (maksimum 20 megabyte)
$maxFileSize = 20 * 1024 * 1024; // 20 MB
if ($_FILES['file']['size'] > $maxFileSize) {
    echo "<script>alert('Ukuran file terlalu besar. Maksimum 20 MB.'); window.location.href='input_buku.php';</script>";
    exit;
}

// Mengambil konten file
$fileData = file_get_contents($uploadedFile);

try {
    // Menyiapkan query
    $query = $koneksi->prepare('INSERT INTO buku (kd_buku, judul_buku, pengarang, jenis_buku, penerbit, file_data, file_name) VALUES (:kode, :judul, :pengarang, :jenis, :penerbit, :file_data, :file_name)');

    // Mengeksekusi query dengan parameter yang sudah di-bind
    $query->bindParam(':kode', $kode);
    $query->bindParam(':judul', $judul);
    $query->bindParam(':pengarang', $pengarang);
    $query->bindParam(':jenis', $jenis);
    $query->bindParam(':penerbit', $penerbit);
    $query->bindParam(':file_data', $fileData, PDO::PARAM_LOB);
    $query->bindParam(':file_name', $uploadedFileName);

    $query->execute();

    echo "<script>alert('Data berhasil disimpan'); document.location.href='buku.php'</script>\n";
} catch (PDOException $e) {
    // Menampilkan pesan kesalahan
    echo "Error: " . $e->getMessage();
    echo "<script>alert('Data gagal disimpan'); document.location.href='input_buku.php'</script>\n";
}
?>
