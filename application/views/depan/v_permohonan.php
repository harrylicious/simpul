
<!------ Include the above in your HEAD tag ---------->
  <!--============================= HEADER =============================-->
  <?php include_once "parsial/header.php"; 
 ?>
<!--//END HEADER -->
<style>

tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>

<!--//END HEADER -->

 
    <div class="container">
        
   
        <div class="row">
          <div class="col-md-12"> 
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title"> FORMULIR PERMOHONAN INFORMASI</h5>
              </div>
              <div class="card-body "> 
                <body>
                    
                <form action="<?= base_url('permohonan/save_data'); ?>" method="post">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="" required>
                                    </div>
                                </div>

                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>HP</label>
                                        <input type="text" class="form-control" id="handphone" name="handphone" placeholder="Handphone" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                 
                                    <label>Rincian informasi yang dibutuhkan:</label>  
                                </div>


                                <div class="box box-suadminccess px-5 mx-4">
                                    <div class="row">

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> ID Arsip</label>
                                            <input type="text" class="form-control" id="id1" name="id1" placeholder="ID Arsip" onkeyup="autocomplete_ids()" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" id="judul1" name="judul1" placeholder="Judul" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" id="lokasi1" name="lokasi1" placeholder="Lokasi" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                
                                <!-- ID Arsip 2 -->
                                <div class="box box-info px-5 mx-4">
                                    <div class="row">

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> ID Arsip</label>
                                            <input type="text" class="form-control" id="id2" name="id2" placeholder="ID Arsip" onkeyup="autocomplete_ids()">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" id="judul2" name="judul2" placeholder="Judul" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" id="lokasi2" name="lokasi2" placeholder="Lokasi" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- ID Arsip 2 -->
                                
                                
                                <!-- ID Arsip 3 -->
                                <div class="box box-danger px-5 mx-4">
                                    <div class="row">

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> ID Arsip</label>
                                            <input type="text" class="form-control" id="id3" name="id3" placeholder="ID Arsip" onkeyup="autocomplete_ids()">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" id="judul3" name="judul3" placeholder="Judul" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" id="lokasi3" name="lokasi3" placeholder="Lokasi" readonly>
                                        </div>
                                    </div> 
                                    </div>
                                </div>
                                <!-- ID Arsip 3 -->

                                
                                
                                <!-- ID Arsip 4 -->
                                <div class="box box-orange px-5 mx-4">
                                    <div class="row">
                                    

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> ID Arsip</label>
                                            <input type="text" class="form-control" id="id4" name="id4" placeholder="ID Arsip" onkeyup="autocomplete_ids()">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" id="judul4" name="judul4" placeholder="Judul" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" id="lokasi4" name="lokasi4" placeholder="Lokasi" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- ID Arsip 4 -->

                                
                                
                                <!-- ID Arsip 5 -->
                                <div class="box box-warning px-5 mx-4">
                                    <div class="row">

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> ID Arsip</label>
                                            <input type="text" class="form-control" id="id5" name="id5" placeholder="ID Arsip" onkeyup="autocomplete_ids()">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" id="judul5" name="judul5" placeholder="Judul" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" id="lokasi5" name="lokasi5" placeholder="Lokasi" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- ID Arsip 2 -->
                                </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tujuan Penggunaan Informasi</label>
                                        <input type="text" class="form-control" id="tujuan_penggunaan" name="tujuan_penggunaan" placeholder="Tujuan Penggunaan Informasi" value="" required>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Cara Memperoleh Informasi</label>
                                            <select class="form-control" name="cara_memperoleh" required>
                                                <option value="">- Pilih -</option>
                                                <option value="Melihat">Melihat</option>
                                                <option value="Membaca">Membaca</option>
                                                <option value="Mendengarkan">Mendengarkan</option>
                                                <option value="Mencatat">Mencatat</option>
                                                <option value="Mendapatkan salinan informasi (hardcopy/softcopy)">Mendapatkan salinan informasi (hardcopy/softcopy)</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Cara Mendapatkan Salinan Informasi</label>
                                            <select class="form-control" name="cara_mendapatkan" required>
                                                <option value="">- Pilih -</option>
                                                <option value="Mengambil Langsung">1. Mengambil Langsung</option>
                                                <option value="Kurir">2. Kurir</option>
                                                <option value="Pos">3. Pos</option>
                                                <option value="Faxsimili">4. Faxsimili</option>
                                                <option value="Email">5. Email</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-print"></i> CETAK PERMOHONAN</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                </body>
              </div>
            
            </div>
          </div>
        </div>
        
    
