    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <!-- Map card -->
                    <div class="card">
                        <div class="card-header"> <?= $title ?> </h3>
                        </div>

                        <form action="<?= base_url('admin/penggajian') ?>" method="post">
                            <div class="card-body table-responsive">
                                <div class="row">
                                    <!-- ucup tambah filter  -->
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">
                                                <option value="">Semua</option>
                                                <?php
                                                foreach ($listTahun as $key => $value) {
                                                    echo '<option value=' . $value->nama_tahun . '>' . $value->nama_tahun . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control">
                                                <option value="">Semua</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-1" style="padding-top: 32px">
                                        <button type="submit" class="btn btn-info">Filter</button>
                                    </div>
                                    <!-- end ucup  -->

                                    <div class="col-sm-12">
                                        <table border="1" id="myTable" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Hadir</th>
                                                    <th>Cuti</th>
                                                    <th>Izin</th>
                                                    <th>Sakit</th>
                                                    <th>Gaji</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $no = 1;
                                                foreach ($list as $data) {

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
                                                        <td><?= $absen ?></td>
                                                        <td><?= $cuti ?></td>
                                                        <td><?= $izin ?></td>
                                                        <td><?= $sakit ?></td>
                                                        <td>Rp. <?= number_format($gaji) ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>