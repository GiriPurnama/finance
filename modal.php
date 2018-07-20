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
                                <form id="form_validation_pegawai" action="server.php" method="POST">
                                    

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama_pegawai" required>
                                        <label class="form-label">Nama Pegawai</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="radio" name="jenis_kelamin" id="male" value="laki-laki" class="with-gap">
                                    <label for="male">Laki - laki</label>

                                    <input type="radio" name="jenis_kelamin" value="perempuan" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Perempuan</label>
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

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tempat_lahir" required>
                                        <label class="form-label">Tempat Lahir</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control date" id="dob" name="tgl_lahir" required>
                                        <label class="form-label">Tanggal Lahir <b>(YYYY-MM-DD)</b></label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="alamat" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control"  name="no_telepon" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                        <label class="form-label">No Telepon</label>
                                    </div>
                                </div>

                               <div class="form-group form-float">
                                    <select name="nama_perusahaan" class="form-control show-tick" required>
                                        <option value="">--Nama Perusahaan--</option>
                                        <option value="Sinarmas">Sinarmas</option>
                                        <option value="Esse">Esse</option>
                                        <option value="BRI">BRI</option>
                                        <option value="Neviim">Neviim</option>
                                    </select>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control date" id="date_join" name="tgl_join" required>
                                        <label class="form-label">Tanggal Join <b>(YYYY-MM-DD)</b></label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="jumlah_cuti" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                        <label class="form-label">Jumlah Cuti</label>
                                    </div>
                                </div>

                               
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




