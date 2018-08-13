
<?php 
    $query_finance = mysqli_query($db, "SELECT * FROM login WHERE id_admin = '$id_admin'");
    while ($row = mysqli_fetch_array($query_finance)){
        $nama_lengkap = $row['nama_lengkap'];
        $img_divisi = $row['img_divisi'];
        $divisi = $row['divisi'];
        $email = $row['email_admin'];
    }
?>
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= $img_divisi; ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $nama_lengkap; ?></div>
                <div class="email"><?= $email; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="logout.php "><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="dashboard.php">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="buku-harian.php">
                        <i class="material-icons">inbox</i>
                        <span>Buku Harian Bank</span>
                    </a>
                </li>
                <li>
                    <a href="cuti.php">
                        <i class="material-icons">calendar_today</i>
                        <span>Cuti</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 <a href="javascript:void(0);">PT Harda Esa Raksa</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <!-- #END# Right Sidebar -->
</section>