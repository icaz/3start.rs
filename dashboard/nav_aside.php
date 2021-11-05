<?php
$business_no = get_business_no($provider_id);
$event_no = get_event_no($provider_id);

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block mr-1 mt-1">
            <a href="/../index.php" class="btn btn-sm btn-outline-light">Nazad na <strong> <?php echo $sajt; ?></strong></a>
    </ul>
    <ul class="navbar-nav ml-auto">
        <a href="logout.php" class="btn btn-sm btn-outline-light">log<strong>OUT</strong></a>
    </ul>
</nav><!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar  sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="/../index.php" class="brand-link text-center">
        <strong>u.nisu.rs</strong>
    </a>
    <!-- Sidebar -->
    <div class="sidebar sidebar-dark-primary">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="edit_provider_profile.php" class="d-block active"><?php echo $name; ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="business_profile.php" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>Biznis profil <span class="right badge badge-danger"><?php echo $business_no; ?></span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="event_profile.php" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Event <span class="right badge badge-danger"><?php echo $event_no; ?></span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="view_cal.php" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Kalendar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="view_services.php" class="nav-link">
                        <i class="nav-icon fab fa-ello"></i>
                        <p>Cenovnici</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="category.php" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Kategorije</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-danger">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>E-mail lista</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="invite.php" class="nav-link text-danger">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>Preporuči</p>
                    </a>
                </li>
            </ul>

            <?php
            include 'kalendar_xs2.php';
            ?>

        </nav><!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->
</aside>