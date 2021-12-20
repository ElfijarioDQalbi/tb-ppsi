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

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active" style="background-color: #A3B4F1;">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <a href="index.html"></a>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
               
                    <li class="sidebar-item">
                        <a href="formpengaduan.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Form Pengaduan</span>
                        </a>
                    </li>
                
              
                    <li class="sidebar-item">
                        <a href="riwayatpengaduan.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Riwayat Pengaduan</span>
                        </a>
                    </li>
                
                <li class="sidebar-item">
                    <a href="logout.php" class='sidebar-link'>
                        <i class="bi bi-door-closed"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>