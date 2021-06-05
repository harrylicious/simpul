<?php

error_reporting(0);


function get_total_kode_by_kode_dan_kabupaten($kode, $wilayah)
{
  if ($kode != "RT") {
    $query = "SELECT COUNT(*) as total FROM data_documents WHERE kode_klasifikasi like '%$kode%' AND wilayah='$wilayah'";
  } else {

    $query = "SELECT COUNT(*) as total FROM data_documents WHERE substr(kode_klasifikasi, 1, 2) = '$kode' AND wilayah='$wilayah'";
  }

  $ci = &get_instance();
  $cek = $ci->db->query($query);
  $cek = $cek->row_array();
  return $cek;
}


function get_total_jenis_by_kode_dan_kabupaten($jenis, $wilayah)
{
  $query = "SELECT COUNT(*) as total FROM data_documents WHERE jenis='$jenis' AND wilayah='$wilayah'";
  $ci = &get_instance();
  $cek = $ci->db->query($query);
  $cek = $cek->row_array();
  return $cek;
}


function get_total_status_aktif_by_kode_dan_kabupaten($status, $wilayah)
{
  $query = "SELECT *FROM jml_document_aktif WHERE wilayah='$wilayah'";
  $ci = &get_instance();
  $cek = $ci->db->query($query);
  $cek = $cek->row_array();
  return $cek;
}

function get_total_status_inaktif_by_kode_dan_kabupaten($status, $wilayah)
{
  $query = "SELECT *FROM jml_document_inaktif WHERE wilayah='$wilayah'";
  $ci = &get_instance();
  $cek = $ci->db->query($query);
  $cek = $cek->row_array();
  return $cek;
}

function get_total_nasib_by_kode_dan_kabupaten($nasib, $wilayah)
{
  $query = "SELECT COUNT(*) as total FROM data_documents WHERE nasib_akhir='$nasib' AND wilayah='$wilayah'";
  $ci = &get_instance();
  $cek = $ci->db->query($query);
  $cek = $cek->row_array();
  return $cek;
}




?>
<!--============================= HEADER =============================-->
<?php include_once "parsial/header.php";
?>
<!--//END HEADER -->
<div class="p-5 mb-0" style="background: rgba(137, 3, 0, 0);"></div>

<style>
  tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
  }
</style>

<!--//END HEADER -->


