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
            $nis  = $db->escape_string($_POST["nis"]);
            $biologi       = $db->escape_string($_POST["biologi"]);
            $kimia = $db->escape_string($_POST["kimia"]);
            $fisika       = $db->escape_string($_POST["fisika"]);
            $bahasaindonesia       = $db->escape_string($_POST["bahasaindonesia"]);
            $matematika = $db->escape_string($_POST["matematika"]);
            $tik = $db->escape_string($_POST["tik"]);
            // Susun query insert
            $sql = "INSERT INTO nilai_siswa(nis,biologi,kimia,fisika,bahasaindonesia,matematika,tik)
         VALUES('$nis','$biologi','$kimia','$fisika','$bahasaindonesia','$matematika','$tik')";
            // Eksekusi query insert
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada penambahan data
    ?>
    <script>
        alert('Data berhasil ditambahkan!')
        document.location.href = 'kelolanilai.php';
    </script>
    <?php
                }
            } else {
                ?>
    <script>
        alert('Data gagal ditambahkan!')
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