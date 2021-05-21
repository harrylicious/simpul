<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPUL-NTB | Daftar Usaha</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/logo.png'?>">
    <?php $this->load->view('admin/parsial/v_head'); ?>
    <?php
        $kab = isset($_GET['kab']) ? $_GET['kab'] : '';
        $kcmtn = isset($_GET['kecamatan']) ? $_GET['kecamatan'] : '';
        $ds = isset($_GET['desa']) ? $_GET['desa'] : '';
        $params_jenis_usaha = $this->input->get('jenis_usaha') ?? ''; 
        $params_komoditas = $this->input->get('komoditas') ?? ''; 
    ?>   
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/parsial/v_header'); ?>
        <aside class="main-sidebar">
            <?php $this->load->view('admin/parsial/v_sidebar'); ?>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Data profil usaha</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Usaha</a></li>
                    <li class="active">Data profil usaha</li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body" style="padding-top: 25px; padding-bottom: 25px">
                                <?= form_open(base_url('/admin/detailusaha/daftar'), 'method="get"') ?>
                                    
                                    <div class="col-sm-2">
                                        <label>Kabupaten</label>
                                        <select name="kabupaten" id="" class="form-control">
                                            <option value="">--Pilih Kabupaten--</option>
                                            <?php
                                                foreach ($kabupaten as $kbptn):
                                                    $kabupaten_selected = $this->input->get('kabupaten') ? $this->input->get('kabupaten') == $kbptn->kabupaten ? 'selected' : '' : '';

                                                    if($kbptn->kabupaten != ''):
                                            ?>
                                                        <option value="<?= $kbptn->kabupaten ?>" <?= $kabupaten_selected ?>><?= $kbptn->kabupaten ?></option>
                                            <?php
                                                    endif;
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan" id="" class="form-control">
                                            <option value="">--Pilih Kecamatan--</option>
                                            <?php 
                                                foreach ($kecamatan as $kec):
                                                    $kecamatan_selected = $this->input->get('kecamatan') ? $this->input->get('kecamatan') == $kec->kecamatan ? 'selected' : '' : '';

                                                    if($kec->kecamatan != ''):
                                            ?>
                                                        <option value="<?= $kec->kecamatan ?>" <?= $kecamatan_selected ?>><?= $kec->kecamatan ?></option>
                                            <?php
                                                    endif;
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Desa</label>
                                        <select name="desa" id="" class="form-control">
                                            <option value="">--Pilih Desa--</option>
                                            <?php
                                                foreach ($desa as $des):
                                                    $desa_selected = $this->input->get('desa') ? $this->input->get('desa') == $des->desa ? 'selected' : '' : '';

                                                    if($des->desa != ''):
                                            ?>
                                                        <option value="<?= $des->desa ?>" <?= $desa_selected ?>><?= $des->desa ?></option>
                                            <?php
                                                    endif;
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Jenis Usaha</label>
                                        <select name="jenis_usaha" id="" class="form-control">
                                            <option value="">--Pilih Jenis Usaha--</option>
                                            <?php
                                                foreach ($jenis_usaha as $ju):
                                                    $jenis_usaha_selected = $this->input->get('desa') ? $this->input->get('jenis_usaha') == $ju->jenis_usaha ? 'selected' : '' : '';

                                            ?>
                                                    <option value="<?= $ju->jenis_usaha ?>" <?= $jenis_usaha_selected ?>><?= $ju->jenis_usaha ?></option>
                                            <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Komoditas</label>
                                        <select name="komoditas" id="" class="form-control">
                                            <option value="">--Pilih Komoditas--</option>
                                            
                                            <?php
                                                foreach ($komoditas as $kmd):
                                                    $komoditas_selected = $this->input->get('komoditas') ? $this->input->get('komoditas') == $kmd->komoditas ? 'selected' : '' : '';

                                                    if($kmd->komoditas != ''):
                                            ?>
                                                        <option value="<?= $kmd->komoditas ?>" <?= $komoditas_selected ?>><?= $kmd->komoditas ?></option>
                                            <?php
                                                    endif;
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-primary" style="margin-top:24px"><i class="fa fa-filter"></i> Filter</button>
                                    </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-striped datatable" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nomer Izin Usaha</th>
                                            <th>Nama usaha</th>
                                            <th>Tahun </th>
                                            <th>Jenis usaha</th>
                                            <th>Kabupaten</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Alamat</th>
                                            <th style="text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('admin/parsial/v_footer')?>
    </div>
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script> -->
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
    <!-- page script -->

    <script>
        $(function(){
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };
        });
    </script>
    <script>
        $(function () {
            if ($('.datatable').length) {
                datatable = $('.datatable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": { 
                        "url": '<?=base_url('admin/detailusaha/datatables/'. $kab . '?kecamatan=' . $kcmtn . '&desa=' .$ds . '&jenis_usaha=' . $params_jenis_usaha . '&komoditas=' . $params_komoditas) ?>',
                        "type": "POST"
                    },
                    "columns": [
                        {data: null, width: 10, searchable: false},
                        {data: 'created_at'},
                        {data: 'no_izin'},
                        {data: 'nama_usaha'},
                        {data: 'tahun_berdiri'},
                        {data: 'jenis_usaha'},
                        {data: 'kabupaten'},
                        {data: 'kecamatan'},
                        {data: 'desa'},
                        {data: 'alamat'},
                        {data: 'action'}
                    ],
                    rowCallback: function (row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });

                $('.dataTables_filter').addClass('text-right')
            }
        });
    </script>
</body>
</html>