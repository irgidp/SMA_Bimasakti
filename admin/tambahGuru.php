<?php include_once("../functions.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tambah Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../assets/css/siswa.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script type="text/javascript" language="javascript">
        function validasidata() {
            var nip = document.frm.nip.value.trim();
            if (nip.length == 0) {
                alert("NIP tidak boleh kosong.");
                document.frm.nip.focus();
                return false;
            }
            var nama_guru = document.frm.nama_guru.value.trim();
            if (nama_guru.length == 0) {
                alert("Nama Guru tidak boleh kosong.");
                document.frm.nama_guru.focus();
                return false;
            }
            var statusdipilih = false;
            for (var i = 0; i < document.frm.jenis_kelamin.length; i++) {
                if (document.frm.jenis_kelamin[i].checked) {
                    statusdipilih = true;
                }
            }
            if (!statusdipilih) {
                alert("Status tidak boleh dikosongkan. Pilih salah satu.");
                return false;
            }
            if (document.frm.mata_pelajaran.selectedIndex == 0) {
                alert("mata pelajaran wajib dipilih.");
                document.frm.mata_pelajaran.focus();
                return false;
            }

        }
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">BIMASAKTI</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Logo-->
        <form class="d-none d-md-inline-block form-inline mx-auto ">
            <div class="input-group">
                <img src="../assets/img/logo.png" alt="logo" width="53.143px">
                <h1>BIMASAKTI</h1>
            </div>
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Sidenav -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-center fs-2">Menu</div>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4 " href="dashboardAdmin.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-speedometer2"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="keloladataguru.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-journal-text"></i></div>
                            Kelola Guru
                        </a>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="keloladatasiswa.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-journal-text"></i></div>
                            Kelola Siswa
                        </a>
                        <!-- <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="index.html">
                            <div class="sb-nav-link-icon "><i class="bi bi-pencil-square"></i></div>
                            Kelola Nilai
                        </a>
                        <a class="nav-link btn btn-danger btn-pjg mx-auto mt-5 text-center btn-logout"
                            href="index.html">
                            Logout
                        </a> -->

                    </div>
                </div>
            </nav>
        </div>

        <!-- Content Sidenav -->

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-5">
                    <h1 class="mt-5 bg-light">Tambah Data Guru</h1>
                    <div class="row">
                        <form method="post" name="frm" action="gurusimpan.php" onsubmit="return validasidata()">
                            <div class="col-md-12 py-2">
                                <label for="nip" class="form-label fw-bold">NIP</label>
                                <input type="text" id="nip" name="nip" class="form-control" placeholder="Masukkan NIP">
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="nama_guru" class="form-label fw-bold">Nama</label>
                                <input type="text" id="nama_guru" name="nama_guru" class="form-control"
                                    placeholder="Masukkan Nama">
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                                <br>
                                <input type="radio" name="jenis_kelamin" value="L"
                                    value="<?php echo $dataguru["jenis_kelamin"]; ?>"> Laki-laki<br>
                                <input type="radio" name="jenis_kelamin" value="P"
                                    value="<?php echo $dataguru["jenis_kelamin"]; ?>"> Perempuan<br>
                            </div>
                            <div class="col-md-12 py-2">
                                <label for="mata_pelajaran" class="form-label fw-bold">Mengajar</label>
                                <select type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-select">
                                    <option selected>-- Pilih Mata Pelajaran--</option>
                                    <?php
                        $db = dbConnect();
                        $res = $db->query("SELECT * FROM mata_pelajaran ORDER BY kode_pelajaran");
                        while ($data = mysqli_fetch_array($res)) :
                        ?>
                                    <option value="<?= $data['pelajaran'] ?>"><?= $data['pelajaran'] ?></option>
                                    <?php
                        endwhile;
                        ?>
                                </select>
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="wali_kelas" class="form-label fw-bold">Wali Kelas</label>
                                <select type="text" name="wali_kelas" id="wali_kelas" class="form-select">
                                    <option selected>-- Pilih Walikelas --</option>
                                    <option name="wali_kelas">Hanya Mengajar</option>
                                    <option name="wali_kelas">IPA-1</option>
                                    <option name="wali_kelas">IPA-2</option>
                                    <option name="wali_kelas">IPA-3</option>
                                    <option name="wali_kelas">IPS-1</option>
                                    <option name="wali_kelas">IPS-2</option>
                                    <option name="wali_kelas">IPS-3</option>
                                </select>
                            </div>
                            <div class="col-md-12 py-2">
                                <label for="password_guru" class="form-label fw-bold">Password</label>
                                <input input type="text" name="password_guru" id="password_guru" class="form-control">
                            </div>
                            <!-- Button Ubah -->
                            <div class="col-md-12 py-2">
                                <button type="submit" class="btn btn-primary btn-pjg" name="TblSimpan"
                                    value="Simpan">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </main>
            <footer class="py-4 mx-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="">Copyright &copy; SMA Bimasakti 2021. All Right Reserved</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="assets/js/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>
</body>

</html>