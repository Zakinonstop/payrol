<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Keuangan</title>
</head>

<body>
    <!-- <h1><?php echo $title ?></h1> -->
    <!-- <h2><?php echo $subtitle ?></h2> -->

    <br>
    <br>
    <hr>

    <table border="0" id="myTable" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>waktu masuk</th>
                                    <th>jabatan</th>
                                    <th>Gaji</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php

                                $no = 1;
                                foreach ($list as $data) {
                                    $tahun  = date('Y');
                                    $bulan  = date('m');
                                    $jumlah = 0;
                                    $stotal = 0;
                                    $absen  = $this->M_data->absenbulan($data->nip, $tahun, $bulan)->num_rows();
                                    $cuti   = $this->M_data->cutibulan($data->nip, $tahun, $bulan)->num_rows();
                                    $sakit  = $this->M_data->sakitbulan($data->nip, $tahun, $bulan)->num_rows();
                                    $izin   = $this->M_data->izinbulan($data->nip, $tahun, $bulan)->num_rows();

                                    $gaji   = ($absen * $data->gaji) + ($cuti * $data->gaji) + ($sakit * $data->gaji);
                                    //var_dump($cuti);
                                    //hitung hari cuti
                                ?>
                                    <tr>
                                        <td width="1%"><?= $no++ ?></td>
                                        <td><?= ucfirst($data->nip) ?></td>
                                        <td><?= ucfirst($data->nama) ?></td>
                                        <td><?= $this->M_data->tgl_indo(date('Y-m-d'), strtotime($data->waktu_masuk)) ?></td>
                                        <td><?= ucfirst($data->departemen) ?></td>
                                        <!-- <td><?= $izin ?></td>
                                        <td><?= $sakit ?></td> -->
                                        <td>Rp. <?= number_format($gaji) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

</body>
<script type="text/javascript">
    window.print();
</script>

</html>