<?php
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
    $jum_comment=$query2->num_rows();
    $jum_pesan=$query->num_rows();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIMPUL-NTB | Tambah</title>
        <?php $this->load->view('admin/parsial/v_head'); ?>
        <link href="<?php echo base_url().'assets/paper-assets/css/paper-bootstrap-wizard.css'?>" rel="stylesheet" />
        <link href="<?php echo base_url().'assets/paper-assets/css/themify-icons.css'?>" rel="stylesheet">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view('admin/parsial/v_header'); ?>
            <aside class="main-sidebar">
                <?php $this->load->view('admin/parsial/v_sidebar'); ?>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Wizard container -->
                <div class="wizard-container container-fluid" style="margin:0px; padding:10px">
                    <div class="card wizard-card" data-color="red" id="wizard">
                        <form action="<?php echo base_url('admin/addumkm/save_data') ?>" method="post" enctype="multipart/form-data">
                            <button class="btn btn-success" style="margin:10px" data-toggle="modal" data-target="#modal-default"><i class="fa fa-upload"> Import data</i></button>
                            <a href="<?php echo base_url().'admin/addumkm/download'?>" class="btn btn-danger"><i class="fa fa-save">Download format</i></a>
                            <div class="wizard-header">
                                <h3 class="wizard-title">FORM UMKM/IKM</h3>
                                <p class="category"></p>
                            </div>

                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#profil" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-id-badge"></i>
                                            </div>
                                            Profil Usaha
                                        </a>
                                    </li>
                                  <li>
                                      <a href="#aktivitas" data-toggle="tab">
                                          <div class="icon-circle">
                                              <i class="ti-agenda"></i>
                                          </div>
                                          Aktivitas
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#produk" data-toggle="tab">
                                          <div class="icon-circle">
                                              <i class="ti-gift"></i>
                                          </div>
                                          Produk
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#legalitas" data-toggle="tab">
                                          <div class="icon-circle">
                                              <i class="ti-receipt"></i>
                                          </div>
                                          Legalitas
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#bantuan" data-toggle="tab">
                                          <div class="icon-circle">
                                              <i class="ti-package"></i>
                                          </div>
                                          Bantuan
                                      </a>
                                  </li>
                                </ul>
                            </div>
                            <div class="tab-content" style="margin-top:20px">
                                <!-- tab profil usaha-->
                                <div class="tab-pane" id="profil">
                                    <div class="col-sm-12">
                                        <h5 class="info-text"></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label>Nama Usaha</label>
                                                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label>Nomer Izin </label>
                                                <input type="text" class="form-control" id="no_izin" name="no_izin" placeholder="Nomer Izin" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tahun berdiri</label>
                                                <input type="text" class="form-control yearpicker" id="tahun_berdiri" name="tahun_berdiri" placeholder="Tahun" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label>Nama pimpinan</label>
                                                <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="Nama pimpinan" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>NIK Pimpinan</label>
                                                <input type="text" class="form-control" id="nik_pimpinan" name="nik_pimpinan" placeholder="Nik pimpinan" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis usaha</label>
                                                <select class="form-control" name="jenis_usaha" required>
                                                    <option value="">-Pilih -</option>
                                                    <?php foreach ($jenis->result_array() as $i): ?>
                                                        <option value="<?php echo $i['keterangan'] ?>"><?php echo $i['keterangan'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Luas lahan</label>
                                                <input type="text" class="form-control" id="luas_lahan" name="luas_lahan" placeholder="Luas lahan" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Komoditas</label>
                                                <select class="form-control" name="komoditas" required>
                                                    <option value="">- Pilih -</option>
                                                    <?php foreach ($komoditas as $i): ?>
                                                        <option value="<?php echo $i->keterangan ?>"><?php echo $i->keterangan ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kepemilikan Koperasi</label>
                                                <select class="form-control" name="kepemilikan_koperasi" required>
                                                    <option value="">- Pilih -</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Status kepemilikan</label>
                                                <select class="form-control" name="status_kepemilikan" required>
                                                    <option value="">- Pilih -</option>
                                                    <?php foreach ($milik->result_array() as $i): ?>
                                                        <option value="<?php echo $i['keterangan'] ?>"><?php echo $i['keterangan'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kabupaten</label>
                                                <select class="form-control" id="kabupaten" name="kabupaten" required>
                                                    <option value="0">- Pilih Kabupaten -</option>
                                                    <?php foreach ($kab->result_array() as $i2): ?>
                                                        <option value="<?php echo $i2['kode']?>-<?php echo $i2['nama'] ?>"><?php echo $i2['nama'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <select class=" kecamatan form-control" name="kecamatan" id="kecamatan" required>
                                                    <option value="">- Pilih Kecamatan -</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Desa</label>
                                                <select class=" desa form-control" name="desa" required>
                                                    <option value="">- Pilih Desa -</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"  required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No, Telpon (Whatsapp)</label>
                                                <input type="text" class="form-control" id="nomer_hp" name="no_hp" placeholder="No, Telpon (Whatsapp)" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fax ( opsional )</label>
                                                <input type="text" class="form-control" id="fax" name="fax" placeholder="fax" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label>Website (opsional)</label>
                                                <input type="text" class="form-control" id="wesite" name="website" placeholder="http://">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email"  required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div id="googleMap" style="width:100%;height:380px;"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-none" style="display: none;">
                                            <div class="form-group">
                                                <label>Latittude</label>
                                                <input type="text" class="form-control" id="lat" name="lat" placeholder="Latittude" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="display: none;">
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tab profil usaha-->

                                <!--- tab aktivitas -->
                                <div class="tab-pane" id="aktivitas">
                                    <h5 class="info-text"></h5>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Sumber Modal</label>
                                                <select class="form-control" name="sumber_modal" required>
                                                    <option value="">- Pilih sumber modal-</option>
                                                    <?php foreach ($modal->result_array() as $i2): ?>
                                                        <option value="<?php echo $i2['keterangan'] ?>"><?php echo $i2['keterangan'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nilai Investasi</label>
                                              <input type="text" class="form-control" id="nilai_investasi" name="total_investasi" placeholder="Total modal/nilai investasi" required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nilai Produksi</label>
                                              <input type="text" class="form-control" id="nilai_produksi" name="nilai_produksi" placeholder="Nilai produksi"  required>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nilai Bahan Baku</label>
                                              <input type="text" class="form-control" id="nilai_bahan_baku" name="nilai_bahan_baku" placeholder="Nilai bahan baku"  required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Produk Unggulan</label>
                                              <input type="text" class="form-control" id="produk_unggulan" name="produk_unggulan" placeholder="Produk Unggulan" required>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Jumlah Tenaga Kerja</label>
                                              <input type="number" class="form-control" id="jumlah_tenaga_kerja" name="jumlah_tenaga_kerja" placeholder="Jumlah tenaga kerja" required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Rerata Biaya Tenaga Kerja</label>
                                              <input type="text" class="form-control" id="rerata_biaya" name="rerata_biaya" placeholder="Rerata biaya tenaga kerja" required>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Model Pengganjian</label>
                                              <input type="text" class="form-control" id="model_penggajian" name="model_penggajian" placeholder="Model pengganjian" required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nominal Gaji Perbulan</label>
                                              <input type="text" class="form-control" id="nominal_gaji_bulan" name="nominal_gaji_perbulan" placeholder="Nominal gaji perbulan" required>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nominal Gaji Perhari</label>
                                              <input type="text" class="form-control" id="nominal_gaji_hari" name="nominal_gaji_perhari" placeholder="Nominal gaji perhari" required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nominal Omzet</label>
                                              <input type="text" class="form-control" id="nominal_omzet" name="nominal_omzet" placeholder="Nominal omzet"  required>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Pendapatan Harian</label>
                                              <input type="text" class="form-control" id="pendapatan_harian" name="pendapatan_harian" placeholder="Pendapatan harian" required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Pendapatan Bulanan</label>
                                              <input type="text" class="form-control" id="pendapatan_bulanan" name="pendapatan_bulanan" placeholder="Pendapatan bulanan" required>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Jumlah Unit Usaha</label>
                                              <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit_usaha" placeholder="jumlah unit usaha" required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label> Metode Pemasaran</label>
                                              <select class="form-control" name="metode_pemasaran" required>
                                                  <option>- Pilih -</option>
                                                  <option value="Online">Online</option>
                                                  <option value="Offline">Offline</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Total Modal</label>
                                              <input type="text" class="form-control" id="total_modal" name="total_modal" placeholder="Total modal/nilai investasi" required>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <!-- end tab aktivitas -->

                                <!-- tab produk -->
                                <div class="tab-pane" id="produk">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table tproduct-list">
                                                <thead>
                                                  <tr>
                                                      <th>Jml Produksi Bulanan</th>
                                                      <th>Nama Produk</th>
                                                      <th>Jenis Produk</th>
                                                      <th>Harga</th>
                                                      <th>Deskripsi</th>
                                                      <th>Gambar produk</th>
                                                      <th></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control pjml_produksi_bulanan" id="jml_produksi_bulanan" name="jml_produksi_bulanan[]" placeholder="Jml Produksi Bulanan" min="1" required >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control pnama_produk" id="nama_produk" name="nama_produk[]" placeholder="Nama Produk" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control pjenis_produk" id="jenis_produk" name="jenis_produk[]" placeholder="Jenis Produk" >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control pharga" id="harga" name="harga[]" placeholder="Harga Produk" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <textarea class="form-control pdeskripsi" id="Deskripsi" name="deskripsi[]" ></textarea>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control pphoto" id="photo" name="photo[]" accept="image/*">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-danger btn-delete-product">Hapus</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="7" class="text-center">
                                                            <button type="button" class="btn btn-primary btn-add-product">Tambah Produk Lain</button>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tab produk -->

                                <!-- tab legalitas-->
                                <div class="tab-pane" id="legalitas">
                                    <table class="table tlegality-list">
                                        <thead>
                                            <tr>
                                                <th>Izin</th>
                                                <th>Nomor Izin</th>
                                                <th>Tahun Izin</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <select class="form-control izin">
                                                        <option value="">-Pilih-</option>
                                                        <?php foreach($legalitas as $lg): ?>
                                                            <option value="<?= $lg->id ?>"><?= $lg->keterangan ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </td>
                                                <td><input type="number" min="1" class="form-control no-izin" id="no_izin" placeholder="Nomor Izin" ></td>
                                                <td><input type="text" class="form-control th-izin yearpicker" id="th_izin" placeholder="Tahun Izin"></td>
                                                <td><button type="button" class="btn btn-primary btn-add-legality">Tambah</button></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- end tab legalitas -->

                                <!-- tab bantuan-->
                                <div class="tab-pane" id="bantuan">
                                    <table class="table thelp-list">
                                        <thead>
                                            <tr>
                                                <th>Asal Bantuan</th>
                                                <th>Jenis Bantuan</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <select class="form-control asal-bantuan">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Pemerintah Provinsi">Pemerintah Provinsi</option>
                                                        <option value="Pemerintah Kabupaten">Pemerintah Kabupaten</option>
                                                        <option value="Swasta">Swasta</option>
                                                        <option value="dan lain-lain">dan lain-lain</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control jenis-bantuan" id="jenis_bantuan" placeholder="Jenis Bantuan"></td>
                                                <td><button type="button" class="btn btn-primary btn-add-help">Tambah</button></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    
                                </div>
                                <!-- end tab bantuan -->
                            </div>

                            <div class="wizard-footer clearfix">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- wizard container -->
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('admin/parsial/v_footer')?>

            <!-- modal -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Import Data UMKM/IKM</h4>
                        </div>
                    
                        <?php echo form_open_multipart('admin/addumkm/import_excel',array('name' => 'spreadsheet')); ?>
                            <div class="modal-body">
                                <input type="file" class="btn" name="file" required>
                                NB: file harus bertype xls|csv
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js'?>"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.extensions.js'?>"></script>
        <!-- date-range-picker -->
        <!-- <script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script> -->
        <!-- bootstrap datepicker -->
        <script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
        <!-- bootstrap color picker -->
        <!-- <script src="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'?>"></script> -->
        <!-- bootstrap time picker -->
        <!-- <script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script> -->
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
        <!-- iCheck 1.0.1 -->
        <!-- <script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script> -->
        <!-- FastClick -->
        <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
        <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
        <!-- Page script -->
        <script>
            $(document).ready(function () {
                $('#kabupaten').change(function () {
                    var id = $(this).val();
                    var split = id.split("-");
                    var id_split = split[0];
                    //var nama = split[1];
                    
                    $.ajax({
                        url: "<?php echo base_url();?>admin/addumkm/get_kecamatan",
                        method: "POST",
                        data: { kode: id_split },
                        async: false,
                        dataType: 'json',
                        success: function (data) {
                            var html = '<option value="">- Pilih Kecamatan -</option>';
                            var i;

                            for (i = 0; i < data.length; i++) {
                                html += '<option value=' + data[i].kode + '-' + data[i].nama + '>' + data[i].nama +'</option>';                        
                            }

                            $('.kecamatan').html(html);
                        }
                    });
                });
            

                $('#kecamatan').change(function () {
                    var id = $(this).val();
                    var split = id.split("-");
                    var id_split = split[0];
                    $.ajax({
                        url: "<?php echo base_url();?>admin/addumkm/get_desa",
                        method: "POST",
                        data: { kode: id_split },
                        async: false,
                        dataType: 'json',
                        success: function (data) {
                            var html = '<option value="">- Pilih Desa -</option>';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<option value=' + data[i].nama + '>' + data[i].nama + '</option>';
                            }
                            $('.desa').html(html);
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript">
            var rerata_biaya = document.getElementById('rerata_biaya');
            var nominal_gaji_perbulan = document.getElementById('nominal_gaji_bulan');
            var nominal_gaji_perhari = document.getElementById('nominal_gaji_hari');
            var pendapatan_bulanan = document.getElementById('pendapatan_bulanan');
            var pendapatan_harian = document.getElementById('pendapatan_harian');
            var total_modal = document.getElementById('total_modal');
            var nilai_investasi = document.getElementById('nilai_investasi');
            var nilai_produksi = document.getElementById('nilai_produksi');
            var nilai_bahan_baku = document.getElementById('nilai_bahan_baku');
            var harga = document.getElementById('harga');

            harga.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                harga.value = formatRupiah(this.value, 'Rp. ');
            });

            nilai_produksi.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                nilai_produksi.value = formatRupiah(this.value, 'Rp. ');
            });

            nilai_bahan_baku.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                nilai_bahan_baku.value = formatRupiah(this.value, 'Rp. ');
            });

            rerata_biaya.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rerata_biaya.value = formatRupiah(this.value, 'Rp. ');
            });

            nominal_gaji_perbulan.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                nominal_gaji_perbulan.value = formatRupiah(this.value, 'Rp. ');
            });

            nominal_gaji_perhari.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                nominal_gaji_perhari.value = formatRupiah(this.value, 'Rp. ');
            });

            nominal_omzet.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                nominal_omzet.value = formatRupiah(this.value, 'Rp. ');
            });

            nominal_omzet.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                nominal_omzet.value = formatRupiah(this.value, 'Rp. ');
            });

            pendapatan_bulanan.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                pendapatan_bulanan.value = formatRupiah(this.value, 'Rp. ');
            });

            pendapatan_harian.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                pendapatan_harian.value = formatRupiah(this.value, 'Rp. ');
            });

            total_modal.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                total_modal.value = formatRupiah(this.value, 'Rp. ');

            });


            nilai_investasi.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                nilai_investasi.value = formatRupiah(this.value, 'Rp. ');
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
        
                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
        
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script>
        <script src="<?php echo base_url().'assets/paper-assets/js/jquery.bootstrap.wizard.js'?>" type="text/javascript"></script>

        <!--  Plugin for the Wizard -->
        <script src="<?php echo base_url().'assets/paper-assets/js/demo.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/paper-assets/js/paper-bootstrap-wizard.js'?>" type="text/javascript"></script>

        <!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
        <script src="<?php echo base_url().'assets/paper-assets/js/jquery.validate.min.js'?>" type="text/javascript"></script>

        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyArQzHX2ODczAlJ_4iQwMqb8R4ey44ZhqY"></script>

        <script>
            // fungsi initialize untuk mempersiapkan peta
            var marker;

            function taruhMarker(peta, posisiTitik) {

                if (marker) {
                  // pindahkan marker
                  marker.setPosition(posisiTitik);
                } else {
                  // buat marker baru
                  marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                  });
                }

                // isi nilai koordinat ke form
                document.getElementById("lat").value = posisiTitik.lat();
                document.getElementById("lng").value = posisiTitik.lng();
            }

            function initialize() {
                var propertiPeta = {
                    center: new google.maps.LatLng(-8.5830695, 116.3202515),
                    zoom: 9,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

                // even listner ketika peta diklik
                google.maps.event.addListener(peta, 'click', function (event) {
                    taruhMarker(this, event.latLng);
                });

            }

            // event jendela di-load  
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {
                    "placeholder": "dd/mm/yyyy"
                });

                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {
                    "placeholder": "mm/dd/yyyy"
                });

                //Money Euro
                $("[data-mask]").inputmask();

                /* ADD PRODUCT ROWS */
                $('.btn-add-product').on('click', function(){
                    var jml_prod = $('.pjml_produksi_bulanan').val();
                    var nama_prod = $('.pnama_produk').val();
                    var jenis_prod = $('.pjenis_produk').val();
                    var harga = $('.pharga').val();
                    var deskripsi = $('.pdeskripsi').val();
                    var photo = $('.pphoto').val();
                    var tprod = $('.tproduct-list tbody');

                    var tprod_list = '<tr>' +
                                        '<td>' +
                                            '<div class="form-group">' +
                                                '<input type="number" class="form-control pjml_produksi_bulanan" id="jml_produksi_bulanan" name="jml_produksi_bulanan[]" placeholder="Jml Produksi Bulanan" min="1" required >' +
                                            '</div>' +
                                        '</td>' +
                                        '<td>' +
                                            '<div class="form-group">' +
                                                '<input type="text" class="form-control pnama_produk" id="nama_produk" name="nama_produk[]" placeholder="Nama Produk" required>' +
                                            '</div>' +
                                        '</td>' +
                                        '<td>' +
                                            '<div class="form-group">' +
                                                '<input type="text" class="form-control pjenis_produk" id="jenis_produk" name="jenis_produk[]" placeholder="Jenis Produk" >' +
                                            '</div>' +
                                        '</td>' +
                                        '<td>' +
                                            '<div class="form-group">' +
                                                '<input type="text" class="form-control pharga" id="harga" name="harga[]" placeholder="Harga Produk" required>' +
                                            '</div>' +
                                        '</td>' +
                                        '<td>' +
                                            '<div class="form-group">' +
                                                '<textarea class="form-control pdeskripsi" id="Deskripsi" name="deskripsi[]" ></textarea>' +
                                            '</div>' +
                                        '</td>' +
                                        '<td>' +
                                            '<div class="form-group">' +
                                                '<input type="file" class="form-control pphoto" id="photo" name="photo[]">' +
                                            '</div>' +
                                        '</td>' +
                                        '<td>' +
                                            '<span class="btn btn-danger btn-delete-product">Hapus</span>' +
                                        '</td>' +
                                    '</tr>';

                    tprod.append(tprod_list);
                });

                /* CHANGE PRODUCT PRICE FORMAT */
                $('.tproduct-list').on('keyup', 'tr td input.pharga', function(e){
                    this.value = formatRupiah(this.value, 'Rp. ');
                });

                /* REMOVE PRODUCT ROWS */
                $('.tproduct-list').on('click', 'tr td .btn-delete-product', function(){
                    $(this).closest('tr').remove();
                })

                /* ADD LEGALITY ROWS */
                $('.btn-add-legality').on('click', function(){
                    var izin = $('.izin').val();
                    var nama_izin = $( ".izin option:selected" ).text();
                    var no_izin = $('.no-izin').val();
                    var th_izin = $('.th-izin').val();
                    var tlegality = $('.tlegality-list tbody');

                    var tlegal_list = '<tr>' +
                                        '<td>'+ nama_izin +'<input type="hidden" name="id_izin_legalitas[]" value="' + izin + '" /><input type="hidden" name="nama_izin_legalitas[]" value="' + nama_izin + '" /></td>' +
                                        '<td>'+ no_izin +'<input type="hidden" name="no_izin_legalitas[]" value="' + no_izin + '" /></td>' +
                                        '<td>'+ th_izin +'<input type="hidden" name="th_izin_legalitas[]" value="' + th_izin + '" /></td>' +
                                        '<td><span class="btn btn-danger btn-delete-legality">Hapus</span></td>' +
                                      '</tr>';

                    if(izin !== '' && no_izin !== '' && th_izin !== ''){
                        tlegality.append(tlegal_list);
                        $('.izin').val('');
                        $('.no-izin').val('');
                        $('.th-izin').val('');
                    } else {
                        alert("Silahkan lengkapi form isian legalitas!");
                    }
                })

                /* REMOVE LEGALITY ROWS */
                $('.tlegality-list').on('click', 'tr td .btn-delete-legality', function(){
                    $(this).closest('tr').remove();
                });

                /* ADD HELP ROWS */
                $('.btn-add-help').on('click', function(){
                    var asal_bantuan = $('.asal-bantuan').val();
                    var jenis_bantuan = $('.jenis-bantuan').val();
                    var thelp = $('.thelp-list tbody');

                    var thelp_list = '<tr>' +
                                        '<td>'+ asal_bantuan +'<input type="hidden" name="asal_bantuan[]" value="' + asal_bantuan + '" /></td>' +
                                        '<td>'+ jenis_bantuan +'<input type="hidden" name="jenis_bantuan[]" value="' + jenis_bantuan + '" /></td>' +
                                        '<td><span class="btn btn-danger btn-delete-help">Hapus</span></td>' +
                                      '</tr>';

                    if(asal_bantuan !== '' && jenis_bantuan !== ''){
                        thelp.append(thelp_list);
                        $('.asal-bantuan').val('');
                        $('.jenis-bantuan').val('');
                    } else {
                        alert("Silahkan lengkapi form isian bantuan!");
                    }
                })

                /* REMOVE HELP ROWS */
                $('.thelp-list').on('click', 'tr td .btn-delete-help', function(){
                    $(this).closest('tr').remove();
                })

                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                });

                $('.yearpicker').datepicker({
                    autoclose: true,
                    format: "yyyy",
                    viewMode: "years", 
                    minViewMode: "years"
                });
            });
        </script>
    </body>
</html>