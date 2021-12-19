<?php include('koneksi.php');

$id = $_GET['id'];
$statement = $db->prepare("DELETE FROM petugas WHERE nip = $id");
$statement->bind_param('i', $id);
$statement->execute();

if ($statement > 0) {
    header("location:datauser.php?berhasil=yes");
} else {
    header("location:datauser.php?berhasil=no");
}
