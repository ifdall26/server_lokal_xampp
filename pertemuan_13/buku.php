<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <table width="1000" border="1">
        <tr>
            <td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
        </tr>
        <tr>
            <td width="200">
                <ul>
                    <li><a href="anggota.php">Anggota</a></li>
                    <li><a href="buku.php">Buku</a></li>
                    <li><a href="pinjam.php">Pinjam</a></li>
                </ul>
            </td>
            <td width="500">
                <a href="input_buku.php">Input buku</a>
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Jenis Buku</th>
                            <th>Penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";

                        $query = "SELECT * FROM buku ORDER BY kd_buku";

                        try {
                            $result = $koneksi->query($query);

                            if (!$result) {
                                die("Error in query: " . $koneksi->errorInfo()[2]);
                            }

                            $no = 1;

                            while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['kd_buku']; ?></td>
                                    <td><?php echo $data['judul_buku']; ?></td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                    <td><?php echo $data['jenis_buku']; ?></td>
                                    <td class="center"><?php echo $data['penerbit']; ?></td>
                                    <td class="center">
                                        <a href="edit_buku.php?id=<?php echo $data['kd_buku']; ?>">Edit</a> |
                                        <a href="hapus_buku.php?id=<?php echo $data['kd_buku']; ?>" onClick="return confirm('Apakah Anda ingin menghapus <?php echo $data['judul_buku']; ?>?')">Hapus</a> |
                                        <a href="download_buku.php?id=<?php echo $data['kd_buku']; ?>">Download</a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            }
                        } catch (PDOException $e) {
                            die("Error: " . $e->getMessage());
                        } finally {
                            // Jangan lupa tutup koneksi setelah selesai mengambil data
                            $koneksi = null;
                        }
                        ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">Kelompok 1<br></td>
        </tr>
    </table>
</body>
</html>
