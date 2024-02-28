<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Ganti Pasword - SMK 5 Padang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href = "../index.php">Home</a></li>
                <li class="breadcrumb-item active">Guru</li>
            </ol>
            <div class="card" >
                <div class="card-header">
                <i class="fa-solid fa-list"></i> Data Guru <a href="<?= $main_url ?>guru/add-guru.php" class= "btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Guru</a>
                </div>

                <div class="card-body" >
                    <table class="align-items-center" id="datatablesSimple">
                        <thead>
                            <tr>
                            <th scope="col"><center>No</center></th>
                            <th scope="col"><center>Foto</center></th>
                            <th scope="col"><center>NIP</center></th>
                            <th scope="col"><center>Nama</center></th>
                            <th scope="col"><center>Telepon</center></th>
                            <th scope="col"><center>Agama</center></th>
                            <th scope="col"><center>Alamat</center></th>
                            <th scope="col"><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                            while ($data = mysqli_fetch_array($queryGuru)){
                            ?>
                            <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td align="center"><img src="../asset/image/<?=$data['foto'] ?>" class="rounded-circle" width="60px" alt=""></td>
                            <td><?= $data['nip'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['telepon'] ?></td>
                            <td ><?= $data['agama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td align="center">
                                <a href="edit-guru.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="update guru"><i class="fa-solid fa-pen"></i></a>
                                <a href="delete-guru.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger" title="hapus guru" onclick="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            </tr>
                            
                            <?php } ?>

                        </tbody>
                        </table>
                </div>

            </div>
        </div>
    </main>




<?php

require_once "../template/footer.php";

?>