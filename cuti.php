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
           <!--  <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                </ul>
            </div> -->
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
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Nama Perusahaan</th>
                                <th>Posisi</th>
                                <th>Kontrak Kerja</th>
                                <th>Status Cuti</t>
                                <th>Jumlah Cuti</th>
                                <th>Alasan Cuti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            $no = 1; 
                            $buku_harian = mysqli_query($db, "SELECT * FROM recruitment WHERE feedback = 'Join' order by id desc");
                            while ($row = mysqli_fetch_array($buku_harian)){
                                $id = $row['id']; 
                                $nama_lengkap = $row['nama_lengkap'];
                                
                                $tanggal_lahir = $row['tanggal_lahir'];
                                $tanggal_lahir = strtotime($tanggal_lahir);
                                $tanggal_lahir =  tgl_indo(date('Y-m-d', $tanggal_lahir));

                                $jenis_kelamin = $row['jenis_kelamin'];
                                $agama = $row['agama'];
                                $perusahaan = $row['perusahaan'];
                                $kontrak_kerja = $row['kontrak_kerja'];
                                $posisi = $row['posisi'];
                                $posisi_rekomendasi = $row['posisi_rekomendasi'];
                                $rekomendasi = $posisi_rekomendasi ?: $posisi;
                                $status_cuti = $row['status_cuti'];
                                $jumlah_cuti = $row['jumlah_cuti'];
                                $alasan_cuti = $row['alasan_cuti'];
                       
                            ?>
                            <tr>
                                <td><?= $no; ?></td>    
                                <td><?= $nama_lengkap; ?></td>
                                <td><?= $tanggal_lahir; ?></td>
                                <td><?= $jenis_kelamin; ?></td>
                                <td><?= $agama; ?></td>
                                <td><?= $perusahaan; ?></td>
                                <td><?= $rekomendasi; ?></td>
                                <td><?= $kontrak_kerja; ?></td>
                                <td><?= $status_cuti; ?></td>
                                <td><?= $jumlah_cuti; ?></td>
                                <td><?= $alasan_cuti; ?></td>
                                <td>
                                    <?php echo "<a href='detail-cuti.php?id=$row[id]' class='btn bg-cyan btn-circle waves-effect waves-circle waves-float'><i class='material-icons'>settings</i></a>" ?>
                                    <!-- <a href='server.php?idpegawai=<?= $id; ?>' class="btn bg-red btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Apakah yakin data ini akan dihapus?')"><i class='material-icons'>delete_forever</i></a> -->
                                </td>
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