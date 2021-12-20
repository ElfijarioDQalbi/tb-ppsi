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

            <form method="POST" enctype="multipart/form-data">
                <h1>Tulis Laporan</h1>
                <textarea cols="60" rows="15" class="materialize-textarea" name="laporan" placeholder="Masukkan laporan anda disini" required></textarea><br><br>
                <h3>Bukti Penunjang</h3>
                <p>Masukkan foto atau gambar sebagai penunjang laporan disini</p>
                <input type="file" name="foto" ><br><br>
                <input type="submit" name="kirim" value="Kirim" class="btn btn-secondary mb-1">
            </form>
        </div>
    </div>

    </body>

<?php 
    if(isset($_POST['kirim'])){
        $nim = $_SESSION['data']['nim'];
        $tgl = date('Y-m-d');


        $foto = $_FILES['foto']['name'];
        $source = $_FILES['foto']['tmp_name'];
        $folder = './../img/';
        $listeks = array('jpg','png','jpeg');
        $pecah = explode('.', $foto);
        $eks = $pecah['1'];
        $size = $_FILES['foto']['size'];
        $nama = date('dmYis').$foto;

       if($foto !=""){
            if(in_array($eks, $listeks)){
                if($size<=10000000){
                   move_uploaded_file($source, $folder.$nama);
                   $query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nim','".$_POST['laporan']."','$nama','proses')");

                    if($query){
                        echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
                        echo "<script>location='riwayatpengaduan.php';</script>";
                    }

                }
                else{
                    echo "<script>alert('Akuran Gambar Tidak Lebih Dari 100KB')</script>";
                }
            }
            else{
                echo "<script>alert('Format File Tidak Di Dukung')</script>";
            }
       }
       else{
           $query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nim','".$_POST['laporan']."','noImage.png','proses')");
           if($query){
                echo "<script>alert('Pengaduan Akan Segera Ditanggapi')</script>";
                echo "<script>location='riwayatpengaduan.php';</script>";
            }
       }

    }

?>
  </html>




