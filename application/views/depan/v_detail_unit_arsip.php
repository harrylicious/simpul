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
<div class="p-5 mb-0" style="background: rgba(137, 3, 0, 0);"></div>

<div class="container">
  <?php include_once "parsial/summary_doc.php"; ?>


  <div class="row">
    <div class="col-sm-4">
      <!--left col-->


      <label for="">Status</label>
      <ul class="list-group">
        <li class="list-group-item text-muted"><strong>Status Arsip:</strong> </li>
        <?php if ($data['tgl_akhir_aktif'] > date("now")) {
        ?>
          <li class="list-group-item text-left"><span class="pull-left"><?= $data['dap_id']; ?></span> </li>
        <?php
        } ?>
      </ul> </br>

      <ul class="list-group">
        <li class="list-group-item text-muted"><strong>Rangkuman:</strong> </li>
        <li class="list-group-item text-left"><span class="pull-left">Arsip ID : <?= $data['dap_id']; ?></span> </li>
        <li class="list-group-item text-left"><span class="pull-left">Nomor Arsip : <?= $data['nomor_arsip']; ?></span> </li>
        <li class="list-group-item text-left"><span class="pull-left">Tahun Cipta: <?= substr($data['tgl_cipta'], 0, 4); ?> <span class="badge badge-success"><?= $tahun['total']; ?></span></span> </li>
        <li class="list-group-item text-left"><span class="pull-left">Kode Klasifikasi : <?= $data['kode_klasifikasi']; ?> <span class="badge badge-success"><?= $kode_klasifikasi['total']; ?></span></span> </li>
      </ul> </br>

      <ul class="list-group">
        <li class="list-group-item text-left"><strong>Aktif & Inaktif:</strong> </li>
        <li class="list-group-item text-left"><span class="pull-left">Tgl Akhir Aktif : <?= substr($data['tgl_akhir_aktif'], 0, 10); ?></span> </li>
        <li class="list-group-item text-left  "><span class="pull-left">Tgl Akhir Inaktif : <?= substr($data['tgl_akhir_inaktif'], 0, 10); ?></span> </li>
      </ul>


    </div>
    <!--/col-3-->
    <div class="col-sm-8">
      <div class="form-group">
        <label for="">Unit Arsip:</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['instansi']; ?> <span class="badge badge-success"><?= $instansi['total']; ?></span></li>
      </div>
      <div class="form-group">
        <label for="">Uraian:</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['uraian']; ?></span></li>
      </div>
      <div class="form-group">
        <label for="">Jenis</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['jenis']; ?> <span class="badge badge-success"><?= $jenis['total']; ?></span></li>
      </div>
      <div class="form-group">
        <label for="">Pencipta</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['pencipta']; ?> </span></li>
      </div>
      <div class="form-group">
        <label for="">Lokasi Simpan</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['lokasi_simpan']; ?> </li>
      </div>
      <div class="form-group">
        <label for="">Tingkat Perkembangan</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['tingkat_perkembangan']; ?></li>
      </div>

      <div class="form-group">
        <label for="">Nasib Akhir Pasca Inaktif</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['nasib_akhir']; ?> </li>
      </div>
      <div class="form-group">
        <label for="">Keamanan</label>
        <li class="list-group-item text-left"><span class="pull-left"><?= $data['keamanan']; ?></li>
      </div>



      <a href="" class="btn btn-success"><i class="fa fa-print"></i> print</a>


    </div>
  </div>
</div>
  <div class="container-fluid px-0">
    <?php include_once "parsial/footer.php"; ?>
  </div>
</section>



  </html>

  <script>
    function myFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("panel") == -1) {
        x.className += "panel";
      } else {
        x.className = x.className.replace("panel", "");
      }
    }

    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#example tfoot th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
      });

      // DataTable
      var table = $('#example').DataTable({
        initComplete: function() {
          // Apply the search
          this.api().columns().every(function() {
            var that = this;

            $('input', this.footer()).on('keyup change clear', function() {
              if (that.search() !== this.value) {
                that
                  .search(this.value)
                  .draw();
              }
            });
          });
        }
      });

    });
  </script>