

<?php include_once "parsial/header.php"; ?>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo $data->nama_usaha; ?></h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
    <?php
        $gbr = $data->gambar;
        if ($gbr == "0") {
            $gbr = base_url().'assets/images/logo_default.png';
        }
        else {
            $gbr = base_url().'assets/images/gambar/'.$data->gambar;
        }
    ?>
        <img src="<?php echo $gbr ?>" class="avatar img-circle img-thumbnail" alt="avatar">
        
        <h6 style="margin-top: 20px;"><?php echo $data->nama_pimpinan?></h6>
        <!-- <input type="file" class="text-center center-block file-upload"> -->
      </div></hr><br>

          
          <ul class="list-group">
            <li class="list-group-item text-muted">Rangkuman: </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Tahun Berdiri : </strong></span> <?= $data->tahun_berdiri?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nilai Investasi :</strong></span> <?= $data->nilai_investasi?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nilai Produksi :</strong></span> <?= $data->nilai_produksi?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nilai Bahan Baku :</strong></span> <?= $data->nilai_bahan_baku?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Kapasitas Produksi :</strong></span> <?= $data->kapasitas_produksi?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Jumlah Unit Usaha :</strong></span> <?= $data->jml_unit_usaha?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Luas Lahan :</strong></span> <?= $data->luas_lahan?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Jumlah Anggota :</strong></span> <?= $data->jml_anggota?></li>
        </ul> </br>

          <ul class="list-group">
            <li class="list-group-item text-muted">Link: </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Website :</strong></span> <?= $data->website?></li>
            <!-- <li class="list-group-item text-right"><span class="pull-left"><strong>Facebook :</strong></span> <?= $data->facebook?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Instagram :</strong></span> <?= $data->instagram?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Youtube :</strong></span> <?= $data->youtube?></li> -->
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
           

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                
                      <div class="form-group">    
                        <label for="">Jenis Usaha:</label>
                        <li class="list-group-item text-right"><span class="pull-left"></span><?= $data->jenis_usaha?></li>
                      </div>
                      <div class="form-group">
                        <label for="">Alamat:</label>
                        <li class="list-group-item text-right"><span class="pull-left"></span> <?= $data->alamat?></li>
                      </div>
                      <div class="form-group">
    	                <div style="list-style-type: none; display: block; ">
                            <li class="list-group-item col-sm-4" style="float: left;"> <span class="pull-left"></span> <?= $data->desa?> ()</li>
                            <li class="list-group-item col-sm-4" style="float: left;"> <span class="pull-left"></span> <?= $data->kecamatan?> ()</li>
                            <li class="list-group-item col-sm-4"><span class="pull-left"></span> <?= $data->kabupaten?></li>
                        </div>
                      </div>
                    <?php if (!$data->komoditas == "") {
                    ?>
                      <div class="form-group">
                        <label for="">Komoditas:</label>
                        <li class="list-group-item text-right"><span class="pull-left"></span> <?= $data->komoditas?></li>
                      </div>
                    <?php }
                    ?>
                    <?php if (!$data->status_kepemilikan == "") {
                    ?>
          
                      <div class="form-group">
                        <label for="">Status Kepemilikan:</label>
                        <li class="list-group-item text-right"><span class="pull-left"></span> <?= $data->status_kepemilikan?></li>
                      </div>
                    <?php }
                    ?>
                    <?php if (!$data->kepemilikan_tempat == "") {
                    ?>
                      <div class="form-group">
                        <label for="">Kepemilikan Tempat:</label>
                        <li class="list-group-item text-right"><span class="pull-left"></span> <?= $data->kepemilikan_tempat?></li>
                      </div>
                    <?php } 
                    ?>
                    <?php if (!$data->kepemilikan_koperasi == "") {
                    ?>
                      <div class="form-group">
                        <label for="">Kepemilikan Koperasi:</label>
                        <li class="list-group-item text-right"><span class="pull-left"></span> <?= strtoupper($data->kepemilikan_koperasi)?></li>
                      </div>
                    <?php } 
                    ?>
                    <?php if (!$data->sumber_modal == "") {
                    ?>
                      <div class="form-group">
                        <label for="">Sumber Modal:</label>
                        <li class="list-group-item text-right"><span class="pull-left"></span> <?= $data->sumber_modal?></li>
                      </div>
                    <?php }
                    ?>
                     
                  <button class="accordion" onclick="myFunction('demo1')" style="background-color: #1E1E1E; color: #ffffff">Legalitas (Kelengkapan Izin)</button>
                  <div class="panel" id="demo1">
                    <div class="form-group" style="margin: 5px">
                    <ul class="list-group">
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/nib.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Nomor Induk Berusaha (NIB) : </strong></span> </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/skdu.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Surat Keterangan Domisili Usaha (SKDU) :</strong></span> </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/npwp.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Nomor Pokok Wajib Pajak (NPWP) :</strong></span> </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/ud.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Izin Usaha Dagang (UD) :</strong></span>  </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/ho.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>HO (Surat izin gangguan) :</strong></span>  </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/imb.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Izin Mendirikan Bangunan (IMB) :</strong></span>  </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/bpom.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Izin BPOM :</strong></span>  </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/pirt.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Izin PIRT :</strong></span>  </li>
                        <li class="list-group-item text-right"><img src="<?php echo base_url().'assets/images/izin/lingkungan.png'?>" class="img-fluid" alt="izin-img"><span class="pull-left"><strong>Izin Lingkungan :</strong></span>  </li>
                    </ul>
                    </div>
                  </div>

                  <button class="accordion" onclick="myFunction('demo2')" style="background-color: #1E1E1E; color: #ffffff">Riwayat Bantuan</button>
                  <div class="panel" id="demo2">
                  <div class="form-group" style="margin: 5px">
                    <ul class="list-group">
                        <li class="list-group-item text-right"><span class="pull-left"><strong>(2016) Dinas Perdagangan Provinsi (Fasilitas)</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>(2017) Dinas Perindustrian Kabupaten (Fasilitas)</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>(2018) Dinas Perdagangan Kabupaten (Fasilitas)</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>(2019) Dinas Perdagangan Provinsi (Dana & Fasilitas)</li>
                    </ul>
                    </div>
                  </div>

                  <button class="accordion" onclick="myFunction('demo3')" style="background-color: #1E1E1E; color: #ffffff">Daftar Produk</button>
                  <div class="panel" id="demo3">
                    <div class="form-group" style="margin: 15px">
                      <div class="row">
                        <?php foreach ($produk->result() as $row) :?>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                              <div class="courses_box mb-4">
                                  <div class="course-img-wrap">
                                     <div class="card danger-info shadow text-info p-3 my-card" ></div>     
                                     <img src="<?php echo base_url().'assets/images/'.$row->photo;?>" class="img-fluid" alt="courses-img">
                                  </div>
                                  <!-- // end .course-img-wrap -->
                                  <a href="<?php echo site_url('produk/'.$row->slug);?>" class="course-box-content">
                                      <h4 style="text-align:center;text-style:bold"><b><?php echo $row->nama_produk;?></b></h4>
                                      <center><span class="badge badge-primary text-center"><?php echo $row->nama_usaha;?></span></center>
                                  </a>
                               
                              </div>
                          </div>
                        <?php endforeach;?>
                      </div> <br>
                    
                    </div>
                  </div>
              
              <hr>
            		
               	<a href="<?= base_url('indeksusaha/print/'.$data->id_usaha)?>" class="btn btn-success"><i class="fa fa-print"></i> print</a>
                  <hr>
                 
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->
        </div><!--/col-9-->
    </div><!--/row-->
    <script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("panel") == -1) {
    x.className += "panel";
  } else { 
    x.className = x.className.replace("panel", "");
  }
}
</script>