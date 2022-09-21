<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Gaji</title>
</head>

<body>
    From filter By Tanggal
    <br>
    <br>
    <hr>

    <form action="<?php echo base_url(); ?>Barang/filter" method="POST" target="_blank">

        <input type="hidden" name=" nilaifilter" value="1">

        Tanggal Awal <br>
        <input type="date" name="tanggalawal" required=""> <br>


        Tanggal Akhir
        <input type="date" name="tanggalakhir" required=""> <br>

        <br>
        <input type="submit" value="print">
    </form>

    From filter By Bulan
    <br>
    <br>
    <hr>

    <form action="<?php echo base_url(); ?>Barang/filter" method="POST" target="_blank">

    <input type="hidden" name=" nilaifilter" value="2">

        Pilih Tahun <br>
        <select name="tahun1" required="">
            <?php foreach($tahun as $row); ?>

            <option value="<?php echo $row->tahun ?>"><?php echo $row->tahun ?></option>

            <?php endforeach ?>
        </select>

        Bulan Awal <br>
       <select name="bulanawal" required="">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
       </select>


        Bulan Akhir
        <select name="bulanakhir" required="">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
       </select>
        <br>
        <input type="submit" value="print">
    </form>

    From filter By Bulan
    <br>
    <br>
    <hr>

    <form action="<?php echo base_url(); ?>Barang/filter" method="POST" target="_blank">

    <input type="hidden" name=" nilaifilter" value="3">

        Pilih Tahun <br>
        <select name="tahun2" required="">
            <?php foreach($tahun as $row); ?>

            <option value="<?php echo $row->tahun ?>"><?php echo $row->tahun ?></option>

            <?php endforeach ?>
        </select>
       
        <br>
        <input type="submit" value="print">
    </form>
</body>

</html>