<?php include_once "parsial/footer.php"; ?>

    </div>
 
  
</html>

  
<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
<script type='text/javascript'>
    function autocomplete_ids(){ 
        
        //autocomplete
        $("#id1").autocomplete({ 
            source: "<?php echo base_url('document/autocomplete_id') ?>",  
            minLength: 1
        });
        autofill_document();

        //autocomplete
        $("#id2").autocomplete({ 
            source: "<?php echo base_url('document/autocomplete_id') ?>",  
            minLength: 1
        });
        //console.log("TES");
        autofill_document2();

        
        //autocomplete
        $("#id3").autocomplete({ 
            source: "<?php echo base_url('document/autocomplete_id') ?>",  
            minLength: 1
        });
        autofill_document3();

        
        //autocomplete
        $("#id4").autocomplete({ 
            source: "<?php echo base_url('document/autocomplete_id') ?>",  
            minLength: 1
        });
        autofill_document4();

        
        //autocomplete
        $("#id5").autocomplete({ 
            source: "<?php echo base_url('document/autocomplete_id') ?>",  
            minLength: 1
        });
        autofill_document5();
    }

    function autofill_document(){
        var id = $("#id1").val();
        $.ajax({
            url: "<?php echo base_url('document/autofilldocument')?>",
            data : "dap_id="+id,
            success: function (data) { 
                var json = data,
                obj = JSON.parse(json);
                $('#judul1').val(obj.uraian);
                $('#lokasi1').val("KPU "+obj.wilayah);
                //console.log(data);
            }
        });
    }

    function autofill_document2(){
        var id = $("#id2").val();
        $.ajax({
            url: "<?php echo base_url('document/autofilldocument')?>",
            data : "dap_id="+id,
            success: function (data) { 
                var json = data,
                obj = JSON.parse(json);
                $('#judul2').val(obj.uraian);
                $('#lokasi2').val("KPU "+obj.wilayah);
                //console.log(data);
            }
        });
    }

    function autofill_document3(){
        var id = $("#id3").val();
        $.ajax({
            url: "<?php echo base_url('document/autofilldocument')?>",
            data : "dap_id="+id,
            success: function (data) { 
                var json = data,
                obj = JSON.parse(json);
                $('#judul3').val(obj.uraian);
                $('#lokasi3').val("KPU "+obj.wilayah);
                //console.log(data);
            }
        });
    }

    function autofill_document4(){
        var id = $("#id4").val();
        $.ajax({
            url: "<?php echo base_url('document/autofilldocument')?>",
            data : "dap_id="+id,
            success: function (data) { 
                var json = data,
                obj = JSON.parse(json);
                $('#judul4').val(obj.uraian);
                $('#lokasi4').val("KPU "+obj.wilayah);
                //console.log(data);
            }
        });
    }

    function autofill_document5(){
        var id = $("#id5").val();
        $.ajax({
            url: "<?php echo base_url('document/autofilldocument')?>",
            data : "dap_id="+id,
            success: function (data) { 
                var json = data,
                obj = JSON.parse(json);
                $('#judul5').val(obj.uraian);
                $('#lokasi5').val("KPU "+obj.wilayah);
                //console.log(data);
            }
        });
    }




</script>