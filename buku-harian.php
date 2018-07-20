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
                <h2>Buku Harian Bank</h2>
            </div>

            <div class="card pad20">
                <h3>Data Bank</h3>
                <div class="table-responsive">
                    <button type="button" class="btn btn-primary waves-effect m-r-20 mgbt20" data-toggle="modal" data-target="#largeModal">Tambah Data Bank</button>
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Nama Bank</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP 
                            $buku_harian = mysqli_query($db, "SELECT * FROM tbl_buku order by idbuku desc");
                            while ($row = mysqli_fetch_array($buku_harian)){ 
                                $nama_bank = $row['nama_bank'];
                                $pemasukan = $row['pemasukan'];
                                $pengeluaran = $row['pengeluaran'];
                                $tanggal = $row['tgl_buku'];
                                $total = $row['total'];
                                $idbuku = $row['idbuku'];
                                $out_null = $pengeluaran ?: "-";
                                $in_null = $pemasukan ?: "-";
                                $timestamp = strtotime($tanggal);
                                $date_post = tgl_indo(date('Y-m-d', $timestamp));   
                            ?>
                            <tr>
                                <td><?= $nama_bank; ?></td>
                                <td><?= rupiah($pemasukan); ?></td>
                                <td><?= rupiah($pengeluaran); ?></td>
                                <td><?= $date_post; ?></td>
                                <td><?= rupiah($total); ?></td>
                                <td>
                                    <a href="#modalHarianBank" id="idharian" data-toggle='modal' data-id="<?= $idbuku; ?>"><i class="fa fa-cogs"></i></a>
                                    <a href='server.php?idbuku=<?= $idbuku; ?>' onclick="return confirm('Apakah yakin album ini akan dihapus?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?PHP } ?>
                        </tbody>
                    </table>
                </div>
            </div>

              <div class="card pad20">
              <h3>History</h3>
                <div class="table-responsive">
                    <table id="history" class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Nama Bank</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Info</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP 
                            $buku_harian = mysqli_query($db, "SELECT * FROM tbl_history order by idhistory desc");
                            while ($row = mysqli_fetch_array($buku_harian)){ 
                                $nama_bank = $row['nama_bank'];
                                $pemasukan = $row['pemasukan'];
                                $pengeluaran = $row['pengeluaran'];
                                $info_buku = $row['info_buku'];

                                $tanggal = $row['tgl_buku'];
                                $timestamp = strtotime($tanggal);
                                $date_post = tgl_indo(date('Y-m-d', $timestamp));   

                                $total = $row['total'];
                                $idbuku = $row['idbuku'];
                                $out_null = $pengeluaran ? rupiah($pengeluaran) : "0";
                                $in_null = $pemasukan ? rupiah($pemasukan) : "0";

                            ?>

                            <tr>
                                <td><?= $nama_bank; ?></td>
                                <td><?= rupiah($pemasukan); ?></td>
                                <td><?= rupiah($pengeluaran); ?></td>
                                <td><?= $info_buku; ?></td>
                                <td><?= $date_post; ?></td>
                                <td><?= rupiah($total); ?></td>
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