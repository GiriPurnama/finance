<?php
 include "config/koneksi.php"; 
//===================== Page Home ================================================
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
  	if (isset($_GET['idhome'])) {
	  	$idhome = $_GET['idhome'];
	  	$load_data = mysqli_query($db, "SELECT * FROM menu_home WHERE idhome='$idhome'");
	  	while ($row = mysqli_fetch_assoc($load_data)) {
	  		$test = $row['title_img'];
	  		if (is_file($row['image_home'])) {
	  			unlink($row['image_home']);
			  	$query_delete = mysqli_query($db, "DELETE FROM menu_home WHERE idhome='$idhome'");
			  	if ($query_delete) {
			  		header('location: page-home.php');
			  	} else{
			  		 echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Dihapus'); window.location.href='page-home.php'</script>");
			  	}
	  		} else { 
	  			 echo ("<script LANGUAGE='JavaScript'>window.alert('File tidak ditemukan'); window.location.href='page-home.php'</script>");
	  			 $query_delete = mysqli_query($db, "DELETE FROM menu_home WHERE idhome='$idhome'");
	  		}
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
//===================== Page Home ================================================

?>