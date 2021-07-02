<?php
include_once('../functions.php');
?>
<?php
if (isset($_POST["TblHapus"])) {
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $nis  = $db->escape_string($_POST["nis"]);
        // Susun query delete
        $sql = "DELETE FROM siswa WHERE nis='$nis'";
        // Eksekusi query delete
        $res = $db->query($sql);
        if ($res) {
            if ($db->affected_rows > 0) // jika ada data terhapus
                echo "<script>
                alert('Data berhasil dihapus')
                document.location.href = '../admin/keloladatasiswa.php';
            </script>";
            else // Jika sql sukses tapi tidak ada data yang dihapus
                echo "<script>
                alert('Penghapusan gagal, karena data tidak ada!')
                document.location.href = '../admin/keloladatasiswa.php';
            </script>";
        } else { // gagal query
            echo "<script>
            alert('Data gagal dihapus')
            document.location.href = '../admin/keloladataguru.php';
        </script>";
        }
?>
<?php
    } else
        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
}
?>