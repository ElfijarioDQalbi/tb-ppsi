<?php

$db = mysqli_connect("localhost","root","","tb_ppsi");

if ($db->connect_errno > 0) {
    die('Gagal koneksi ke database');
}
