<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <form id="form_validation" action="server.php" method="POST">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" autocomplete="off" name="pemasukan" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                            <input type="text" class="form-control hide" name="pengeluaran" onKeyPress="return goodchars(event,'0123456789',this)" value="0">
                                            <label class="form-label">Pemasukan</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <select name="nama_bank" class="form-control show-tick" required>
                                            <option value="">-- Pilih Bank --</option>
                                            <option value="Sinarmas">Sinarmas</option>
                                            <option value="BRI">BRI</option>
                                            <option value="DBS">DBS</option>
                                            <option value="Permata">PERMATA</option>
                                            <option value="BCA">BCA</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary waves-effect" name="savedata" type="submit">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pegawaiModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Data Pegawai</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <form id="form_validation_pegawai" action="server.php" method="POST" enctype="multipart/form-data">

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="branch" class="form-control show-tick" required>
                                                <option value="">--Branch--</option>
                                                <option value="Jakarta">Jakarta</option>
                                                <option value="Bandung">Bandung</option>
                                                <option value="Surabaya">Surabaya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_lengkap" required>
                                            <label class="form-label">Nama Pegawai</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="warga_negara">
                                            <label class="form-label">Warga Negara</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="tempat_lahir" required>
                                            <label class="form-label">Tempat Lahir</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control date" id="dob" name="tanggal_lahir" required>
                                            <label class="form-label">Tanggal Lahir <b>(YYYY-MM-DD)</b></label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="agama" class="form-control show-tick" required>
                                                <option value="">--Agama--</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="jenis_kelamin" id="male" value="LAKI - LAKI" class="with-gap">
                                        <label for="male">Laki - laki</label>

                                        <input type="radio" name="jenis_kelamin" value="PEREMPUAN" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Perempuan</label>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" autocomplete="off" name="no_ktp" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                            <label class="form-label">No KTP</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" autocomplete="off" name="no_sim" onKeyPress="return goodchars(event,'0123456789',this)">
                                            <label class="form-label">No SIM</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="status_sipil" class="form-control show-tick" required>
                                                <option value="">--Status Sipil--</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Lajang">Lajang</option>
                                                <option value="Cerai">Cerai</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="alamat_email" required>
                                            <label class="form-label">Alamat Email</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="alamat_sekarang" class="form-control no-resize" required></textarea>
                                            <label class="form-label">Alamat Sekarang</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="alamat_ktp" class="form-control no-resize" required></textarea>
                                            <label class="form-label">Alamat KTP</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="no_handphone" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                            <label class="form-label">No Handphone</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="no_wa" onKeyPress="return goodchars(event,'0123456789',this)">
                                            <label class="form-label">No WA</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="telepon" onKeyPress="return goodchars(event,'0123456789',this)">
                                            <label class="form-label">Telepon</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="riwayat_penyakit">
                                            <label class="form-label">Riwayat Penyakit</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="pendidikan_terakhir" class="form-control show-tick" required>
                                                <option value="">--Pendidikan--</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="fotoUpload" name="foto" required>
                                            <label class="form-label">Upload Foto</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="ktpUpload" name="ktp" required>
                                            <label class="form-label">Upload KTP</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="ijazahUpload" name="ijazah" required>
                                            <label class="form-label">Upload Ijazah</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <select name="perusahaan" class="form-control show-tick" required>
                                            <option value="">--Nama Perusahaan--</option>
                                            
                                            <?php 
                                                $info_client = mysqli_query($db, "SELECT * FROM menu_client");
                                                while ($row = mysqli_fetch_assoc($info_client)) {
                                                  $nama_client = $row['title_client'];
                                            ?>
                            
                                            <option value="<?= $nama_client; ?>"><?= $nama_client; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group form-float">
                                        <select name="posisi_rekomendasi" class="form-control show-tick" required>
                                            <option value="">--Posisi--</option>s
                                            
                                            <?php 
                                                $lowongan = mysqli_query($db, "SELECT * FROM info_lowongan where status='aktif'");
                                                while ($row = mysqli_fetch_assoc($lowongan)) {
                                                $nama_lowongan = $row['nama_lowongan'];
                                            ?>
                            
                                            <option value="<?= $nama_lowongan; ?>"><?= $nama_lowongan ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control date" id="date_join" name="tgl_join" required>
                                            <label class="form-label">Tanggal Join <b>(YYYY-MM-DD)</b></label>
                                        </div>
                                    </div>

                                    <input type="hidden" name="feedback" value="Join">
                                    <input type="hidden" name="status_pelamar" value="DISARANKAN" >
                                    <button class="btn btn-primary waves-effect" name="save_pegawai" type="submit">SIMPAN</button>
                                      
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalHarianBank" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Pemasukan/Pengeluaran</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <div class="fetched-data"></div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>




