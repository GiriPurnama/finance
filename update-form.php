<?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
	include "config/koneksi.php"; 
	
	if($_POST['rowharian']) {
      $rowharian = $_POST['rowharian'];
    	$load_data = mysqli_query($db, "SELECT * FROM tbl_buku WHERE idbuku='$rowharian'");
    	while ($row = mysqli_fetch_assoc($load_data)) { 
    		$idbuku = $row['idbuku'];
        $pemasukan = $row['pemasukan'];
        $pengeluaran = $row['pengeluaran'];
        $info_buku = $row['info_buku'];
        $tgl_buku = $row['tgl_buku'];
        $nama_bank = $row['nama_bank'];
        $total = $row['total'];
    	?>

    	<form role="form" action="server.php" method="POST" enctype="multipart/form-data">
		      <div class="box-body">
            <div class="form-group form-float" id="payin">
              <input type="hidden" name="idbuku" value="<?= $idbuku; ?>">
              <div class="form-line">
                <label for="title">Pemasukan</label>
                <input type="text" class="form-control" autocomplete="off" name="pemasukan" id="rp-pemasukan" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="0">
              </div>
            </div>
            <div class="form-group form-float" id="payout">
             <div class="form-line">
                <label for="deskripsi">Pengeluaran</label>
                <input type="text" class="form-control" autocomplete="off" name="pengeluaran" id="rp-pengeluaran" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="0">
              </div>
            </div>
            <div class="form-group form-float">
              <div class="form-line">
                <label>Info</label>
                <textarea class="form-control" name="info_buku" required></textarea>
              </div>
            </div>
            <div class="form-group form-float">
              <div class="form-line">
                <label for="deskripsi">Bank</label>
                <input type="text" class="form-control" name="nama_bank" value="<?= $nama_bank; ?>" readonly>
              </div>
            </div>
            <div class="form-group form-float">
              <div class="">
                <label for="deskripsi">Total</label>
                <input type="text" class="form-control hide" id="total" name="total" value="<?= $total; ?>" readonly>
                <label>Rp</label> <label id="totalLabel"></label>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary waves-effect" name="update_bank_plus">Simpan</button>
            <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          </div>
    	</form>
<?php }
	}
?>

<?php 

  if($_POST['datacuti']) {
    $datacuti = $_POST['datacuti'];
    $load_data = mysqli_query($db, "SELECT * FROM tbl_pegawai WHERE idpegawai='$datacuti'");
      while ($row = mysqli_fetch_assoc($load_data)) { 
        $nama_pegawai = $row['nama_pegawai'];
      }

    $jumlah_cuti= $_POST['jumlah_cuti'];
    $awal_cuti  = $_POST['tgl_awal_cuti'];
    $akhir_cuti = $_POST['tgl_akhir_cuti'];

    $awal_cuti = strtotime($awal_cuti);
    $akhir_cuti = strtotime($akhir_cuti);
     
    $haricuti = array();
    $sabtuminggu = array();
     
    for ($i=$awal_cuti; $i <= $akhir_cuti; $i += (60 * 60 * 24)) {
        if (date('w', $i) !== '0' && date('w', $i) !== '6') {
            $haricuti[] = $i;
        } else {
            $sabtuminggu[] = $i;
        }
     
    }

    $total_cuti = count($haricuti);
    $jumlah_sabtuminggu = count($sabtuminggu);
    $hitung_cuti = $jumlah_cuti - $total_cuti;
?>
    
    <div class="row clearfix">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">Total Cuti</div>
                    <div class="number count-to"><?= $total_cuti; ?></div>
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">domain</i>
                </div>
                <div class="content">
                    <div class="text">Sisa Cuti</div>
                    <div class="number count-to"><?= $hitung_cuti; ?></div>
                </div>
            </div>
        </div>
<?php    
  }
?>


<script type="text/javascript">

/* Fungsi */
      function formatRupiah(bilangan, prefix)
      {
          var number_string = bilangan.toString(),
              split   = number_string.split(','),
              sisa    = split[0].length % 3,
              rupiah  = split[0].substr(0, sisa),
              ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
              
          if (ribuan) {
              separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
          }
          
          rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
          return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
      
      function limitCharacter(event)
      {
          key = event.which || event.keyCode;
          if ( key != 188 // Comma
               && key != 8 // Backspace
               && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
               && (key < 48 || key > 57) // Non digit
               // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
              ) 
          {
              event.preventDefault();
              return false;
          }
      }
    /* Fungsi */

 var total_temp = <?php echo json_encode($total); ?>;

 $("#totalLabel").text(formatRupiah(total_temp));

 $("#rp-pemasukan").change(function() {
    var pemasukan = $("#rp-pemasukan").val(); 
    if (pemasukan == "") {
        $("#total").val(total_temp);
        $("#payout").show();
    } else {
        $("#payout").hide();
        total_jml =  parseInt(pemasukan) + parseInt(total_temp);
        $("#total").val(total_jml);
        var output = (total_jml/1000).toFixed(3);
        $("#totalLabel").text(formatRupiah(total_jml));
    }
});


 $("#rp-pengeluaran").change(function() {
    var pengeluaran = $("#rp-pengeluaran").val(); 
    if (pengeluaran == "") {
        $("#total").val(total_temp);
        $("#payin").show();
    } else {
        $("#payin").hide();
        total_jml = parseInt(total_temp) - parseInt(pengeluaran) ;
        $("#total").val(total_jml);
        var output = (total_jml/1000).toFixed(3);
        $("#totalLabel").text(formatRupiah(total_jml));
    }
});

</script>