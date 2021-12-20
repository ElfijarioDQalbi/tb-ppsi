<?php 
	session_start();
	include '../conn/koneksi.php';
	if(!isset($_SESSION['email'])){
		header('location:../index.php');
	}
	elseif($_SESSION['data']['level'] != "admin"){
		header('location:../index.php');
	}
 ?>
  <!DOCTYPE html>
  <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas - Sistem Informasi BEM KM FTI</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

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
            <a href="#name" class="col s3"> Welcome, <span class="white-text name"><?php echo ucwords($_SESSION['data']['nama_petugas']); ?></span></a>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Laporan Pengaduan</h4>
                                    </div>
                                    <div class="card-body">
                                        <table id="example" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIM</th>
                                                    <th>Petugas</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Tanggal Ditanggapi</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no=1;
                                                    $query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN mahasiswa ON pengaduan.nim=mahasiswa.nim INNER JOIN respon ON pengaduan.id_pengaduan=respon.id_pengaduan INNER JOIN petugas ON respon.nip=petugas.nip ORDER BY respon.id_pengaduan DESC");
                                                    while ($r=mysqli_fetch_assoc($query)) { ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $r['nama']; ?></td>
                                                        <td><?php echo $r['nim']; ?></td>
                                                        <td><?php echo $r['nama_petugas']; ?></td>
                                                        <td><?php echo $r['tgl_pengaduan']; ?></td>
                                                        <td><?php echo $r['tgl_respon']; ?></td>
                                                        <td><?php echo $r['status']; ?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="#more?id_respon=<?php echo $r['id_respon'] ?>">Detail</a> 
                                                        </td>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="more?id_respon=<?php echo $r['id_respon'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="blue darken-4-text valign center">Detail</h4>
            <div class="col s12">
				<p>NIK : <?php echo $r['nik']; ?></p>
            	<p>Dari : <?php echo $r['nama']; ?></p>
            	<p>Petugas : <?php echo $r['nama_petugas']; ?></p>
				<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
				<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
				<?php 
					if($r['foto']=="kosong"){ ?>
						<img src="../img/noImage.png" width="100">
				<?php	}else{ ?>
					<img width="100" src="../img/<?php echo $r['foto']; ?>">
				<?php }
				 ?>
				<br><b>Pesan</b>
				<p><?php echo $r['isi_laporan']; ?></p>
				<br><b>Respon</b>
				<p><?php echo $r['tanggapan']; ?></p>
            </div>

          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

                                                    </tr>
                                                        <?php  }
                                                        ?>

                                            </tbody>
                                        </table>     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col s12 m3">
                <div class="section"></div>
                <a class="btn btn-success" href="cetak.php">Generate Laporan</a>
             </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; BEM KM FTI UNAND</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>