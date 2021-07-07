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
    <title>Input Nilai Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../assets/css/siswa.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  </head>

  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="dashboardGuru.php">BIMASAKTI</a>

      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Logo-->
      <form class="d-none d-md-inline-block form-inline mx-auto">
        <div class="input-group">
          <img src="../assets/img/logo.png" alt="logo" width="53.143px" />
          <h1>BIMASAKTI</h1>
        </div>
      </form>

      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
              <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="dashboardGuru.php">
                <div class="sb-nav-link-icon"><i class="bi bi-speedometer2"></i></div>
                Dashboard
              </a>
              <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="searchSiswa.html">
                <div class="sb-nav-link-icon"><i class="bi bi-search"></i></div>
                Search Siswa
              </a>
              <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="inputnilai.html">
                <div class="sb-nav-link-icon"><i class="bi bi-file-plus"></i></div>
                Input Nilai
              </a>
              <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="kelolanilai.php">
                <div class="sb-nav-link-icon"><i class="bi bi-pencil-square"></i></div>
                Kelola Nilai
              </a>
              <a class="nav-link btn btn-color btn-pjg mx-auto my-4" href="keloladatasiswa.php">
                <div class="sb-nav-link-icon"><i class="bi bi-pencil-square"></i></div>
                Kelola Siswa
              </a>
            </div>
          </div>
        </nav>
      </div>



      <!-- Content Sidenav -->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <!-- Row Search dan Box -->
            <div class="row">
              <div class="col-md-12">
                <h1 class="text-center my-3">Input Data Nilai</h1>
              </div>
              <div class="col-md-12">
                <div class="text-center">
                  <img src="../assets/img/logo.png" class="rounded" alt="..." width="93px" />
                </div>
              </div>
              <div class="col-md-1 my-4"></div>
              <div class="col-md-10">
              <!-- form untuk menampilkan data siswa -->
              <form method="post" name="frm" > 
                <div class="input-group">
                  <input type="text" id="nis" class="form-control rounded-start"  placeholder="Masukkan NIS" name="dicari" value="<?php echo isset($_POST["dicari"])?$_POST["dicari"]:"";?>">
                  <input type="submit" name="TblCari" value="Cari" class="btn btn-color2 rounded-end">
                </div>
                <!-- end form  -->
                </form>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-1"></div>

              <?php
                  if(isset($_POST["TblCari"])){
                  $db = dbConnect();
                    if($db->connect_errno==0){
                       $dicari=$db->escape_string($_POST["dicari"]);
                       $sql="SELECT * FROM siswa WHERE nis like '$dicari%'";
                       $res=$db->query($sql);
                       if($res){ // eksekusi sql sukses
              ?>
              <?php
                  $data=$res->fetch_all(); // ambil seluruh baris data
                  foreach($data as $barisdata){ // telusuri satu per satu
              ?>

         
              <div class="col-md-10 py-5">
                <div class="container-fluid bg-light rounded-css">
                  <div class="row">
                    <div class="col-md-6">
                    <!-- form untuk menyimpan nilai yang baru -->
                      <form method="post" name="frm" action="nilaiSimpan.php" onclick="validasidata()">
                      <table class="table table-borderless text-left">
                        <tbody>
                          <tr>
                            <td width="10">NIS</td>
                            <td width="10">:</td>
                            <td>
                                <input type="text" id="nis" name="nis" class="form-control" value="<?php echo $barisdata[0]; ?>" readonly>
                            <td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><div><?php echo $barisdata[1];?></td>
                          </tr>
                          <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><div><?php echo $barisdata[3];?></td>
                          </tr>
                          <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td><div><?php echo $barisdata[4];?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>

            <!-- End Row Search and Box -->

            <div class="row">
              <div class="col-md-1 py-3"></div>
              <div class="col-md-2 py-3">
              <label for="biologi" class="form-label fw-bold">Biologi</label>
                  <input type="text" id="biologi" name="biologi" class="form-control" placeholder="masukan nilai">
              </div>

              <div class="col-md-2 py-3"></div>
              <div class="col-md-2 py-53">
              <label for="kimia" class="form-label fw-bold">Kimia</label>
                  <input type="text" id="kimia" name="kimia" class="form-control" placeholder="masukan nilai">
              </div>

              <div class="col-md-2 py-3"></div>
              <div class="col-md-2 py-3">
              <label for="fisika" class="form-label fw-bold">Fisika</label>
                  <input type="text" id="fisika" name="fisika" class="form-control" placeholder="masukan nilai">
              </div>

              <div class="col-md-1 py-3"></div>
              <div class="col-md-1"></div>
              <div class="col-md-2">
              <label for="bahasaindonesia" class="form-label fw-bold">B Indonesia</label>
                  <input type="text" id="bahasaindonesia" name="bahasaindonesia" class="form-control" placeholder="masukan nilai">
              </div>

              <div class="col-md-2"></div>
              <div class="col-md-2">
              <label for="matematika" class="form-label fw-bold">Matematika</label>
                  <input type="text" id="matematika" name="matematika" class="form-control" placeholder="masukan nilai">
              </div>

              <div class="col-md-2"></div>
              <div class="col-md-2">
              <label for="tik" class="form-label fw-bold">TIK</label>
                  <input type="text" id="tik" name="tik" class="form-control" placeholder="masukan nilai">
              </div>
              <div class="col-md-1"></div>

              <!-- Button Simpan Ubah -->
              <div class="col-md-5 py-4"></div>
              <div class="col-md-2 py-5 end-0">

              <button type="submit" class="btn btn-primary btn-pjg" name="TblSimpan" value="Simpan">Simpan</button>
              </div>
              <div class="col-md-4 py-5"></div>
              </div>
          </div>
          <!-- end form simpan nilai -->
              </form>
              <?php
		            }
		          $res->free();
               }else 
                  echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";  
               }else
                  echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
               }else
                  echo "silahkan isi NIM atau Nama siswa untuk memasukan nilai";
            ?>    
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../assets/js/datatables-simple-demo.js"></script>
  </body>
</html>
