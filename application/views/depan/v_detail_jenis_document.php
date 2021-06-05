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
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title"> ARSIP <strong><?= str_replace("%20", " ", strtoupper($jenis)); ?></strong></h5>
        </div>
        <div class="card-body ">

          <body>
            <table id="dtHorizontalExample" class="display" style="width:100%">
              <thead>
                <tr>
                  <th width="60px">ID Arsip</th>
                  <th>Klasifikasi</th>
                  <th>Judul/Uraian</th>
                  <th>Tahun</th>
                  <th>Jenis</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) {
                ?>
                  <tr>
                    <td><?= $row->dap_id; ?></td>
                    <td><?= $row->kode_klasifikasi; ?></td>
                    <td><?= $row->uraian; ?></td>
                    <td><?= substr($row->tgl_cipta, 0, 4); ?></td>
                    <td><?= $row->jenis; ?></td>
                    <td><a href="<?= base_url('document/detail/') . $row->dap_id; ?>" class="btn btn-danger">Detail</a></td>
                  </tr>

                <?php
                }

                ?>

              </tbody>

            </table>
          </body>
        </div>

      </div>
    </div>
  </div>
</div>
</div>


  <div class="container-fluid px-0">
    <?php include_once "parsial/footer.php"; ?>
  </div>

</div>


</html>
<script>
  $(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
      "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>
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