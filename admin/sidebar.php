<?php

if (isset($_SESSION['level'])=="admin" && !isset($_SESSION['email'])) {
    header('location: ../');
    exit;
}

?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active" style="background-color: #A3B4F1;">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
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
                        <a href="registrasi.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Registrasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="datauser.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Kelola User</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Kelola Pengaduan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="respon.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Kelola Respon</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="laporan.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Laporan</span>
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