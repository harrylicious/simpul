<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php"; ?>
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

<section class="row">
  <div class="container" style="margin-top:20px">
    <?php include_once "parsial/summary_doc.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title"> DAFTAR PENGELOLA</h5>
            <p class="card-category">Data Arsip Se-Provinsi Nusa Tenggara Barat</p>
          </div>
          <div class="card-body ">
            <body>
              <table id="example" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Pengelola</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data as $row) {
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row->wilayah; ?></td>
                      <td><?= $row->instansi; ?></td>
                      <td><?= $row->total; ?></td>
                      <td><a href="<?= base_url('rekap/detail/') . $row->wilayah; ?>" class="btn btn-danger">Detail</a></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                  <th>ID</th>
                  <th>Nama Pengelola</th>
                  <th>Keterangan</th>
                  <th>Total</th>
                </tfoot>
              </table>
            </body>
          </div>

        </div>
      </div>
    </div>

</section>
<div class="container-fluid px-0">
  <?php include_once "parsial/footer.php"; ?>
</div>


</html>

<script>
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