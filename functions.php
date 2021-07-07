<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
	$db = new mysqli("localhost:3306", "root", "", "dbso"); // Sesuaikan dengan konfigurasi server anda.
	return $db;
}


// data guru
function getdataguru()
{
	$db = dbConnect();
	if ($db->connect_errno == 0) {
		$res = $db->query("SELECT * FROM guru ORDER BY nip");
		if ($res) {
			if (isset($_GET['cari'])) {
				// var_dump($_GET);
				$cari = $_GET['cari'];
				$res = $db->query("SELECT * FROM guru where nama_guru like'%" . $cari . "%'");
			} else {
				$res = $db->query("SELECT * FROM guru ");
			}
			?>

<!-- <div class="container">
	<h1>Data guru</h1>
	<form class="form-inline method='GET'">
		<input class="ml-auto form-control mr-sm-2" name="cari" type="search" placeholder="Cari Nama Penjual"
			aria-label="Search">
		<button class="ml-auto btn btn-outline-success my-2 my-sm-0" type="submit" action="">cari</button>
	</form>
	<br>
	<a href="tambahguru.php" class="btn-sm btn-success">Tambah</a>
	<br> -->
<table id="datatablesSimple" class="table table-bordered text-center mb-5">
	<thead>
		<tr>
			<th scope="col">NIP</th>
			<th scope="col">Nama Guru</th>
			<th scope="col">Jenis kelamin</th>
			<th scope="col">Mata Pelajaran</th>
			<th scope="col">Wali Kelas</th>
			<th scope="col">Password</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th scope="col">NIP</th>
			<th scope="col">Nama Guru</th>
			<th scope="col">Jenis kelamin</th>
			<th scope="col">Mata Pelajaran</th>
			<th scope="col">Wali Kelas</th>
			<th scope="col">Password</th>
			<th scope="col">Aksi</th>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<?php
				$data = $res->fetch_all(MYSQLI_ASSOC);
				foreach ($data as $barisdata) {
				?>
			<td><?php echo $barisdata["nip"]; ?></td>
			<td><?php echo $barisdata["nama_guru"]; ?></td>
			<td><?php echo $barisdata["jenis_kelamin"]; ?></td>
			<td><?php echo $barisdata["mata_pelajaran"]; ?></td>
			<td><?php echo $barisdata["wali_kelas"]; ?></td>
			<td><?php echo md5($barisdata["password_guru"]); ?></td>
			<td><a href='editGuru.php?nip=<?php echo $barisdata["nip"]; ?>' class="btn-sm btn-success">Edit</a>
				<a href="hapusGuru.php?nip=<?php echo $barisdata["nip"]; ?>" class="btn-sm btn-danger">Hapus</a>
			</td>
		</tr>
		<tr>
			<?php
							}
							$res->free();
							return $data;
						} else
							return FALSE;
					} else
						return FALSE; ?>
		</tr>
	</tbody>
</table>


<?php
}

	//dataguru
	function gurudata($nip)
	{
		$db = dbConnect();
		if ($db->connect_errno == 0) {
			$res = $db->query("SELECT nip,nama_guru,jenis_kelamin,mata_pelajaran,wali_kelas,password_guru
					FROM guru
					WHERE nip='$nip'");
			if ($res) {
				if ($res->num_rows > 0) {
					$data = $res->fetch_assoc();
					$res->free();
					return $data;
				} else
					return FALSE;
			} else
				return FALSE;
		} else
			return FALSE;
	}
		?>
<?php
		// data siswa
		function getdatasiswa()
		{
			$db = dbConnect();
			if ($db->connect_errno == 0) {
				$res = $db->query("SELECT a.nis,a.nama_siswa,a.kelas,a.jenis_kelamin,a.jurusan,b.nama_guru FROM siswa a JOIN guru b ON a.nip=b.nip");
				if ($res) {
		?>
<?php
					if (isset($_GET['cari'])) {
						// var_dump($_GET);
						$cari = $_GET['cari'];
						$res = $db->query("SELECT a.nis,a.nama_siswa,a.kelas,a.jenis_kelamin,a.jurusan,b.nama_guru FROM siswa a JOIN guru b ON a.nip=b.nip where a.nama_siswa like'%" . $cari . "%'");
					} else {
						$res = $db->query("SELECT a.nis,a.nama_siswa,a.kelas,a.jenis_kelamin,a.jurusan,b.nama_guru FROM siswa a JOIN guru b ON a.nip=b.nip ");
					}
					?>
<table class="table table-bordered text-center mb-5" id="datatablesSimple">
	<thead>
		<tr>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Jenis Kelamin</th>
			<th>Kelas</th>
			<th>Jurusan </th>
			<th>Wali Kelas</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
				$data = $res->fetch_all(MYSQLI_ASSOC);
				foreach ($data as $barisdata) {
			?>
		<tr>
			<td><?php echo $barisdata["nis"]; ?></td>
			<td><?php echo $barisdata["nama_siswa"]; ?></td>
			<td><?php echo $barisdata["jenis_kelamin"]; ?></td>
			<td><?php echo $barisdata["kelas"]; ?></td>
			<td><?php echo $barisdata["jurusan"]; ?></td>
			<td><?php echo $barisdata["nama_guru"]; ?></td>
			<td><a href="editSiswa.php?nis=<?php echo $barisdata["nis"]; ?>" class="btn-sm btn-success">Edit</a> |
				<a href="hapusSiswa.php?nis=<?php echo $barisdata["nis"]; ?>" class="btn-sm btn-danger">Hapus</a>
			</td>
		</tr>
		<tr>
			<?php
					}
					$res->free();
					return $data;
				} else
					return FALSE;
			} else
				return FALSE;
				?>
	</tbody>
</table>
</div>
</tr>

<?php
			}
			// datasiswa
			function datasiswa()
			{
				$db = dbConnect();
				if ($db->connect_errno == 0) {
					$res = $db->query("SELECT 
					a.nama_siswa,
					a.nis,
					a.kelas,
					a.jenis_kelamin,
					a.jurusan,
					b.nama_guru,
					b.nip
					FROM siswa a 
					JOIN guru b 
					ON a.nip=b.nip");
					if ($res) {
						if ($res->num_rows > 0) {
							$data = $res->fetch_assoc();
							$res->free();
							return $data;
						} else
							return FALSE;
					} else
						return FALSE;
				} else
					return FALSE;
			}

			function getdatasiswabynis($nis)
			{
				$db = dbConnect();
				if ($db->connect_errno == 0) {
					$res = $db->query("SELECT 
					a.nama_siswa,
					a.nis,
					a.kelas,
					a.jenis_kelamin,
					a.jurusan,
					b.nama_guru,
					b.nip
					FROM siswa a 
					JOIN guru b 
					ON a.nip=b.nip
					WHERE a.nis = '$nis'");
					if ($res) {
						if ($res->num_rows > 0) {
							$data = $res->fetch_assoc();
							$res->free();
							return $data;
						} else
							return FALSE;
					} else
						return FALSE;
				} else
					return FALSE;
			}


			function totalsiswa()
			{
				$db = dbConnect();
				$res = $db->query("SELECT COUNT(nis) as total FROM siswa");
				$data = $res->fetch_array();
				echo $data['total'];
			}
			function totalguru()
			{
				$db = dbConnect();
				$res = $db->query("SELECT COUNT(nip) as total FROM guru");
				$data = $res->fetch_array();
				echo $data['total'];
			}

			function navbar()
			{
			}
?>


<!-- kelola nilai -->
<?php
		// data nilai
		function getdatanilai()
		{
			$db = dbConnect();
			if ($db->connect_errno == 0) {
				$res = $db->query("SELECT b.nis,a.biologi,a.kimia,a.fisika,a.bahasaindonesia,a.matematika, a.tik FROM nilai_siswa a JOIN siswa b ON a.nis=b.nis");
				if ($res) {
		?>
<?php
					if (isset($_GET['cari'])) {
						// var_dump($_GET);
						$cari = $_GET['cari'];
						$res = $db->query("SELECT b.nis,a.biologi,a.kimia,a.fisika,a.bahasaindonesia,a.matematika, a.tik FROM nilai_siswa a JOIN siswa b ON a.nis=b.nis where b.nis like'%" . $cari . "%'");
					} else {
						$res = $db->query("SELECT b.nis,a.biologi,a.kimia,a.fisika,a.bahasaindonesia,a.matematika, a.tik FROM nilai_siswa a JOIN siswa b ON a.nis=b.nis ");
					}
					?>
<table class="table table-bordered text-center mb-5" id="datatablesSimple">
	<thead>
		<tr>
			<th>NIS</th>
			<th>Biologi</th>
			<th>Kimia</th>
			<th>Fisika</th>
			<th>B Indonesia </th>
			<th>Matematika</th>
			<th>TIK</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
				$data = $res->fetch_all(MYSQLI_ASSOC);
				foreach ($data as $barisdata) {
			?>
		<tr>
			<td><?php echo $barisdata["nis"]; ?></td>
			<td><?php echo $barisdata["biologi"]; ?></td>
			<td><?php echo $barisdata["kimia"]; ?></td>
			<td><?php echo $barisdata["fisika"]; ?></td>
			<td><?php echo $barisdata["bahasaindonesia"]; ?></td>
			<td><?php echo $barisdata["matematika"]; ?></td>
			<td><?php echo $barisdata["tik"]; ?></td>
			<td><a href="editNilai.php?nis=<?php echo $barisdata["nis"]; ?>" class="btn-sm btn-success">Edit</a> |
				<a href="hapusNilai.php?nis=<?php echo $barisdata["nis"]; ?>" class="btn-sm btn-danger">Hapus</a>
			</td>
		</tr>
		<tr>
			<?php
					}
					$res->free();
					return $data;
				} else
					return FALSE;
			} else
				return FALSE;
				?>
	</tbody>
</table>
</div>
</tr>

<?php
			}
			// datasiswa
			function datanilai()
			{
				$db = dbConnect();
				if ($db->connect_errno == 0) {
					$res = $db->query("SELECT 
					b.nis,
					a.biologi,
					a.kimia,
					a.fisika,
					a.bahasaindonesia,
					a.matematika,
					a.tik
					FROM nilai_siswa a 
					JOIN siswa b 
					ON a.nis=b.nis");
					if ($res) {
						if ($res->num_rows > 0) {
							$data = $res->fetch_assoc();
							$res->free();
							return $data;
						} else
							return FALSE;
					} else
						return FALSE;
				} else
					return FALSE;
			}

			function getdatanilaibynis($nis)
			{
				$db = dbConnect();
				if ($db->connect_errno == 0) {
					$res = $db->query("SELECT 
					b.nis,
					a.biologi,
					a.kimia,
					a.fisika,
					a.bahasaindonesia,
					a.matematika,
					a.tik
					FROM nilai_siswa a 
					JOIN siswa b 
					ON a.nis=b.nis
					WHERE a.nis = '$nis'");
					if ($res) {
						if ($res->num_rows > 0) {
							$data = $res->fetch_assoc();
							$res->free();
							return $data;
						} else
							return FALSE;
					} else
						return FALSE;
				} else
					return FALSE;
			}
?>