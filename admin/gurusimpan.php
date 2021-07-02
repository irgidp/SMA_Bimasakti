<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Penyimpanan Data Produk</title>
</head>

<body>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $nip  = $db->escape_string($_POST["nip"]);
            $namaguru       = $db->escape_string($_POST["nama_guru"]);
            $jeniskelamin = $db->escape_string($_POST["jenis_kelamin"]);
            $matapelajaran  = $db->escape_string($_POST["mata_pelajaran"]);
            $walikelas       = $db->escape_string($_POST["wali_kelas"]);
            $password = $db->escape_string($_POST["password_guru"]);
            // Susun query insert
            $sql = "INSERT INTO guru(nip,nama_guru,jenis_kelamin,mata_pelajaran,wali_kelas,password_guru)
			  VALUES('$nip','$namaguru','$jeniskelamin','$matapelajaran','$walikelas','$password')";
            // Eksekusi query insert
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada penambahan data
    ?>
    <script>
        alert('Data berhasil ditambahkan!')
        document.location.href = 'keloladataguru.php';
    </script>
    <?php
                }
            } else {
                ?>
    <script>
        alert('Data gagal ditambahkan!')
        document.location.href = 'keloladataguru.php';
    </script>
    <?php
            }
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>