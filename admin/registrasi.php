<?php include('koneksi.php');
$query   = $db->query("SELECT * FROM mahasiswa");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Registrasi Akun Mahasiswa</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">

        <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">

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
                            <h3>Registrasi Akun Mahasiswa </h3>
                            <p class="text-subtitle text-muted">Mengelola registrasi akun mahasiswa</p>
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
                    <a href="registrasiT.php" class="btn btn-primary mb-1">Tambah Data</a>
                    <div class="col-4">
                        <?php if (isset($_GET['berhasil']) == 'yes') : ?>
                            <div class="alert alert-success alert-dismissible show fade">
                                Berhasil.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No.HP</th>
                                    <th>Opsi Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                while ($data = mysqli_fetch_assoc($query)) : ?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $data['nim']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['alamat']; ?></td>
                                        <td><?= $data['email']; ?></td>
                                        <td><?= $data['no_hp']; ?></td>
                                        <td>
                                            <div class="buttons">
                                                <a href="registrasiE.php?id=<?= $data['nim']; ?>" class="btn icon btn-warning"><i class="bi bi-pencil"></i></a>
                                                <a href="registrasiH.php?id=<?= $data['nim']; ?>" class="btn icon btn-danger" onclick="return confirm('Anda yakin ingin menghapus?'); "><i class="bi bi-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
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
        
    </body>
</html>