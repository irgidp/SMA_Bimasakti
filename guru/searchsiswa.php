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
    <title>Kelola Data Siswa</title>
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
                    <li><a class="dropdown-item" href="../login.php">Logout</a></li>
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
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="searchSiswa.php">
                            <div class="sb-nav-link-icon "><i class="bi bi-journal-text"></i></div>
                            Search Siswa
                        </a>
                        <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="inputnilai.html">
                            <div class="sb-nav-link-icon "><i class="bi bi-journal-text"></i></div>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center my-3">Cari Data Siswa</h1>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <img src="../assets/img/logo.png" class="rounded" alt="..." width="93px">
                            </div>
                        </div>
                        <div class="col-md-1 my-4">
                        </div>
                        <div class="col-md-10">
                            <form method="post" div class="input-group" >
                        <td><input type="search" class="form-control rounded-start" width="20" name="dicari" placeholder="Masukkan NIS/Nama" 
                        aria-label="Search" aria-describedby="search-addon" value="<?php echo isset($_POST["dicari"])?$_POST["dicari"]:"";?>"></td>
                        <td><input type="submit" class="btn btn-color2 rounded-end" name="TblCari" value="Cari">
                        </div>
                        </form>
                            <?php
                                if(isset($_POST["TblCari"])){
                                    $db = dbConnect();
                                    if($db->connect_errno==0){
                                        $dicari=$db->escape_string($_POST["dicari"]);
                                        $sql="SELECT * FROM nilaiSiswa WHERE nis like '$dicari%' or nama_siswa like '$dicari%'";
                                        $res=$db->query($sql);
                                        if($res){ // eksekusi sql sukses
                                            ?>
                                            <?php
                                            $data=$res->fetch_all(); // ambil seluruh baris data
                                            foreach($data as $barisdata){ // telusuri satu per satu
                                                ?>
                                                <div class="col-md-1">
                                                </div>

                                                <div class="col-md-1">
                                                </div>
                                                 <div class="col-md-10 py-5">
                                                    <div class="container-fluid bg-light rounded-css">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <table class="table table-borderless text-left">
                                                    <tbody>
                                                    <tr>
			                                    <td width="10">NIS : <?php echo $barisdata[0];?></td>
                                            </tr>
                                                <tr>
                                                <td width="10">Nama Siswa: <?php echo $barisdata[1];?></td>
                                            </tr>
                                                <tr>
                                                <td width="10">Kelas  : <?php echo $barisdata[2];?></td>
                                            </tr>
                                                <tr>
                                                <td width="10">Jurusan : <?php echo $barisdata[3];?></td>
                                            </tr>
                                                </tbody>
                                        </table>
                                    </div>

                                      </div>

                                        </div>
                                         </div>
                                             <div class="col-md-1">
                                                 </div>
                                        <center>
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-10 py-5">
                                        <table class="table table-bordered border-dark border-3">
                                        <thead>
                                        <tr>
                                        <th scope="col">Biologi</th>
                                        <th scope="col">Kimia</th>
                                        <th scope="col">Fisika</th>
                                        <th scope="col">Bahasa Indonesia</th>
                                        <th scope="col">Matematika</th>
                                        <th scope="col">TIK</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $barisdata[4];?></td>
                                        <td><?php echo $barisdata[5];?></td>
                                        <td><?php echo $barisdata[6];?></td>
                                        <td><?php echo $barisdata[7];?></td>
                                        <td><?php echo $barisdata[8];?></td>
                                        <td><?php echo $barisdata[9];?></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                </div>
            </main>
			                                    <?php
		                                    }
		                                    $res->free();

                                    }else 
                                    echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";  
                                }
                                else
                                echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
                                }
                                else
                                echo "";
                              ?>    
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
</center>
</body>

</html>