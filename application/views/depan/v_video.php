
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


<section class="our_courses">
    <div class="container" style="margin-top:-80px">
      <?php include_once "parsial/summary_doc.php"; ?>
        
   
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title"> ARSIP VIDEO</h5>
                <p class="card-category">Data Arsip Se-Provinsi Nusa Tenggara Barat</p>
              </div>
              <div class="card-body ">
              <body>
              <table id="example" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Klasifikasi</th>
                          <th>Judul/Uraian</th>
                          <th>Tahun</th>
                          <th>Detail</th>
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
                          <td><?= $row->kode_klasifikasi; ?></td>
                          <td><?= $row->jenis_media.", ".$row->uraian; ?></td>
                          <td><?= $row->tahun_terbit; ?></td>
                          <td><?= $row->deskripsi; ?></td>
                          <td><a href="<?= base_url('document/detail/').$row->dap_id; ?>" class="btn-success">Detail</a></td>
                      </tr>

                      <?php
                    }

                    ?>
                
                  </tbody>
                  <tfoot>
                          <th>ID</th>
                          <th>Klasifikasi</th>
                          <th>Judul/Uraian</th>
                          <th>Tahun</th>
                          <th>Detail</th>
                          <th>Aksi</th>
                  </tfoot>
              </table>
          </body>
              </div>
              <div class="card-footer">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-history"></i> Update 3 menit yang lalu
                  </div>
              </div>
            </div>
          </div>
        </div>
        
    
    </div>
</section>

    <?php include_once "parsial/footer.php"; ?>
  

</html>

<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
</script>