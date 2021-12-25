<?php include('koneksi.php');

$id = $_GET['id'];
$statement = $db->prepare("DELETE FROM pengaduan WHERE id_pengaduan = $id");
$statement->bind_param('i', $id);
$statement->execute();

if ($statement > 0) {
    header("location:pengaduan.php?berhasil=yes");
} else {
    header("location:pengaduan.php?berhasil=no");
}
