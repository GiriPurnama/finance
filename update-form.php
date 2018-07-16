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


<script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
            };
        // else return false
        return false;
    }
</script>

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