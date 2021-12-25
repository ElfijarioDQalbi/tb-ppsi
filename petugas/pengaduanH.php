<?php include('../conn/koneksi.php');

$id = $_GET['id'];
$statement = $koneksi->prepare("DELETE FROM pengaduan WHERE id_pengaduan = $id");
$statement->bind_param('i', $id);
$statement->execute();

if ($statement > 0) {
    header("location:pengaduan.php?berhasil=yes");
} else {
    header("location:pengaduan.php?berhasil=no");
}
