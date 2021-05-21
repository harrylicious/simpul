<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIMPUL - Sistem Informasi Manajemen & Pemetaan Usaha Lokal</title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons-min.css'?>">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick-min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick-theme-min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url().'assets1/css/paper-dashboard.min.css?v=2.0.1'?>">
    
    <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url().'theme/css/jssocials-min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'theme/css/jssocials-theme-flat-min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'theme/css/style1-min.css'?>" rel="stylesheet">

    <style>
        .my-card
        {
            position:absolute;
            left:40%;
            top:-20px;
            border-radius:50%;
        }
        a.custom-card,
        a.custom-card:hover {
            color: inherit;
        }

        .search {
            width: 100%;
            position: relative;
            display: flex;
        }
        .searchTerm:focus{
            color: #007BFF;
        }

        .searchTerm {
            width: 100%;
            border: 3px solid #007BFF;
            border-right: none;
            padding: 5px;
            height: 36px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #007BFF;
        }

        .searchButton {
            width: 40px;
            height: 36px;
            border: 1px solid #007BFF;
            background: #007BFF;
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        .nav-item.active a {
            color: #fff !important;
            background: #007BFF;
            border-radius: 3px;
        }
    </style>
    <?php
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    ?>

</head>

<body>
    <div class="header-topbar" style="background:#007BFF">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-8 col-md-9">
                    <div class="header-top_address">
                        <div class="header-top_list">
                            <span style="color:white;" class="icon-phone"></span>(0370) 633736
                        </div>
                        <div class="header-top_list">
                            <span  style="color:white;" class="icon-envelope-open"></span>info@simpul.id
                        </div>
                        <div class="header-top_list">
                            <span  style="color:white;" class="icon-location-pin"></span>Mataram, NTB
                        </div>
                    </div>
                    <div class="header-top_login2">
                        <a href="<?php echo site_url('contact');?>">Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="header-top_login mr-sm-3">
                    <span style="color:white;" class="icon-user"></span>
                        <a href="<?php echo site_url('contact');?>">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-toggle="affix">
        <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded mb-0">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" style="padding: unset; margin-top: 25px !important;">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="150px;" src="<?php echo base_url().'assets/images/logo.png'?>"></a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item <?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?php echo site_url('');?>">Home</a>
                                </li>
                                <li class="nav-item <?= $this->uri->segment(1) == 'datausaha' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?php echo site_url('datausaha');?>">Datasheet</a>
                                </li>
                                <li class="nav-item <?= $this->uri->segment(1) == 'kategoriusaha' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?php echo site_url('kategoriusaha');?>">Kategori Usaha</a>
                                </li>
                                <li class="nav-item <?= $this->uri->segment(1) == 'produk' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?php echo site_url('produk');?>">Produk</a>
                                </li>
                                <li class="nav-item <?= $this->uri->segment(1) == 'maps' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?php echo site_url('maps');?>">Maps</a>
                                </li>
                               
                                <li>
                                    <form action="<?php echo base_url().'search' ?>" method='POST'>
                                        <div class="wrap">
                                            <div class="search">
                                                <input type="text" name="cari" class="searchTerm" placeholder="search .......">
                                                <button type="submit" class="searchButton">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                               
                                </li>
                             </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>