<div class="container">
  <?php include_once "parsial/summary_doc.php"; ?>


  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title"> REKAP <strong>KLASIFIKASI</strong></h5>
        </div>
        <div class="card-body ">

          <body>
            <table id="dtHorizontalExample" class="display" style="width:100%">
              <thead class="bg-orange">
                <tr>
                  <th>KLASIFIKASI</th>
                  <th>NTB</th>
                  <th>Kota Mataram</th>
                  <th>Lombok Barat</th>
                  <th>Lombok Utara</th>
                  <th>Lombok Tengah</th>
                  <th>Lombok Timur</th>
                  <th>Sumbawa Barat</th>
                  <th>Sumbawa</th>
                  <th>Dompu</th>
                  <th>Bima</th>
                  <th>Kota Bima</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>
                <?php


                foreach ($kode_klasifikasi as $row) {

                  $kode_ntb = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Provinsi NTB");
                  $kota_mataram = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kota Mataram");
                  $lombok_barat = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Lombok Barat");
                  $lombok_tengah = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Lombok Tengah");
                  $lombok_timur = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Lombok Timur");
                  $lombok_utara = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Lombok Utara");
                  $sumbawa = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Sumbawa");
                  $sumbawa_barat = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Sumbawa Barat");
                  $dompu = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Dompu");
                  $bima = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kabupaten Bima");
                  $kota_bima = get_total_kode_by_kode_dan_kabupaten($row->kode_cut, "Kota Bima");

                  $total_berd_kode = $kode_ntb['total'] + $kota_mataram['total'] + $lombok_barat['total'] + $lombok_utara['total'] + $lombok_tengah['total'] +
                    $lombok_timur['total'] + $sumbawa['total'] + $sumbawa_barat['total'] + $dompu['total'] +
                    +$bima['total'] + $kota_bima['total'];





                ?>
                  <tr>
                    <td><b><?= $row->kode . "</b>" . " (" . "<span style='font-size: 12px'>" . $row->keterangan . "<span>" . ")"; ?></td>
                    <td><?= $kode_ntb['total']; ?></td>
                    <td><?= $kota_mataram['total']; ?></td>
                    <td><?= $lombok_barat['total']; ?></td>
                    <td><?= $lombok_utara['total']; ?></td>
                    <td><?= $lombok_tengah['total']; ?></td>
                    <td><?= $lombok_timur['total']; ?></td>
                    <td><?= $sumbawa_barat['total']; ?></td>
                    <td><?= $sumbawa['total']; ?></td>
                    <td><?= $dompu['total']; ?></td>
                    <td><?= $bima['total']; ?></td>
                    <td><?= $kota_bima['total']; ?></td>
                    <td><b><?= $total_berd_kode; ?></b></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </body>
        </div>

      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title"> REKAP <strong>JENIS</strong></h5>
        </div>
        <div class="card-body ">

          <body>

            <table id="dtHorizontalExample2" class="display" style="width:100%">
              <thead class="bg-orange">
                <tr>
                  <th>KLASIFIKASI</th>
                  <th>NTB</th>
                  <th>Kota Mataram</th>
                  <th>Lombok Barat</th>
                  <th>Lombok Utara</th>
                  <th>Lombok Tengah</th>
                  <th>Lombok Timur</th>
                  <th>Sumbawa Barat</th>
                  <th>Sumbawa</th>
                  <th>Dompu</th>
                  <th>Bima</th>
                  <th>Kota Bima</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>
                <!--JENIS MEDIA-->
                <?php
                foreach ($jenis_media as $row) {
                  $kode_ntb = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Provinsi NTB");
                  $kota_mataram = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kota Mataram");
                  $lombok_barat = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Barat");
                  $lombok_tengah = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Tengah");
                  $lombok_timur = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Timur");
                  $lombok_utara = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Utara");
                  $sumbawa = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa");
                  $sumbawa_barat = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa Barat");
                  $dompu = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Dompu");
                  $bima = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kabupaten Bima");
                  $kota_bima = get_total_jenis_by_kode_dan_kabupaten($row->nama, "Kota Bima");

                  $total_berd_jenis = $kode_ntb['total'] + $kota_mataram['total'] + $lombok_barat['total'] + $lombok_utara['total'] + $lombok_tengah['total'] +
                    $lombok_timur['total'] + $sumbawa['total'] + $sumbawa_barat['total'] + $dompu['total'] +
                    +$bima['total'] + $kota_bima['total'];



                ?>
                  <tr>
                    <td><?= $row->nama; ?></td>
                    <td><?= $kode_ntb['total']; ?></td>
                    <td><?= $kota_mataram['total']; ?></td>
                    <td><?= $lombok_barat['total']; ?></td>
                    <td><?= $lombok_utara['total']; ?></td>
                    <td><?= $lombok_tengah['total']; ?></td>
                    <td><?= $lombok_timur['total']; ?></td>
                    <td><?= $sumbawa_barat['total']; ?></td>
                    <td><?= $sumbawa['total']; ?></td>
                    <td><?= $dompu['total']; ?></td>
                    <td><?= $bima['total']; ?></td>
                    <td><?= $kota_bima['total']; ?></td>
                    <td><b><?= $total_berd_jenis; ?></b></td>
                  </tr>

                <?php } ?>

                <!-- JENIS MEDIA -->

              </tbody>
            </table>

          </body>
        </div>

      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title"> REKAP <strong>RETENSI</strong></h5>
        </div>
        <div class="card-body ">

          <body>
            <table id="dtHorizontalExample3" class="display" style="width:100%">
              <thead class="bg-orange">
                <tr>
                  <th>KLASIFIKASI</th>
                  <th>NTB</th>
                  <th>Kota Mataram</th>
                  <th>Lombok Barat</th>
                  <th>Lombok Utara</th>
                  <th>Lombok Tengah</th>
                  <th>Lombok Timur</th>
                  <th>Sumbawa Barat</th>
                  <th>Sumbawa</th>
                  <th>Dompu</th>
                  <th>Bima</th>
                  <th>Kota Bima</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>

                <!--RETENSI-->
                <?php
                foreach ($retensi as $row) {
                  $status = $row->nama;
                  $kode_ntb = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Provinsi NTB");
                  $kota_mataram = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kota Mataram");
                  $lombok_barat = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Barat");
                  $lombok_tengah = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Tengah");
                  $lombok_timur = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Timur");
                  $lombok_utara = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Utara");
                  $sumbawa = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa");
                  $sumbawa_barat = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa Barat");
                  $dompu = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Dompu");
                  $bima = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Bima");
                  $kota_bima = get_total_status_aktif_by_kode_dan_kabupaten($row->nama, "Kota Bima");

                  $total_berd_retensi = $kode_ntb['total'] + $kota_mataram['total'] + $lombok_barat['total'] + $lombok_utara['total'] + $lombok_tengah['total'] +
                    $lombok_timur['total'] + $sumbawa['total'] + $sumbawa_barat['total'] + $dompu['total'] +
                    +$bima['total'] + $kota_bima['total'];

                  if ($status == "AKTIF") {



                ?>
                    <tr>
                      <td><?= $row->nama; ?></td>
                      <td><?= $kode_ntb['total']; ?></td>
                      <td><?= $kota_mataram['total']; ?></td>
                      <td><?= $lombok_barat['total']; ?></td>
                      <td><?= $lombok_utara['total']; ?></td>
                      <td><?= $lombok_tengah['total']; ?></td>
                      <td><?= $lombok_timur['total']; ?></td>
                      <td><?= $sumbawa_barat['total']; ?></td>
                      <td><?= $sumbawa['total']; ?></td>
                      <td><?= $dompu['total']; ?></td>
                      <td><?= $bima['total']; ?></td>
                      <td><?= $kota_bima['total']; ?></td>
                      <td><b><?= $total_berd_retensi; ?></b></td>
                    </tr>

                <?php }
                } ?>

                <!-- RETENSI -->

                <!--RETENSI-->
                <?php
                foreach ($retensi as $row) {
                  $status = $row->nama;
                  $kode_ntb = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Provinsi NTB");
                  $kota_mataram = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kota Mataram");
                  $lombok_barat = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Barat");
                  $lombok_tengah = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Tengah");
                  $lombok_timur = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Timur");
                  $lombok_utara = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Utara");
                  $sumbawa = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa");
                  $sumbawa_barat = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa Barat");
                  $dompu = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Dompu");
                  $bima = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kabupaten Bima");
                  $kota_bima = get_total_status_inaktif_by_kode_dan_kabupaten($row->nama, "Kota Bima");

                  $total_berd_retensi = $kode_ntb['total'] + $kota_mataram['total'] + $lombok_barat['total'] + $lombok_utara['total'] + $lombok_tengah['total'] +
                    $lombok_timur['total'] + $sumbawa['total'] + $sumbawa_barat['total'] + $dompu['total'] +
                    +$bima['total'] + $kota_bima['total'];

                  if ($status == "INAKTIF") {

                ?>
                    <tr>
                      <td><?= $row->nama; ?></td>
                      <td><?= $kode_ntb['total']; ?></td>
                      <td><?= $kota_mataram['total']; ?></td>
                      <td><?= $lombok_barat['total']; ?></td>
                      <td><?= $lombok_utara['total']; ?></td>
                      <td><?= $lombok_tengah['total']; ?></td>
                      <td><?= $lombok_timur['total']; ?></td>
                      <td><?= $sumbawa_barat['total']; ?></td>
                      <td><?= $sumbawa['total']; ?></td>
                      <td><?= $dompu['total']; ?></td>
                      <td><?= $bima['total']; ?></td>
                      <td><?= $kota_bima['total']; ?></td>
                      <td><b><?= $total_berd_retensi; ?></b></td>
                    </tr>

                <?php }
                } ?>

                <!-- RETENSI -->


              </tbody>
            </table>
          </body>
        </div>

      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title"> REKAP <strong>NASIB AKHIR</strong></h5>
        </div>
        <div class="card-body ">

          <body>
            <table id="dtHorizontalExample4" class="display" style="width:100%">
              <thead class="bg-orange">
                <tr>
                  <th>KLASIFIKASI</th>
                  <th>NTB</th>
                  <th>Kota Mataram</th>
                  <th>Lombok Barat</th>
                  <th>Lombok Utara</th>
                  <th>Lombok Tengah</th>
                  <th>Lombok Timur</th>
                  <th>Sumbawa Barat</th>
                  <th>Sumbawa</th>
                  <th>Dompu</th>
                  <th>Bima</th>
                  <th>Kota Bima</th>
                  <th>Total</th>
                </tr>
              </thead>

              <tbody>
                <!--NASIB AKHIR-->
                <?php
                foreach ($nasib_akhir as $row) {
                  $kode_ntb = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Provinsi NTB");
                  $kota_mataram = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kota Mataram");
                  $lombok_barat = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Barat");
                  $lombok_tengah = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Tengah");
                  $lombok_timur = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Timur");
                  $lombok_utara = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Lombok Utara");
                  $sumbawa = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa");
                  $sumbawa_barat = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Sumbawa Barat");
                  $dompu = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Dompu");
                  $bima = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kabupaten Bima");
                  $kota_bima = get_total_nasib_by_kode_dan_kabupaten($row->nama, "Kota Bima");

                  $total_berd_nasib = $kode_ntb['total'] + $kota_mataram['total'] + $lombok_barat['total'] + $lombok_utara['total'] + $lombok_tengah['total'] +
                    $lombok_timur['total'] + $sumbawa['total'] + $sumbawa_barat['total'] + $dompu['total'] +
                    +$bima['total'] + $kota_bima['total'];


                ?>
                  <tr>
                    <td><?= $row->nama; ?></td>
                    <td><?= $kode_ntb['total']; ?></td>
                    <td><?= $kota_mataram['total']; ?></td>
                    <td><?= $lombok_barat['total']; ?></td>
                    <td><?= $lombok_utara['total']; ?></td>
                    <td><?= $lombok_tengah['total']; ?></td>
                    <td><?= $lombok_timur['total']; ?></td>
                    <td><?= $sumbawa_barat['total']; ?></td>
                    <td><?= $sumbawa['total']; ?></td>
                    <td><?= $dompu['total']; ?></td>
                    <td><?= $bima['total']; ?></td>
                    <td><?= $kota_bima['total']; ?></td>
                    <td><b><?= $total_berd_nasib; ?></b></td>
                  </tr>

                <?php } ?>

                <!-- NASIB AKHIR -->

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


<script>
  $(document).ready(function() {
    $('#dtHorizontalExample2').DataTable({
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


<script>
  $(document).ready(function() {
    $('#dtHorizontalExample3').DataTable({
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


<script>
  $(document).ready(function() {
    $('#dtHorizontalExample4').DataTable({
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