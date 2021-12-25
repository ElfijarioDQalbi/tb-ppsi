<?php 
    session_start();
    include '../conn/koneksi.php';
    if(!isset($_SESSION['email'])){
        header('location:../index.php');
    }
    elseif($_SESSION['data']['level'] != "petugas"){
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
                <h3>Dashboard</h3>
         

            <div class="page-heading">
            <a href="#name" class="col s3"> Welcome, <span class="white-text name"><?php echo ucwords($_SESSION['data']['nama_petugas']); ?></span></a>
            </div>
               </div>

 <div class="page-content">
                <section class="row">
                    <div class="col-9 col-lg-9">
                        <div class="row">


                            <div class="col-5">
                                <div class="card">
                                    <div class="card-header" style="center">
                                        <h4>Laporan Masuk</h4>
                                         <?php 
                                            $query = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='proses'");
                                            $jlmmember = mysqli_num_rows($query);
                                            if($jlmmember<1){
                                                $jlmmember=0;
                                            }
                                         ?>
                                        <span class="card-title"><b class="right"><?php echo $jlmmember; ?></b></span>
                                        <p></p>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Laporan Selesai</h4>
                                         <?php 
                                            $query = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='selesai'");
                                            $jlmmember = mysqli_num_rows($query);
                                            if($jlmmember<1){
                                                $jlmmember=0;
                                            }
                                         ?>
                                         <span class="card-title"><b class="right"><?php echo $jlmmember; ?></b></span>
                                        <p></p>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div> 

             

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
