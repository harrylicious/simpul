<?php include_once "parsial/header.php"; ?>

<?php
    $kab = isset($_GET['kab']) ? $_GET['kab'] : '';
    $param_kec = isset($_GET['kec']) ? str_replace(['%20','+'], ' ', $_GET['kec']) : '';
    $param_ju = isset($_GET['jenis_usaha']) ? str_replace(['%20','+'], ' ', $_GET['jenis_usaha']) : '';
?>

<section class="our_courses">
    <div class="container" style="margin-top:-80px">
        <?php include_once "parsial/summary_usaha.php"; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title"> Datasheet Usaha <strong><?php echo $kab; ?></strong></h5>
                        <p class="card-category">Data Usaha Lokal Se-Provinsi Nusa Tenggara Barat</p>
                        <form action="" method="get" accept-charset="utf-8">
                            <input type="hidden" class="d-none" name="kab" value="<?= $kab ?>"/>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="text-muted mb-1">Kecamatan</label>
                                        <select class="form-control" name="kec">
                                            <option value="">Semua Kecamatan</option>
                                            <?php foreach($kecamatan as $kec): ?>
                                                <option value="<?= $kec->nama ?>" <?= $kec->nama == $param_kec ? 'selected' : '' ?>><?= $kec->nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="text-muted mb-1">Jenis Usaha</label>
                                        <select class="form-control" name="jenis_usaha">
                                            <option value="">Semua Jenis Usaha</option>
                                            <?php foreach($jenis_usaha as $ju): ?>
                                                <option value="<?= $ju->keterangan ?>" <?= $ju->keterangan == $param_ju ? 'selected' : '' ?>><?= $ju->keterangan ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-md-4 w-100">Tampilkan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card-body ">
                        <div class="table-responsive" style="overflow: auto;">
                            <table class="table table-striped datatable" style="width: 100%" id="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Usaha</th>
                                        <th>Tahun Berdiri</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
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
<script src="<?= base_url('assets/vendor/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url().'theme/js/dataTables.bootstrap4.min.js'?>"></script>
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
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('datausaha/datatables/' . $kab . '?kecamatan=' . $param_kec . '&jenis_usaha=' . $param_ju) ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'nama_usaha'},
                    {data: 'tahun_berdiri'},
                    {data: 'desa'},
                    {data: 'kecamatan'},
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