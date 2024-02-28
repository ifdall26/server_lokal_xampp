<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <table width="700" border="1">
        <tr>
            <td colspan="2" align="center"><h1>Selamat Datang Di Sistem Perpustakaan</h1></td>
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
                <form method="post" action="proses_buku.php" enctype="multipart/form-data">
                    <table border="0">
                        <tr>
                            <td>Kode Buku</td>
                            <td>:</td>
                            <td><input type="text" name="kode" placeholder="Kode Buku"></td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td><input type="text" name="judul" placeholder="Judul Buku"></td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>:</td>
                            <td><input type="text" name="pengarang" placeholder="Pengarang Buku"></td>
                        </tr>
                        <tr>
                            <td>Jenis Buku</td>
                            <td>:</td>
                            <td><input type="text" name="jenis" placeholder="Jenis Buku"></td>
                        </tr>
                        <tr>
                            <td>Penerbit Buku</td>
                            <td>:</td>
                            <td><input type="text" name="penerbit" placeholder="Penerbit Buku"></td>
                        </tr>
                        <tr>
                            <td>File Buku</td>
                            <td>:</td>
                            <td><input type="file" name="file" id="file"></td>
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
            <td colspan="2" align="center">Kelompok 1</td>
        </tr>
    </table>
</body>
</html>
