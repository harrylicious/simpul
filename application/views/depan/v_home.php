

<?php include_once "parsial/header.php"; ?>
<section> 
    <div class="slider_img layout_three">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block" src="<?php echo base_url().'theme/images/slide-1.jpg'?>" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Database Terpadu</h1>
                            <h4>Bagi kami kreativitas merupakan gerbang masa depan.<br> kreativitas akan mendorong inovasi. <br></h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('artikel');?>" class="btn btn-red">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="<?php echo base_url().'theme/images/slide-2.jpg'?>" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Realtime</h1>
                            <h4>Data terupdate secara nyata dalam waktu konstan.<br>Terperbaharui secara langsung.</h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('guru');?>" class="btn btn-red">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="<?php echo base_url().'theme/images/slide-3.jpg'?>" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>SIMPUL Datasheet</h1>
                            <h4>Kumpulan data UMKM/IKM se-provinsi NTB.<br> </h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('galeri');?>" class="btn btn-red">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section class="clearfix about about-style2">
    <div class="container">
        <div class="row">
            <?php foreach ($sambutan->result() as $row) :?>
            <div class="col-md-8">
               <h2><?php echo $row->tulisan_judul;?></h2>
               <p><?php echo $row->tulisan_isi;?></p>

            </div>
            <div class="col-md-4">
                <img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" class="img-fluid about-img" alt="#">
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<section class="clearfix about about-style2" style="margin-top: -50px">
    <div class="container">
        <hr/>

        <div class="jumbotron">
            <div class="row w-100">
            
                    <a href="<?php echo site_url('produk/');?>" class="col-md-2" style="padding:0px" href="#">
                        <div class="card border-info mx-sm-1 p-3">
                            <div class="card danger-info shadow text-info p-3 my-card" ><span class="fa fa-bookmark-o" aria-hidden="true"></span></div>
                            <div class="text-info text-center mt-3"><h4>Agribisnis <span style="color:#FFF">Yuhuhuuuu</span> </h4></div>
                            <div class="text-info text-center mt-2"><h3><?php echo $tot_agribisnis; ?></h3></div>
                        </div>
                    </a>
                    <a href="<?php echo site_url('produk/');?>" class="col-md-2" style="padding:0px" href="#">
                        <div class="card border-success mx-sm-1 p-3">
                            <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                            <div class="text-success text-center mt-3"><h4>Mesin & Alat Industri </h4></div>
                            <div class="text-success text-center mt-2"><h3><?php echo $tot_mesin; ?></h3></div>
                        </div>
                    </a>
                    <a href="<?php echo site_url('produk/');?>" class="col-md-2" style="padding:0px" href="#">
                        <div class="card border-danger mx-sm-1 p-3">
                            <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                            <div class="text-danger text-center mt-3"><h4>Kesehatan & Kecantikan </h4></div>
                            <div class="text-danger text-center mt-2"><h3><?php echo $tot_kesehatan; ?></h3></div>
                        </div>
                    </a>
                    <a href="<?php echo site_url('produk/');?>" class="col-md-2" style="padding:0px" href="#">
                        <div class="card border-warning mx-sm-1 p-3">
                            <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                            <div class="text-warning text-center mt-3"><h4>Kerajinan & Souvenir </h4></div>
                            <div class="text-warning text-center mt-2"><h3><?php echo $tot_agribisnis;?></h3></div>
                        </div>
                    </a>
                    <a href="<?php echo site_url('produk/');?>" class="col-md-2" style="padding:0px" href="#">
                        <div class="card border-danger mx-sm-1 p-3">
                            <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                            <div class="text-danger text-center mt-3"><h4>Produk Tekstil & Fashion </h4></div>
                            <div class="text-danger text-center mt-2"><h3><?php echo $tot_agribisnis;?></h3></div>
                        </div>
                    </a>
                    <a href="<?php echo site_url('produk/');?>" class="col-md-2" style="padding:0px" href="#">
                        <div class="card border-warning mx-sm-1 p-3">
                            <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                            <div class="text-warning text-center mt-3"><h4 style="margin-top:55px">Jasa<p></p></span></h4></div>
                            <div class="text-warning text-center mt-2"><h3><?php echo $tot_agribisnis;?></h3></div>
                        </div>
                    </a>
                    
            </div><br>
            <div class="row">
            <div class="col-md-12 text-center">
                <a href="kategoriusaha" class="btn btn-default btn-courses">Selengkapnya</a>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="our_courses">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Produk Terbaru</h2> 
            </div>
        </div>
        <div class="row">
   
          <?php foreach ($produk->result() as $row) :?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="courses_box mb-4">
                    <div class="course-img-wrap">
                       <div class="card danger-info shadow text-info p-3 my-card" ><span class="fa fa-bookmark-o" aria-hidden="true"></span></div>     
                       <img src="<?= base_url('assets/images/products/thumbnail') . '/' . $row->photo; ?>" class="img-fluid" alt="<?= $row->nama_produk; ?>" style="object-fit:cover;object-position:center;o-object-fit:cover;o-bject-position:center;height:255px;width:100%" onerror="this.src='<?= base_url('assets/images/no-image.jpg') ?>'">
                    </div>
                    
                    <a href="<?php echo site_url('produk/'.$row->slug);?>" class="course-box-content">
                        <h4 style="text-align:center;text-style:bold"><b><?php echo $row->nama_produk; ?></b></h4>
                        <center><span class="badge badge-primary text-center"><?php echo $row->nama_usaha;?></span></center>
                    </a>
                 
                </div>
            </div>
          <?php endforeach;?>
        </div> <br>
        <div class="row">
            <div class="col-md-12 text-center">
                 <a href="<?php echo site_url('produk');?>" class="btn btn-default btn-courses">Selengkapnya</a>
            </div>
            
        </div>
    </div>
</section>

<section class="our_courses">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Usaha Lokal Terbaru</h2> 
            </div>
        </div>
        <div class="row">
   
          <?php foreach ($usaha->result() as $row) :?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="courses_box mb-4" style="min-height:184px">
                    <a href="<?php echo site_url('datausaha/detail/'.$row->id_usaha);?>" class="course-box-content">
                        <h4 style="text-align:center;text-style:bold; display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;white-space:unset" class="text-truncate"><b><?php echo $row->nama_usaha;?></b></h4>
                        <center><span class="badge badge-primary text-center"><?php echo $row->nama_usaha;?></span></center>
                    </a>
                </div>
            </div>
          <?php endforeach;?>
        </div> <br>
        <div class="row">
            <div class="col-md-12 text-center">
                 <a href="<?php echo site_url('datausaha');?>" class="btn btn-default btn-courses">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<div class="detailed_chart">
    <?php include_once "parsial/summary.php"; ?>
</div>

<?php include_once "parsial/footer.php"; ?>

<script>
$(document).ready(function(){

    load_data();

    function load_data(query)
    {
        $.ajax({
            url:"<?php echo base_url('ajaxsearch/fetch');?>",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#result').html(data);
            }
        })
    }

    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();
        }
    });
});
</script>
</script>