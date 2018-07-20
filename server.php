<?php
 include "config/koneksi.php"; 
//===================== Page Harian Buku ================================================
  	// Insert
  	if (isset($_POST['savedata'])) {
		  $pemasukan = mysqli_real_escape_string($db, trim($_POST['pemasukan']));
		  $pengeluaran = mysqli_real_escape_string($db, trim($_POST['pengeluaran']));
		  $nama_bank = $_POST['nama_bank'];
		  
		  $query = mysqli_query($db, "INSERT INTO tbl_buku(pemasukan, pengeluaran, nama_bank, tgl_buku, total) values ('$pemasukan','$pengeluaran','$nama_bank',NOW(),'$pemasukan')");
		  if ($query) {
		  		header('location: buku-harian.php');
		  } else {
		  		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Diinsert'); window.location.href='buku-harian.php'</script>");
		  }
  	}

  	// Delete
  	if (isset($_GET['idbuku'])) {
	  	$idbuku = $_GET['idbuku'];
	  	$query_delete_history = mysqli_query($db, "DELETE FROM tbl_history WHERE idbuku='$idbuku'");
	  	$query_delete = mysqli_query($db, "DELETE FROM tbl_buku WHERE idbuku='$idbuku'");
	  	if ($query_delete && $query_delete_history) {
	  		header('location: buku-harian.php');
	  	} else{
	  		 echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Dihapus'); window.location.href='buku-harian.php'</script>");
	  	}
	 }


  	// Update
  	if (isset($_POST['update_bank_plus'])) {
	  if (isset($_POST['idbuku'])) {

	    $idbuku = $_POST['idbuku'];
       
	    $pemasukan = $_POST['pemasukan'];
	    $pengeluaran = $_POST['pengeluaran'];
	    $info_buku = $_POST['info_buku'];
	    $total = $_POST['total'];
	    $nama_bank = $_POST['nama_bank'];

	   	$strip_pemasukan = $pemasukan ?: '0';
	   	$strip_pengeluaran = $pengeluaran ?: '0';
		
	    // perintah query untuk mengubah data pada tabel is_siswa
	    $query = mysqli_query($db, "UPDATE tbl_buku SET pemasukan = '$strip_pemasukan',
	    						pengeluaran = '$strip_pengeluaran',
	                            info_buku  = '$info_buku',
	                            total = '$total'
	                            WHERE idbuku   = '$idbuku'");

	    $history_query = mysqli_query($db, "INSERT INTO tbl_history(idbuku, pemasukan, pengeluaran, info_buku, nama_bank, tgl_buku, total) values ('$idbuku','$strip_pemasukan','$strip_pengeluaran','$info_buku','$nama_bank',NOW(),'$total')");

	    // cek query
	    if ($query && $history_query) {
	      header('location: buku-harian.php');
	    } else {
	      echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Diupdate'); window.location.href='buku-harian.php'</script>");
	    } 
		
	  }
	} 
//===================== Page Harian Buku ================================================


//===================== Page Cuti ================================================

	// Insert
  	if (isset($_POST['save_pegawai'])) {
		  $nama_pegawai = mysqli_real_escape_string($db, trim($_POST['nama_pegawai']));
		  $agama = mysqli_real_escape_string($db, trim($_POST['agama']));
		  $gender = $_POST['jenis_kelamin'];
		  $tgl_lahir = mysqli_real_escape_string($db, trim($_POST['tgl_lahir']));
		  $alamat = mysqli_real_escape_string($db, trim($_POST['alamat']));
		  $email = mysqli_real_escape_string($db, trim($_POST['email']));
		  $no_telepon = mysqli_real_escape_string($db, trim($_POST['no_telepon']));
		  $nama_perusahaan = $_POST['nama_perusahaan'];
		  $tgl_join = mysqli_real_escape_string($db, trim($_POST['tgl_join']));
		  $jumlah_cuti = mysqli_real_escape_string($db, trim($_POST['jumlah_cuti']));
		  $alasan_cuti = mysqli_real_escape_string($db, trim($_POST['alasan_cuti']));
		  $tempat_lahir = mysqli_real_escape_string($db, trim($_POST['tempat_lahir']));

		  
		  $query = mysqli_query($db, "INSERT INTO tbl_pegawai(nama_pegawai, agama, jenis_kelamin, tempat_lahir, tgl_lahir, alamat, email, no_telepon, nama_perusahaan, tgl_join, jumlah_cuti, alasan_cuti) values ('$nama_pegawai','$agama','$gender','$tempat_lahir','$tgl_lahir','$alamat','$email','$no_telepon','$nama_perusahaan','$tgl_join','$jumlah_cuti','$alasan_cuti')");
		  if ($query) {
		  		header('location: cuti.php');
		  } else {
		  		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Diinsert'); window.location.href='cuti.php'</script>");
		  }
  	}


  	// Delete
  	if (isset($_GET['idpegawai'])) {
	  	$idpegawai = $_GET['idpegawai'];
	  	$query_delete = mysqli_query($db, "DELETE FROM tbl_pegawai WHERE idpegawai='$idpegawai'");
	  	if ($query_delete) {
	  		header('location: cuti.php');
	  	} else{
	  		 echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Dihapus'); window.location.href='cuti.php'</script>");
	  	}
	 }

//===================== Page Cuti ================================================


//===================== Page Add Cuti ================================================

if (isset($_POST['update_cuti'])) {
	  if (isset($_POST['idpegawai'])) {
		
	    $idpegawai = $_POST['idpegawai'];
	    $nama_pegawai = $_POST['nama_pegawai'];
	   	$alasan_cuti = $_POST['alasan_cuti'];
	   	$jumlah_cuti = $_POST['jumlah_cuti'];

	    $awal_cuti  = $_POST['tgl_awal_cuti'];
	    $akhir_cuti = $_POST['tgl_akhir_cuti'];

	    $awal_cuti_post  = $_POST['tgl_awal_cuti'];
	    $akhir_cuti_post = $_POST['tgl_akhir_cuti'];

	
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

		$query_history_cuti = mysqli_query($db, "INSERT INTO history_cuti(idpegawai, nama_pegawai, jumlah_cuti, sisa_cuti, alasan_cuti, awal_cuti, akhir_cuti) values ('$idpegawai','$nama_pegawai','$total_cuti','$hitung_cuti','$alasan_cuti','$awal_cuti_post','$akhir_cuti_post')");

		$query = mysqli_query($db, "UPDATE tbl_pegawai SET jumlah_cuti = '$hitung_cuti',
	    						alasan_cuti = '$alasan_cuti'
	                            WHERE idpegawai   = '$idpegawai'"); 


		if ($query && $query_history_cuti) {
	      // jika berhasil tampilkan pesan berhasil update data
	      header('location: detail-cuti.php?idpegawai='.$idpegawai.'');

	    } else {
	      echo ("<script LANGUAGE='JavaScript'>window.alert('Data gagal diupdate'); window.location.href='detail-cuti.php?idpegawai=".$idpegawai."'</script>");
	    } 


	}
}
//===================== Page Add Cuti ================================================


?>