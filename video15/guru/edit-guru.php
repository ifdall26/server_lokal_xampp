<?php
session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Update Guru - SMK 5 Padang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");
$data = mysqli_fetch_array($queryGuru);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="guru.php">Guru</a></li>
                <li class="breadcrumb-item active">Update Guru</li>
            </ol>
            <form action="proses-guru.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"> <i class="fa-solid fa-pen-to-square"></i> Update Guru</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nip" pattern="[0-9]{18,}" title="minimal 18 angka" class="form-control ps-2 border-0 border-bottom" value="<?= $data['nip'] ?>" required>
                                    </div>
                                </div>

                                <!-- Corrected label formatting -->
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control ps-2 border-0 border-bottom" value="<?= $data ['nama'] ?>" required>
                                    </div>
                                </div>

                                <!-- Corrected label formatting -->
                                <div class="mb-3 row">
                                    <label for="telepon" class="col-sm-2 col-form-label">Telepon:</label>
                                    <div class="col-sm-10">
                                        <input type="tel" name="telepon" pattern="[0-9]{5,}" title="minimal 5 angka" class="form-control ps-2 border-0 border-bottom" value="<?=$data['telepon']?>" required>
                                    </div>
                                </div>

                                <!-- Corrected label formatting and 'required' attribute -->
                                <div class="mb-3 row">
                                    <label for="agama" class="col-sm-2 col-form-label">Agama:</label>
                                    <div class="col-sm-10">
                                        <select name="agama" id="agama" class="form-select border-0 border-bottom" required>
                                            <?php
                                            $agama = ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha'];
                                            foreach ($agama as $rlg) {
                                                if ($data['agama'] == $rlg) { ?>
                                                    <option value="<?= $rlg ?>" selected><?= $rlg ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $rlg ?>"><?= $rlg ?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Corrected label formatting -->
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                                <img src="../asset/image/<?= $data['foto'] ?>" alt="" class="mb-3 rounded-circle" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih foto PNG, JPG, atau JPEG dengan ukuran maksimal 1 MB</small>
                                <div><small class="text-secondary">width = height</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>


    <?php

    require_once "../template/footer.php";

    ?>
