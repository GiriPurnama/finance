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
		$nama_lengkap = mysqli_real_escape_string($db, trim(strtoupper($_POST['nama_lengkap'])));
		$warga_negara = mysqli_real_escape_string($db, trim(strtoupper($_POST['warga_negara'])));
		$tempat_lahir = mysqli_real_escape_string($db, trim(strtoupper($_POST['tempat_lahir'])));
		
		$tanggal_lahir = strtoupper($_POST['tanggal_lahir']);
		
		$agama = strtoupper($_POST['agama']);
		$jenis_kelamin = strtoupper($_POST['jenis_kelamin']);
		$no_ktp = strtoupper($_POST['no_ktp']);
		$no_sim = strtoupper($_POST['no_sim']);
		$status_sipil = strtoupper($_POST['status_sipil']);
		$alamat_email = mysqli_real_escape_string($db, trim(strtoupper($_POST['alamat_email'])));
		$alamat_sekarang = mysqli_real_escape_string($db, trim(strtoupper($_POST['alamat_sekarang'])));
		$alamat_ktp = mysqli_real_escape_string($db, trim(strtoupper($_POST['alamat_ktp'])));
		$no_handphone = strtoupper($_POST['no_handphone']);
		$no_wa = strtoupper($_POST['no_wa']);
		$telepon = strtoupper($_POST['telepon']);
		$foto = mysqli_real_escape_string($db, trim($_POST['foto']));
		$ktp = mysqli_real_escape_string($db, trim($_POST['ktp']));
		$ijazah = mysqli_real_escape_string($db, trim($_POST['ijazah']));
		$riwayat_penyakit = mysqli_real_escape_string($db, trim(strtoupper($_POST['riwayat_penyakit'])));
		$feedback = $_POST['feedback'];
		$status_pelamar = strtoupper($_POST['status_pelamar']);
		$posisi_rekomendasi = strtoupper($_POST['posisi_rekomendasi']);
		$perusahaan = $_POST['perusahaan'];
		$tanggal_join = $_POST['tanggal_join'];
		$branch = strtoupper($_POST['branch']);
		$pendidikan_terakhir = strtoupper($_POST['pendidikan_terakhir']);

		$type = $_FILES['foto']['type'];
		$fileinfo=PATHINFO($_FILES["foto"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["foto"]["tmp_name"],"../upload/" . $newFilename);
		$location="../upload/" . $newFilename;

		$type1 = $_FILES['ktp']['type'];
		$fileinfo2=PATHINFO($_FILES["ktp"]["name"]);
		$newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];
		move_uploaded_file($_FILES["ktp"]["tmp_name"],"../upload/" . $newFilename2);
		$location2="../upload/" . $newFilename2;

		$type2 = $_FILES['ijazah']['type'];
		$fileinfo3=PATHINFO($_FILES["ijazah"]["name"]);
		$newFilename3=$fileinfo3['filename'] ."_". time() . "." . $fileinfo3['extension'];
		move_uploaded_file($_FILES["ijazah"]["tmp_name"],"../upload/" . $newFilename3);
		$location3="../upload/" . $newFilename3;

		
		$warga_negara = $warga_negara ?: '-';
      	$no_sim = $no_sim ?: '-';
        $telepon = $telepon ?: '-';
        // $bahasa_asing = ($bahasa_asing == "undefined" ? "-" : $bahasa_asing);
        $riwayat_penyakit = $riwayat_penyakit ?: '-';

		// $jadwal_interview = strtoupper($_POST['jadwal_interview']);

															
		$query = mysqli_query($db, "INSERT INTO recruitment(nama_lengkap,
															posisi,
															posisi_rekomendasi,
															warga_negara,
															tempat_lahir,
															tanggal_lahir,
															agama,
															jenis_kelamin,
															no_ktp,
															no_sim,
															status_sipil,
															alamat_email,
															alamat_sekarang,
															alamat_ktp,
															no_handphone,
															no_wa,
															telepon,
															riwayat_penyakit,
															foto,
															ktp,
															ijazah,
															feedback,
															status_pelamar,
															perusahaan,
															tanggal_join,
															branch,
															pendidikan_terakhir,
															post_date)
															VALUES ('$nama_lengkap',
																	'$posisi_rekomendasi',
																	'$posisi_rekomendasi',
																	'$warga_negara',
																	'$tempat_lahir',
																	'$tanggal_lahir',
																	'$agama',
																	'$jenis_kelamin',
																	'$no_ktp',
																	'$no_sim',
																	'$status_sipil',
																	'$alamat_email',
																	'$alamat_sekarang',
																	'$alamat_ktp',
																	'$no_handphone',
																	'$no_wa',
																	'$telepon',
																	'$riwayat_penyakit',
																	'$location',
																	'$location2',
																	'$location3',
																	'$feedback',
																	'$status_pelamar',
																	'$perusahaan',
																	'$tanggal_join',
																	'$branch',
																	'$pendidikan_terakhir',
																	 NOW())");
															
		if ($query) {
			header('location:cuti.php');
		} else {
			// jika gagal tampilkan pesan kesalahan
			// header('location: index.php?alert=1');
		echo ("<script LANGUAGE='JavaScript'>window.alert('Maaf data gagal diinput'); window.location.href='cuti.php'</script>");
			// header('location: ../inforegistrasi.php?alert=1');
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