
  <!--============================= HEADER =============================-->
  <?php include_once "parsial/header.php"; ?>
<!--//END HEADER -->

<!--//END HEADER -->


<section class="our_courses">
    <div class="container" style="margin-top:-80px"> 
        
    <div class="row">
    <!-- AGROBISNIS -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8"> 
                    <div class="numbers">
                      <p class="card-category">Agrobisnis</p>
                      <p class="card-title"><?= $tot_agro; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <?php foreach ($agro->result() as $row) :?>
                <div class="stats">
                  <i class="fa fa-check"></i>
                  <?php echo $row->nama_sub;?>
                </div>
              
                <?php endforeach;?>
              </div>
            </div>
          </a>
    <!-- Produk Tekstil & Fashion  -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-app text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Produk Tekstil & Fashion </p>
                      <p class="card-title"><?= $tot_mesin; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($produk->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>
   
    <!-- Kesehatan & Kecantikan  -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-app text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Kesehatan & Kecantikan </p>
                      <p class="card-title"><?= $tot_kesehatan; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <?php foreach ($kesehatan->result() as $row) :?>
                <div class="stats">
                  <i class="fa fa-check"></i>
                  <?php echo $row->nama_sub;?>
                </div>
              
                <?php endforeach;?>
              </div>
            </div>
          </a>

    <!-- Furnitur Dan Peralatan Rumah Tangga -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Furnitur dan Peralatan Rumah Tangga </p>
                      <p class="card-title"><?= $tot_furnitur; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($furnitur->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>
    <!-- Perlengkapan Kantor & Sekolah  -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-ruler-pencil text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Perlengkapan Kantor & Sekolah  </p>
                      <p class="card-title"><?= $tot_perlengkapan; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($perlengkapan->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>
    <!-- Kerajinan & Souvenir  -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-palette text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Kerajinan & Souvenir </p>
                      <p class="card-title"><?= $tot_kerajinan; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($kerajinan->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>
    <!-- Olahan Makanan Dan Minuman  -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-bullet-list-67 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Olahan Makanan dan Minuman </p>
                      <p class="card-title"><?= $tot_olahan; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($olahan->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>
    <!-- Otomotif & Transportasi   -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-bus-front-12 text-secondary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Otomotif & Transportasi  </p>
                      <p class="card-title"><?= $tot_otomotif; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($otomotif->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- Properti & Konstruksi  -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-bank text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Properti & Konstruksi </p>
                      <p class="card-title"><?= $tot_properti; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($properti->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>
          
    <!-- Mesin & Alat Industri  -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-tag-content text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Mesin & Alat Industri </p>
                      <p class="card-title"><?= $tot_mesin; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <?php foreach ($mesin->result() as $row) :?>
                <div class="stats">
                  <i class="fa fa-check"></i>
                  <?php echo $row->nama_sub;?>
                </div>
              
                <?php endforeach;?>
              </div>
            </div>
          </a>

    <!-- Jasa -->
          <a href="#" class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Jasa</p>
                      <p class="card-title"><?= $tot_jasa; ?><p>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <?php foreach ($jasa->result() as $row) :?>
                    <div class="stats">
                      <i class="fa fa-check"></i>
                      <?php echo $row->nama_sub;?>
                    </div>
                  
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
          </a>
   

    
    
   
    <!-- Tables -->
        </div>
  
    </div>
</section>



    <!--============================= FOOTER =============================-->
    <?php include_once "parsial/footer.php"; ?>
  

</html>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Lombok Timur', 'Lombok Tengah', 'Lombok Barat', 'Mataram', 'Sumbawa', 'Bima'],
        datasets: [{
            label: 'Lombok Timur',
            data: [12, 19, 3, 5, 2, 3],
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