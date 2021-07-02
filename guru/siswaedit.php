<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pembaruan Data siswa</title>
</head>

<body>
    <h1>Pembaruan Data siswa</h1>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $nis  = $db->escape_string($_POST["nis"]);
            $namasiswa       = $db->escape_string($_POST["nama_siswa"]);
            $jeniskelamin = $db->escape_string($_POST["jenis_kelamin"]);
            $kelas       = $db->escape_string($_POST["kelas"]);
            $jurusan       = $db->escape_string($_POST["jurusan"]);
            $nip = $db->escape_string($_POST["nip"]);
            // Susun query update
            $sql = "UPDATE siswa SET 
			  nis='$nis',
              nama_siswa='$namasiswa',
              jenis_kelamin='$jeniskelamin',
              kelas='$kelas',
              jurusan='$jurusan',
              nip='$nip',
			  nis='" . $db->escape_string($_POST["nis"]) . "'
			  WHERE nis='$nis'";
            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
    ?>
    <script>
        alert('Data berhasil diubah!')
        document.location.href = 'keloladatasiswa.php';
    </script>
    <?php
                } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
    <script>
        alert('Data berhasil diubah, tapi tidak ada perubahan!')
        document.location.href = 'keloladatasiswa.php';
    </script>
    <?php
                }
            } else { // gagal query
                ?>
    <script>
        alert('Data gagal diubah!')
        document.location.href = 'keloladatasiswa.php';
    </script>
    <?php
            }
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>