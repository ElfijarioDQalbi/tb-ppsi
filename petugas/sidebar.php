<?php 
	include '../conn/koneksi.php';
	if(!isset($_SESSION['email'])){
		header('location:../index.php');
	}
	elseif($_SESSION['data']['level'] != "petugas"){
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
                    <a href="index.php" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
               
                    <li class="sidebar-item">
                        <a href="" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Pengaduan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="respon.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Respon pengaduan</span>
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