<?php 
	session_start();
	error_reporting(0);
	include '../conn/koneksi.php';
	if(!isset($_SESSION['email'])){
		header('location:../index.php');
	}
	elseif($_SESSION['level'] != "mahasiswa"){
		header('location:../index.php');
	}
 ?>
  <!DOCTYPE html>
  <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistem Informasi BEM KM FTI</title>

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
            <h1>Riwayat Pengaduan</h1>
			<div class="card">
				<div class="card-body">
					<table class="table table-striped">
						<tr>
							<td>No</td>
							<td>NIM</td>
							<td>Nama</td>
							<td>Tanggal Masuk</td>
							<td>Status</td>
							<td>Opsi</td>
						</tr>
						<?php 
							$no=1;
							$pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN mahasiswa ON pengaduan.nim=mahasiswa.nim INNER JOIN respon ON pengaduan.id_pengaduan=respon.id_pengaduan WHERE pengaduan.nim='".$_SESSION['data']['nim']."' ");
							while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $r['nim']; ?></td>
								<td><?php echo $r['nama']; ?></td>
								<td><?php echo $r['tgl_pengaduan']; ?></td>
								<td><?php echo $r['status']; ?></td>
								<td>
									<a class="btn btn-primary" href="#more?id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Detail</a> 

		<!-- ditanggapi -->
			<div id="more?id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="modal">
			<div class="modal-content">
				<h4 class="valign center">Detail</h4>
				<div class="col s12">
					<p>NIM : <?php echo $r['nim']; ?></p>
					<p>Dari : <?php echo $r['nama']; ?></p>
					<p>Petugas : <?php echo $r['nama_petugas']; ?></p>
					<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
					<p>Tanggal Ditanggapi : <?php echo $r['tgl_respon']; ?></p>
					<?php 
						if($r['foto']=="kosong"){ ?>
							<img src="../img/noImage.png" width="100">
					<?php	}else{ ?>
						<img width="100" src="../img/<?php echo $r['foto']; ?>">
					<?php }
					?>
					<br><b>Pesan</b>
					<p><?php echo $r['isi_pengaduan']; ?></p>
					<br><b>Respon</b>
					<p><?php echo $r['isi_respon']; ?></p>
				</div>

			</div>
			<div class="modal-footer col s12">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
			</div>
        </div>
		<!-- ditanggapi -->

							</tr>
						<?php	}
						?>
					</table>
				</div>
			</div>
        </div>
    </div>

    </body>
</html>