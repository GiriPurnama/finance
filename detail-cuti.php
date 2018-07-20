<!DOCTYPE html>
<html>

<?PHP 
	include 'include/library-header.php';
    include 'include/func-rupiah.php';
    include 'include/func-indotgl.php';


      if (isset($_GET['idpegawai'])) {
        $idpegawai   = $_GET['idpegawai'];
        $query = mysqli_query($db, "SELECT * FROM tbl_pegawai WHERE idpegawai='$idpegawai'") or die('Query Error : '.mysqli_error($db));
        while ($row  = mysqli_fetch_assoc($query)) {
            $nama_pegawai = $row['nama_pegawai'];
            $jenis_kelamin = $row['jenis_kelamin'];
            $agama = $row['agama'];
            $email = $row['email'];
            $tgl_lahir = $row['tgl_lahir'];
            $tgl_join = $row['tgl_join'];
            $alamat = $row['alamat'];
            $nama_perusahaan = $row['nama_perusahaan'];
            $jumlah_cuti = $row['jumlah_cuti'];
            $alasan_cuti = $row['alasan_cuti'];
            $tempat_lahir = $row['tempat_lahir'];
            $no_telepon = $row['no_telepon'];
?>



<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Tunggu sebentar...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Pencarian...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">PT Harda Esa Raksa</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <?php 
        include "include/library-sidebar.php";
    ?>

    <section class="content">
        <div class="container-fluid">
            
            <div class="block-header">
                <h2>Detail Karyawan</h2>
            </div>

            <div class="card pad20">
                <div class="row">
                    
                    <div class="col-md-12">
                        <h3>Data Diri</h3>    
                    </div>
                    
                    <div class="col-md-6">
                        <span class="title">Nama Pegawai</span>
                        <label class="sub-title"><?= $nama_pegawai; ?></label>
                    </div>

                    <div class="col-md-6">
                        <span class="title">Tempat Lahir</span>
                        <label class="sub-title"><?= $tempat_lahir; ?></label>
                    </div>

                    <div class="col-md-6">
                        <span class="title">Tanggal Lahir</span>
                        <label class="sub-title"><?= $tgl_lahir; ?></label>
                    </div>

                    <div class="col-md-6">
                        <span class="title">Jenis Kelamin</span>
                        <label class="sub-title"><?= $jenis_kelamin; ?></label>
                    </div>
                    
                    <div class="col-md-6">
                        <span class="title">Agama</span>
                        <label class="sub-title"><?= $agama; ?></label>
                    </div>

                    <div class="col-md-6">
                        <span class="title">Email</span>
                        <label class="sub-title"><?= $email; ?></label>
                    </div>

                    <div class="col-md-6">
                        <span class="title">No Telepon</span>
                        <label class="sub-title"><?= $no_telepon; ?></label>
                    </div>


                    <div class="col-md-12">
                        <h3>Data Perusahaan </h3>
                    </div>

                    <div class="col-md-6">
                        <span class="title">Nama Perusahaan</span>
                        <label class="sub-title"><?= $nama_perusahaan; ?></label>
                    </div>

                    <div class="col-md-6">
                        <span class="title">Tanggal Join</span>
                        <label class="sub-title"><?= $tgl_join; ?></label>
                    </div>

                    <div class="col-md-6">
                        <span class="title">Jumlah Cuti</span>
                        <label class="sub-title"><?= $jumlah_cuti; ?></label>
                    </div>

                </div>

                 <div class="col-md-12" style="display:contents">
                    <h3 class="mgbt20 mgt20">Pengajuan Cuti</h3>
                 </div>

                <div class="jumlahcuti"></div>
                <form id="form_validation_pegawai" class="mgt20" action="server.php" method="POST">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="hidden" name="idpegawai" value="<?= $idpegawai; ?>">
                            <input type="hidden" name="jumlah_cuti" value="<?= $jumlah_cuti; ?>">

                            <input type="text" class="form-control date" id="awalCuti"  name="tgl_awal_cuti" required>
                            <label class="form-label">Awal Cuti <b>(YYYY-MM-DD)</b></label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control date" id="akhirCuti"  name="tgl_akhir_cuti" required>
                            <label class="form-label">Akhir Cuti <b>(YYYY-MM-DD)</b></label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="alasan_cuti" class="form-control no-resize" required><?= $alasan_cuti; ?></textarea>
                            <label class="form-label">Alasan Cuti</label>
                        </div>
                    </div>

                    <button class="btn btn-primary waves-effect" name="update_cuti" type="submit">SIMPAN</button>
                                  
                </form>
            </div>

        </div>
    </section>

    <?PHP
        include "modal.php";
    	include "include/library-footer.php";
     ?>

</body>

</html>

<script type="text/javascript">

    $("#akhirCuti").change(function() {
        var datacuti = $('#form_validation_pegawai').serialize();
        $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'datacuti='+ datacuti,
          success : function(data){
           $('.jumlahcuti').html(data);
          }
        });
        
    })

</script>

<?php 
        }
      }    
?>
