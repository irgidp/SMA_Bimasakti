<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pembaruan Data Produk</title>
</head>

<body>
    <h1>Pembaruan Data Produk</h1>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $nip  = $db->escape_string($_POST["nip"]);
            $namaguru       = $db->escape_string($_POST["nama_guru"]);
            $jeniskelamin = $db->escape_string($_POST["jenis_kelamin"]);
            $matapelajaran       = $db->escape_string($_POST["mata_pelajaran"]);
            $walikelas       = $db->escape_string($_POST["wali_kelas"]);
            $password = $db->escape_string($_POST["password_guru"]);
            // Susun query update
            $sql = "UPDATE guru SET 
			  nama_guru='$namaguru',nip='$nip',jenis_kelamin='$jeniskelamin',mata_pelajaran='$matapelajaran',wali_kelas='$walikelas',password_guru='$password',
			  nip='" . $db->escape_string($_POST["nip"]) . "'
			  WHERE nip='$nip'";
            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
    ?>
    <script>
        alert('Data berhasil diubah!')
        document.location.href = '../admin/keloladataguru.php';
    </script>
    <?php
                } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
    <script>
        alert('Data berhasil diubah, tapi tidak ada perubahan!')
        document.location.href = '../admin/keloladataguru.php';
    </script>
    <?php
                }
            } else { // gagal query
                ?>
    <script>
        alert('Data gagal diubah!')
        document.location.href = '../admin/keloladataguru.php';
    </script>
    <?php
            }
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>