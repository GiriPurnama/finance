<!DOCTYPE html>
<html>

<?PHP 
	include 'include/library-header.php';
    include 'include/func-rupiah.php';
    include 'include/func-indotgl.php';    
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
                <button type="button" class="btn btn-primary waves-effect m-r-20 mgbt20" data-toggle="modal" data-target="#pegawaiModal">Tambah Data Pegawai</button>
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Jumlah Cuti</th>
                                <th>Alasan Cuti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP 
                            $buku_harian = mysqli_query($db, "SELECT * FROM tbl_pegawai order by idpegawai desc");
                            while ($row = mysqli_fetch_array($buku_harian)){
                                $idpegawai = $row['idpegawai']; 
                                $nama_pegawai = $row['nama_pegawai'];
                                $jenis_kelamin = $row['jenis_kelamin'];
                                $agama = $row['agama'];
                                $jumlah_cuti = $row['jumlah_cuti'];
                                $alasan_cuti = $row['alasan_cuti'];
                       
                            ?>
                            <tr>
                                <td><?= $nama_pegawai; ?></td>
                                <td><?= $jenis_kelamin; ?></td>
                                <td><?= $agama; ?></td>
                                <td><?= $jumlah_cuti; ?></td>
                                <td><?= $alasan_cuti; ?></td>
                                <td>
                                    <?php echo "<a href='detail-cuti.php?idpegawai=$row[idpegawai]'><span class='action-icon'><i class='fa fa-cogs'></i></span></a>" ?>
                                    <a href='server.php?idpegawai=<?= $idpegawai; ?>' onclick="return confirm('Apakah yakin data ini akan dihapus?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?PHP } ?>
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