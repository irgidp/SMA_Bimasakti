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
            $biologi       = $db->escape_string($_POST["biologi"]);
            $kimia = $db->escape_string($_POST["kimia"]);
            $fisika       = $db->escape_string($_POST["fisika"]);
            $bahasaindonesia       = $db->escape_string($_POST["bahasaindonesia"]);
            $matematika = $db->escape_string($_POST["matematika"]);
            $tik = $db->escape_string($_POST["tik"]);
            // Susun query update
            $sql = "UPDATE nilai_siswa SET 
			      nis='$nis',
              biologi='$biologi',
              kimia='$kimia',
              fisika='$fisika',
              bahasaindonesia='$bahasaindonesia',
              matematika='$matematika',
              tik='$tik',
              nis='" . $db->escape_string($_POST["nis"]) . "'
			  WHERE nis='$nis'";
            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
    ?>
    <script>
        alert('Data berhasil diubah!')
        document.location.href = 'kelolanilai.php';
    </script>
    <?php
                } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
    <script>
        alert('Data berhasil diubah, tapi tidak ada perubahan!')
        document.location.href = 'kelolanilai.php';
    </script>
    <?php
                }
            } else { // gagal query
                ?>
    <script>
        alert('Data gagal diubah!')
        document.location.href = 'kelolanilai.php';
    </script>
    <?php
            }
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>