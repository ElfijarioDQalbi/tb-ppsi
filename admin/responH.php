<?php include('koneksi.php');

$id = $_GET['id'];
$statement = $db->prepare("DELETE FROM respon WHERE id_respon = $id");
$statement->bind_param('i', $id);
$statement->execute();

if ($statement > 0) {
    header("location:respon.php?berhasil=yes");
} else {
    header("location:responr.php?berhasil=no");
}
