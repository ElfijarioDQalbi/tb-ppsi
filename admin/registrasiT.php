<?php 
include('koneksi.php');

if (isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa (nim,nama,username,password,no_hp,email,alamat) 
    VALUES ('$nim','$nama','$username','$password','$nohp','$email','$alamat')";
    $result = mysqli_query($db,$query);

    if ($result > 0) {
        header("location: registrasi.php?berhasil=yes");
    } else {
        header("location: registrasi.php?berhasil=no");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Registrasi Akun Mahasiswa</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php' ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Registrasi Akun Mahasiswa</h3>
                            <p class="text-subtitle text-muted">Tambah data akun mahasiswa</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first float-end">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="registrasi.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" method="POST" action="">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="nim" class="mb-1">NIM</label>
                                            <input type="number" id="nim" class="form-control" name="nim">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="nama" class="mb-1">Nama Lengkap</label>
                                            <input type="text" id="nama" class="form-control" name="nama">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="username" class="mb-1">Username</label>
                                            <input type="text" id="username" class="form-control" name="username">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="password" class="mb-1">Password</label>
                                            <input type="password" id="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="nohp" class="mb-1">Nomor HP</label>
                                            <input type="number" id="nohp" class="form-control" name="nohp">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="email" class="mb-1">E-mail</label>
                                            <input type="email" id="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="alamat" class="mb-1">Alamat</label>
                                            <input type="text" id="alamat" class="form-control" name="alamat">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Fakultas Teknologi Informasi - Universitas Andalas</p>
                </div>
            </div>
        </footer>
        </div>

        
    </div>
    </div>

</body>

</html>