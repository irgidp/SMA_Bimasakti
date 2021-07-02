<?php
include_once("../functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $nis = $db->escape_string($_POST["nis"]);
            $namasiswa = $db->escape_string($_POST["nama_siswa"]);
            $jeniskelamin = $db->escape_string($_POST["jenis_kelamin"]);
            $kelas = $db->escape_string($_POST["kelas"]);
            $jurusan = $db->escape_string($_POST["jurusan"]);
            $nip = $db->escape_string($_POST["nip"]);
            // Susun query insert
            $sql = "INSERT INTO siswa(nis,nama_siswa,jenis_kelamin,kelas,jurusan,nip)
         VALUES('$nis','$namasiswa','$jeniskelamin','$kelas','$jurusan','$nip')";
            // Eksekusi query insert
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada penambahan data
    ?>
    <script>
        alert('Data berhasil ditambahkan!')
        document.location.href = 'keloladatasiswa.php';
    </script>
    <?php
                }
            } else {
                ?>
    <script>
        alert('Data gagal ditambahkan!')
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