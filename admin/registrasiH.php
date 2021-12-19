<?php include('koneksi.php');

$nim = $_GET['id'];
$statement = $db->prepare("DELETE FROM mahasiswa WHERE nim = $nim");
$statement->bind_param('i', $id);
$statement->execute();

if ($statement > 0) {
    header("location:registrasi.php?berhasil=yes");
} else {
    header("location:registrasi.php?berhasil=no");
}
