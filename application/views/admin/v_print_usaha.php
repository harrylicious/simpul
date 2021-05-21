<html>
<head>
    <title><?= $usaha->nama_usaha ?> - Cetak</title>
    <style>
        body {
            font-family: arial;
            font-size: 10px;
            margin: 0;
        }

        h2 {
            font-size: 25px;;
        }

        @page {
            margin: 0.5cm;
        }

        body table {
            font-size: 14px;
        }

        body table.border-table, .border-table tr td {
            border-collapse: collapse;
            border-radius: 5px;
            width:100%
        }
        body table.border-table, .border-table tr td {
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 5px;
            padding: 10px
        }

        table tr td {
            padding: 5px
        }

        .border {
            border: 1px solid rgba(0,0,0,.125);
            padding:10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center"><?= $usaha->nama_usaha ?></h2>
    <table style="width: 100%">
        <tr>
            <td width="25%" valign="top">
                <img src="<?= $usaha->gambar == '0' ? base_url('assets/images/logo_default.png') : base_url('assets/images/gambar/' . $usaha->gambar) ?>" style="margin-bottom: 20px;border: 1px solid rgba(0,0,0,.125); max-width:100%" />
                <table class="border-table" style="margin-bottom: 20px">
                    <tr>
                        <td>Rangkuman</td>
                    </tr>
                    <tr>
                        <td><b>Tahun Berdiri : </b> <?= $usaha->tahun_berdiri ?></td>
                    </tr>
                    <tr>
                        <td><b>Nilai Investasi : </b> <?= $usaha->nilai_investasi ?></td>
                    </tr>
                    <tr>
                        <td><b>Nilai Produksi : </b> <?= $usaha->nilai_produksi ?></td>
                    </tr>
                    <tr>
                        <td><b>Nilai Bahan Baku : </b> <?= $usaha->nilai_bahan_baku ?></td>
                    </tr>
                    <tr>
                        <td><b>Kapasitas Produksi : </b> <?= $usaha->kapasitas_produksi ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Unit Usaha : </b> <?= $usaha->jml_unit_usaha ?></td>
                    </tr>
                    <tr>
                        <td><b>Luas Lahan : </b> <?= $usaha->luas_lahan ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Anggota : </b> <?= $usaha->jml_anggota ?></td>
                    </tr>
                </table>
                <table class="border-table" style="margin-bottom: 20px">
                    <tr>
                        <td>Link</td>
                    </tr>
                    <tr>
                        <td><b>Website : </b> <?= $usaha->website == '0' ? '' : $usaha->website ?></td>
                    </tr>
                </table>
            </td>
            <td valign="top">
                <table width="100%">
                    <tr>
                        <td>Jenis Usaha</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="border"><?= $usaha->jenis_usaha ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="border"><?= $usaha->alamat ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:0; padding-right:0">
                            <div>
                                <table width="100%">
                                    <tr>
                                        <td><div class="border"><?= $usaha->desa ?> </div></td>
                                        <td><div class="border"><?= $usaha->kecamatan ?> </div></td>
                                        <td><div class="border"><?= $usaha->kabupaten ?> </div></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <?php if (!$usaha->komoditas == ''): ?>
                        <tr>
                            <td>Komoditas</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="border"><?= $usaha->komoditas ?></div>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if (!$usaha->status_kepemilikan == ''): ?>
                        <tr>
                            <td>Status Kepemilikan</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="border"><?= $usaha->status_kepemilikan ?></div>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if (!$usaha->kepemilikan_tempat == ''): ?>
                        <tr>
                            <td>Kepemilikan Tempat</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="border"><?= $usaha->kepemilikan_tempat ?></div>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if (!$usaha->kepemilikan_koperasi == ''): ?>
                        <tr>
                            <td>Kepemilikan Koperasi</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="border"><?= $usaha->kepemilikan_koperasi ?></div>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if (!$usaha->sumber_modal == ''): ?>
                        <tr>
                            <td>Sumber Modal</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="border"><?= $usaha->sumber_modal ?></div>
                            </td>
                        </tr>
                    <?php endif ?>

                    <tr>
                        <td>Legalitas (Kelengkapan Izin)</td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <table class="border-table" style="margin-bottom: 20px">
                                <tr>
                                    <td><b>Nomor Induk Berusaha (NIB) : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>Surat Keterangan Domisili Usaha (SKDU) : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>Nomor Pokok Wajib Pajak (NPWP) : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>Izin Usaha Dagang (UD) : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>HO (Surat izin gangguan) : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>Izin Mendirikan Bangunan (IMB) : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>Izin BPOM : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>Izin PIRT : </b> </td>
                                </tr>
                                <tr>
                                    <td><b>Izin Lingkungan : </b> </td>
                                </tr>
                            </table>
                        </td>
                    </tr> -->
                    <tr>
                        <td>Riwayat Bantuan</td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <table class="border-table" style="margin-bottom: 20px">
                                <tr>
                                    <td><b>(2016) Dinas Perdagangan Provinsi (Fasilitas)</b> </td>
                                </tr>
                            </table>
                        </td>
                    </tr> -->
                    <tr>
                        <td>Produk</td>
                    </tr>
                    <tr>
                        <td>
                            <table class="border-table" style="margin-bottom: 20px">
                                <?php foreach ($produk->result() as $row) :?>
                                    <tr>
                                        <td><b><?= $row->nama_produk ?></b> </td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>