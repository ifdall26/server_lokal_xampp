<html>
<head>
  <link rel="stylesheet" href="style3.css">
</head>
<body>
<table width="700" border="1">
<tr>
<td colspan="2" align="center"><h1>Selamat Datang Di Sistem Perpustakaan</h1></td>
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
<?php include "koneksi.php";?>
<form method="post" action="proses_pinjam.php" >
<table border="0">
<tr>
<td>Nama Peminjam</td>
<td>:</td>
<td>
<?php
$sql_anggota = "SELECT * FROM anggota ORDER BY id_anggota";
$kueri_anggota = $koneksi->query($sql_anggota);

if (!$kueri_anggota) {
    die("Error in query: " . $koneksi->errorInfo()[2]);
}
?>
<select name="anggota">
    <?php
    while ($row_anggota = $kueri_anggota->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo $row_anggota['id_anggota']; ?>"><?php echo $row_anggota['nm_anggota']; ?></option>
        <?php
    }
    ?>
                                            </select></td>
</tr>
<tr>
<td>Judul Buku </td>
<td>:</td>
<td>
<?php
        $sql_buku = "SELECT * FROM buku ORDER BY kd_buku";
        $kueri_buku = $koneksi->query($sql_buku);

        if (!$kueri_buku) {
            die("Error in query: " . $koneksi->errorInfo()[2]);
        }
        ?>
        <select name="buku">
            <?php
            while ($row_buku = $kueri_buku->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $row_buku['kd_buku']; ?>"><?php echo $row_buku['judul_buku']; ?></option>
                <?php
            }
            ?>
                                            </select><td>
</tr>                                            
                                            

<tr>
<td></td>
<td></td>
<td><input type="submit" name="simpan" value="simpan"></td>
</tr>

</table>
</form>
</td>
</tr>
<tr>
<td colspan="2" align="center">Kelompok 1<br><></script></td>
</tr>
</table>

</body>
</html>
