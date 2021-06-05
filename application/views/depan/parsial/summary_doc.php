<?php 
if (isset($semua['total'])) {
  $semua = $semua['total'];
}
else {
  $semua = 0;
}
if (isset($tekstual['total'])) {
  $teks = $tekstual['total'];
}
else {
  $teks = 0;
}
if (isset($audio['total'])) {
  $audio = $audio['total'];
}
else {
  $audio = 0;
}
if (isset($gambar['total'])) {
  $gambar = $gambar['total'];
}
else {
  $gambar = 0;
}
if (isset($alih_media['total'])) { 
  $alih_media = $alih_media['total'];
}
else {
  $alih_media = 0;
}
if (isset($aktif['total'])) {
  $aktif = $aktif['total'];
}
if (isset($inaktif['total'])) {
  $inaktif = $inaktif['total'];
}
?>
<div class="container  ">
    <div class="row mt-4 mb-4">
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4 ">
          <a href="<?php echo base_url('document/get_by_jenis/Tekstual'); ?>">
            <div class="card l-bg-cherry ">
                <div class="card-statistic-3 p-3">
                    <img class="card-icon card-icon-large" width="90px" src="<?= base_url('assets/images/icon_tekstual.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">PERTANIAN</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($teks) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4">
        <a href="<?php echo base_url('document/get_by_jenis/Gambar'); ?>">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-3">
                      <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_gambar.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">KEHUTANAN</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body ">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($gambar) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4" >
        <a href="<?php echo base_url('document/get_by_jenis/Audio Visual'); ?>">
            <div class="card l-bg-green-dark" >
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_audio_visual.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0  example text-nowrap">BUDIDAYA</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($audio) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4 ">
        <a href="<?php echo base_url('document/get_by_jenis/Alih Media'); ?>">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_alih_media.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example text-nowrap">PERTAMBANGAN</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($alih_media) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4">
        <a href="<?php echo base_url('document/get_by_aktif'); ?>">
            <div class="card l-bg-sgreen-dark">
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_aktif.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">JASA</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($aktif) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-sm-6 col-4">
          <a href="<?php echo base_url('document/get_by_inaktif'); ?>">
            <div class="card l-bg-black-dark">
                <div class="card-statistic-3 p-3">
                <img class="card-icon card-icon-large" width="83px" src="<?= base_url('assets/images/icon_inaktif.png'); ?>" alt="">
                    <div class="mb-0">
                        <h5 class="card-title mb-0 example">INDUSTRI</h5>
                    </div>
                    <div class="row align-items-center mb-0 d-flex">
                        <div class="card-body">
                            <h2 class="d-flex align-items-center mb-0 example">
                            <b><?php echo number_format($inaktif) ; ?></b>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        </div>
  </div>

