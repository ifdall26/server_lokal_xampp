<html>
<head>
  <link rel="stylesheet" href="style3.css">k
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
<form method="post" action="proses.php" >
<table border="0">
<tr>
<td>nama anggota</td>
<td>:</td>
<td><input type="text" name="nama"  placeholder="Nama"></td>
</tr>
<tr>
<td>Alamat</td>
<td>:</td>
<td><textarea name="alamat" placeholder="Alamat" ></textarea></td>
</tr>
<tr>
<td>ttl</td>
<td>:</td>
<td><textarea name="ttl" placeholder="Tempat tanggal lahir" ></textarea></td>
</tr>
<tr>
<td>Status</td>
<td>:</td>
<td><select name="status">
<option value="1">aktif</option>
<option value="2">tidak aktif</option>
</select></td>
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
