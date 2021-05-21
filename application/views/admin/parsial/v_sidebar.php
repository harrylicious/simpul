<section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li>
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/kategoriusaha'?>"><i class="fa fa-circle-o"></i>Kategori</a></li>
            <li><a href="<?php echo base_url().'admin/subkategoriusaha'?>"><i class="fa fa-circle-o"></i>Sub kategori</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="<?= base_url('penyusutan'); ?>">
            <i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/tulisan'?>"><i class="fa fa-list"></i> List Berita</a></li>
            <li><a href="<?php echo base_url().'admin/tulisan/add_tulisan'?>"><i class="fa fa-thumb-tack"></i> Post Berita</a></li>
            <li><a href="<?php echo base_url().'admin/kategori'?>"><i class="fa fa-wrench"></i> Kategori</a></li>
          </ul>
        </li>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>UMKM/IKM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/usaha'?>"><i class="fa fa-list"></i>Data UMKM/IKM</a></li>
            <li><a href="<?php echo base_url().'admin/addumkm'?>"><i class="fa fa-thumb-tack"></i>Tambah UMKM/IKM</a></li>
            <li><a href="<?php echo base_url().'admin/usaha/rangkuman'?>"><i class="fa fa-list"></i>Rangkuman UMKM/IKM</a></li>
          </ul>
        </li>
        <li>
        <li>
          <a href="<?php echo base_url().'admin/relawan'?>">
            <i class="fa fa-users"></i> <span>Relawan</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-basket"></i>
            <span>Usaha</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/produk'?>"><i class="fa fa-leaf"></i>Produk</a></li>
            <li><a href="<?php echo base_url().'admin/legalitas'?>"><i class="fa fa-gavel"></i>Legalitas</a></li>
            <li><a href="<?php echo base_url().'admin/bantuan'?>"><i class="fa fa-star-o"></i>Bantuan</a></li>
          </ul>
        </li>


       
        <!-- <li>
          <a href="<?php echo base_url().'admin/pengumuman'?>">
            <i class="fa fa-volume-up"></i> <span>Datasheet</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li> -->
        <!-- <li>
          <a href="<?php echo base_url().'admin/files'?>">
            <i class="fa fa-download"></i> <span>Maps</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Insight</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/insight'?>"><i class="fa fa-list"></i> List Insight</a></li>
            <li><a href="<?php echo base_url().'admin/insight/post_insight'?>"><i class="fa fa-thumb-tack"></i> Post Insight</a></li>
            <li><a href="<?php echo base_url().'admin/kategoriinsight'?>"><i class="fa fa-wrench"></i> Kategori</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-graduation-cap"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/siswa'?>"><i class="fa fa-users"></i> Data Siswa</a></li>
            <li><a href="#"><i class="fa fa-star-o"></i> Prestasi Siswa</a></li>

          </ul>
        </li> -->

        <!-- <li>
          <a href="<?php echo base_url().'admin/inbox'?>">
            <i class="fa fa-envelope"></i> <span>Setting</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>

 -->

      </ul>
    </section>