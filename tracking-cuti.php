<!DOCTYPE html>
<html>

<?PHP 
	include 'include/library-header.php';
    include 'include/func-rupiah.php';
    include 'include/func-indotgl.php';    

    if (isset($_GET['idpegawai'])) {
         $idpegawai   = $_GET['idpegawai'];
    }

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
                <h2>Cuti Karyawan</h2>
            </div>

            <div class="card pad20">
             <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Ijin Cuti</th>
                                <th>Alasan Cuti</th>
                                <th>Sisa Cuti</th>
                                <th>Awal Cuti</th>
                                <th>Akhir Cuti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            $no = 1; 
                            $buku_harian = mysqli_query($db, "SELECT * FROM history_cuti where idpegawai = '$idpegawai' order by idcuti desc");
                            while ($row = mysqli_fetch_array($buku_harian)){
                                $idpegawai = $row['idpegawai']; 
                                $nama_pegawai = $row['nama_pegawai'];
                                $ijin_cuti = $row['jumlah_cuti'];
                                $alasan_cuti = $row['alasan_cuti'];
                                $sisa_cuti = $row['sisa_cuti'];
                                $awal_cuti = $row['awal_cuti'];
                                $akhir_cuti= $row['akhir_cuti'];

                                $awal_cuti = strtotime($awal_cuti);
                                $awal_cuti = tgl_indo(date('Y-m-d', $awal_cuti));
                                $akhir_cuti = strtotime($akhir_cuti);
                                $akhir_cuti = tgl_indo(date('Y-m-d', $akhir_cuti));
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $nama_pegawai; ?></td>
                                <td><?= $ijin_cuti; ?></td>
                                <td><?= $alasan_cuti; ?></td>
                                <td><?= $sisa_cuti; ?></td>
                                <td><?= $awal_cuti; ?></td>
                                <td><?= $akhir_cuti; ?></td>
                            </tr>
                            <?PHP $no++; } ?>
                        </tbody>
                    </table>
             </div>
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
    $('#modalHarianBank').on('show.bs.modal', function (e) {
      var rowharian = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
          type : 'post',
          url : 'update-form.php',
          data :  'rowharian='+ rowharian,
          success : function(data){
          $('.fetched-data').html(data);//menampilkan data ke dalam modal
          }
      });
    });


   
</script>