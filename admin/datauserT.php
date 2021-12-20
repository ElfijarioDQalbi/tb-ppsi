<?php 
include('koneksi.php');

if (isset($_POST['submit'])){
    $nip = $_POST['nip'];
    $nama_ptg = $_POST['nama_ptg'];
    $password_ptg = md5($_POST['password_ptg']);
    $notelp_ptg = $_POST['notelp_ptg'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO petugas (level,nama_petugas,password,no_hp,nip,email,alamat) 
    VALUES ('$level','$nama_ptg','$password_ptg','$notelp_ptg','$nip','$email','$alamat')";
    $result = mysqli_query($db,$query);

    if ($result > 0) {
        header("location: datauser.php?berhasil=yes");
    } else {
        header("location: datauser.php?berhasil=no");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Akun User Petugas</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
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
                            <h3>Kelola Akun User</h3>
                            <p class="text-subtitle text-muted">Mengelola data akun user sistem</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first float-end">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Petugas</li>
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
                                            <label for="nip" class="mb-1">NIP</label>
                                            <input type="number" id="nip" class="form-control" name="nip">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="nama_ptg" class="mb-1">Nama Lengkap</label>
                                            <input type="text" id="nama_ptg" class="form-control" name="nama_ptg">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="password_ptg" class="mb-1">Password</label>
                                            <input type="password" id="password_ptg" class="form-control" name="password_ptg">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="notelp_ptg" class="mb-1">Nomor Telepon</label>
                                            <input type="number" id="notelp_ptg" class="form-control" name="notelp_ptg">
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
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="level" class="mb-1">Level User</label>
                                            <select class="form-select" id="level" name="level">
                                                <option disabled selected>--Pilih--</option>
                                                <option value="admin">Admin</option>
                                                <option value="petugas">Petugas Fakultas</option>
                                            </select>
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