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
<td width = "200">
<ul>
<li><a href="anggota.php">Anggota</a></li>
<li><a href="buku.php">Buku</a></li>
<li><a href="pinjam.php">Pinjam</a></li>
<ul>

</td>
<td width="500">
<a href="pinjam_buku.php">Pinjam buku</a>
<p>buku yang sedang dipinjam  </p>
 <table border="1" >
                                        <thead>    

          <tr>
            <th >No</th>
            <th >Tanggal Pinjam Buku </th>
            <th >Jumlah Pinjam </th>
            <th >tanggal kembali </th>
            <th >nama peminjam</th>
            <th >Buku</th>
            
            <th >Aksi</th>
          </tr>
        </thead>
                                    
                                    

                                    <tbody>
                                    <?php
include "koneksi.php";

$query = "SELECT * FROM meminjam, buku, anggota
          WHERE meminjam.id_anggota = anggota.id_anggota 
          AND meminjam.kd_buku = buku.kd_buku 
          AND meminjam.kembali = 1
          ORDER BY id_pinjam";

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
            <td><?php echo $data['tgl_pinjam']; ?></td>
            <td><?php echo $data['jumlah_pinjam']; ?></td>
            <td><?php echo $data['tgl_kembali']; ?></td>
            <td><?php echo $data['nm_anggota']; ?></td>
            <td class="center"><?php echo $data['judul_buku']; ?></td>
            <td class="center">
                <a href="edit_pinjam.php?id=<?php echo $data['id_pinjam']; ?>">Edit</a> | 
                <a href="kembali_buku.php?id=<?php echo $data['id_pinjam']; ?>" 
                onClick="return confirm('Apakah Anda ingin mengembalikan <?php echo $data['judul_buku']; ?>?')">Kembalikan</a>
            </td>
        </tr>
        <?php
        $no++;
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
} finally {
    // Tutup koneksi setelah selesai menggunakan data
    $koneksi = null;
}
?>


                                    </tbody>
                                    
                                    

                                </table>
                                <br>
                                
                                <p>buku yang sudah di kembalikan  </p>
                                 <table border="1" >
                                        <thead>    

          <tr>
            <th >No</th>
            <th >Tanggal Pinjam Buku </th>
            <th >Jumlah Pinjam </th>
            <th >tanggal kembali </th>
            <th >nama peminjam</th>
            <th >Buku</th>
            
            <th >Aksi</th>
          </tr>
        </thead>
                                    
                                    

                                    <tbody>
                                    <?php
include "koneksi.php";

$query = "SELECT * FROM meminjam, buku, anggota
          WHERE meminjam.id_anggota = anggota.id_anggota 
          AND meminjam.kd_buku = buku.kd_buku 
          AND meminjam.kembali = 2
          ORDER BY id_pinjam";

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
            <td><?php echo $data['tgl_pinjam']; ?></td>
            <td><?php echo $data['jumlah_pinjam']; ?></td>
            <td><?php echo $data['tgl_kembali']; ?></td>
            <td><?php echo $data['nm_anggota']; ?></td>
            <td class="center"><?php echo $data['judul_buku']; ?></td>
            <td class="center">
                <a href="hapus_pinjam.php?id=<?php echo $data['id_pinjam']; ?>" 
                onClick="return confirm('Apakah Anda ingin menghapus <?php echo $data['id_pinjam']; ?>?')">hapus</a>
            </td>
        </tr>
        <?php
        $no++;
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
} finally {
    // Tutup koneksi setelah selesai menggunakan data
    $koneksi = null;
}
?>

                                    </tbody>
                                    
                                    

                                </table>
                                
                                
</td>
</tr>
<tr>
<td colspan="2" align="center">Kelompok 1<br><></script></td>
</tr>
</table>
</body>
</html>
