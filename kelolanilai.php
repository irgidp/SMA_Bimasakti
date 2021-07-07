<?php
include_once("../functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kelola Data Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../assets/css/siswa.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">BIMASAKTI</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
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
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-center fs-2">Menu</div>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4 " href="dashboardGuru.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-speedometer2"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="searchSiswa.html">
                            <div class="sb-nav-link-icon "><i class="bi bi-search"></i></div>
                            Search Siswa
                        </a>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="inputNilai.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-file-plus"></i></div>
                            Input Nilai
                        </a>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="kelolanilai.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-pencil-square"></i></div>
                            Kelola Nilai
                        </a>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="keloladatasiswa.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-pencil-square"></i></div>
                            Kelola Siswa
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid bg-light px-4">
                    <h1 class="mt-4">Kelola Data Nilai Siswa</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Nilai Siswa
                        </div>
                        <div class="card-body">
                            <?php
                        $db = dbConnect();
                        getdatanilai();
                        ?>
                        </div>
                        <a href="inputnilai.php" type="button" class="btn btn-primary btn-pjg my-3">Tambah Nilai</a>
                        <br>

                    </div>
                </div>
            </main>
            <!-- <div class="div">
                <footer class="py-4 mx-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="">Copyright &copy; SMA Bimasakti 2021. All Right Reserved</div>

                        </div>
                    </div>
                </footer>
            </div> -->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/js/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../assets/js/datatables-simple-demo.js"></script>
</body>

</html>