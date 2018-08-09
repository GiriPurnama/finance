<?php
  include 'config/koneksi.php';
  include 'include/func-rupiah.php';
  include 'include/func-indotgl.php'; 

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=finance-exportxls-".date("d-m-Y").".xls");
 
// memanggil query dari database
// $refrensi = $_GET['refrensi'];                     
 
  $nameSql = mysqli_query($db, "SELECT tgl_buku, pemasukan, pengeluaran, info_buku, nama_bank FROM tbl_history WHERE tgl_buku between date_sub(now(),INTERVAL 1 WEEK) and now() Group BY nama_bank, info_buku");
  $CountSql = mysqli_query($db, "SELECT sum(pemasukan) as total_masuk, sum(pengeluaran) as total_pengeluaran, total FROM tbl_history WHERE tgl_buku between date_sub(now(),INTERVAL 1 WEEK) and now()");
  $dateSql = mysqli_query($db, "SELECT  CONCAT(DATE_FORMAT(DATE_ADD(tgl_buku, INTERVAL(1-DAYOFWEEK(tgl_buku)) DAY),'%e-%m-%Y'), ' s/d ', DATE_FORMAT(DATE_ADD(tgl_buku, INTERVAL(7-DAYOFWEEK(tgl_buku)) DAY),'%e-%m-%Y')) AS DateRange FROM tbl_history WHERE tgl_buku between date_sub(now(),INTERVAL 1 WEEK) and now()");
  
  while($rowdate = mysqli_fetch_assoc($dateSql)){    
    $DateRange = $rowdate['DateRange'];
  }

?>     
         
    <table>
        <tr>
          <td><h3>Laporan Mingguan Harian Bank</h3></td>
        </tr>
        <tr>
          <td width="0px"><b>Periode Tanggal :</b> <?= $DateRange; ?></td>
        </tr>
    </table>    
        <table border="1">  
          <thead bgcolor="eeeeee" align="center">
            <tr bgcolor="eeeeee" >
             <th>No</th>
             <th>Tanggal</th>
             <th>Nama Bank</th>
             <th>Info Buku</th>
             <th>Pemasukan</th>
             <th>Pengeluaran</th>
            </tr>
          </thead>
          <tbody>            
   
   <?php
        
      $nomor=1;
      while($rowshow = mysqli_fetch_assoc($nameSql)){                     
        
        $nama_bank = $rowshow['nama_bank'];
        $info_buku = $rowshow['info_buku'];
        $pemasukan = $rowshow['pemasukan'];
        $pengeluaran = $rowshow['pengeluaran'];
        
        $tgl_buku = $rowshow['tgl_buku'];
        $tgl_buku = strtotime($tgl_buku);
        $tgl_buku = tgl_indo(date('Y-m-d', $tgl_buku));  


        echo '<tr>';
          echo '<td>'.$nomor.'</td>';
          echo '<td>'.$tgl_buku.'</td>';
          echo '<td>'.$nama_bank.'</td>';
          echo '<td>'.$info_buku.'</td>';
          echo '<td>'.rupiah($pemasukan).'</td>';
          echo '<td>'.rupiah($pengeluaran).'</td>';
        echo '</tr>';

        $nomor++;
      }
      while($row = mysqli_fetch_assoc($CountSql)){  
        $total_masuk = $row['total_masuk'];
        $total_pengeluaran = $row['total_pengeluaran'];
        $sisa = $row['total'];

         echo '<tr>';
            echo '<td><b>Total Pemasukan Minggu ini</b></td>';
            echo '<td colspan="5"><b>'.rupiah($total_masuk).'</b></td>';
          echo '</tr>';

          echo '<tr>';
            echo '<td><b>Total Pengeluaran Minggu ini</b></td>';
            echo '<td colspan="5"><b>'.rupiah($total_pengeluaran).'</b></td>';
          echo '</tr>';

          echo '<tr>';
            echo '<td><b>Saldo Minggu ini</b></td>';
            echo '<td colspan="5"><b>'.rupiah($total_masuk - $total_pengeluaran).'</b></td>';
          echo '</tr>';
      }

   ?>
  </tbody>
  </table>
