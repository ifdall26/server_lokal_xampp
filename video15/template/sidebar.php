        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard                                
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Akun</div>
                            <a class="nav-link" href="<?= $main_url?>user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User                                
                            </a>
                            <a class="nav-link" href="<?= $main_url?>user/password.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Ganti Password                             
                            </a>
                            <hr class="mb-0">                   
                            <div class="sb-sidenav-menu-heading">Informasi</div>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Kurikulum                            
                            </a>
                            <a class="nav-link" href="<?= $main_url?>siswa/siswa.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Siswa                               
                            </a>
                            <a class="nav-link" href="<?= $main_url?>guru/guru.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                                Guru                             
                            </a>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                                Pegawai                             
                            </a>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
                                Sarana dan Prasarana                            
                            </a>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                                Keuangan                           
                            </a>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-arrows"></i></div>
                                Husemas                            
                            </a>  
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-envelopes-bulk"></i></div>
                                Tata Usaha                             
                            </a>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-mosque"></i></div>
                                Layanan Khusus                             
                            </a>                          
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-globe"></i></div>
                                Umum  
                            <hr class="mb-0">       
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION["ssUser"]?>
                    </div>
                </nav>
            </div>
