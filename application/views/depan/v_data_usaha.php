
  <!--============================= HEADER =============================-->
  <?php include_once "parsial/header.php"; ?>
<!--//END HEADER -->

<!--//END HEADER -->


<section class="our_courses">
    <div class="container" style="margin-top:-80px">
      <?php include_once "parsial/summary_usaha.php"; ?>
        
   
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title"> Datasheet</h5>
                <p class="card-category">Data Usaha Lokal Se-Provinsi Nusa Tenggara Barat</p>
              </div>
              <div class="card-body ">
                <table class="table table-striped" id="display">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kabupaten</th>
                      <th>Jumlah</th>
                      <th style="text-align:right;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      foreach ($data as $row):
                    ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $row->kabupaten;?></td>
                      <td><?php echo $row->jml;?></td>
                      <td style="text-align:right;"><a href="<?php echo site_url('datausaha/daftar?kab='.$row->kabupaten);?>" class="btn btn-info">Lihat Daftar</a></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-history"></i> Update <?= timeago($last_update->created_at) ?>
                  </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Grafik Kabupaten</h5>
                <!-- <p class="card-category">Sebaran Data Per</p> -->
              </div>
              <div class="card-body ">
                <canvas id="myChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Update <?= timeago($last_update->created_at) ?>
                </div>
              </div>
            </div>
          </div>
        </div>
          
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Grafik Jenis Usaha</h5>
              </div>
              <div class="card-body ">
                <canvas id="chartJenisUsaha" width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Update <?= timeago($last_update->created_at) ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>

    <?php include_once "parsial/footer.php"; ?>
  

</html>
<?php foreach ($data as $key => $value) {
  $kabupaten[] = $value->kabupaten;
  $jumlah[] = $value->jml;
  
}?>
<script src="<?php echo base_url().'assets1/js/plugins/chartjs.min.js'?>"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=  json_encode($kabupaten)?>,
        datasets: [{
            label: 'Jumlah Data Usaha',
            data: <?= json_encode($jumlah)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var juChart = document.getElementById('chartJenisUsaha').getContext('2d');
var myChart = new Chart(juChart, {
    type: 'bar',
    data: {
        labels: <?=  json_encode($label_grafik_jenis_usaha)?>,
        datasets: [{
            label: 'Jumlah Data Usaha',
            data: <?= json_encode($value_grafik_jenis_usaha)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>