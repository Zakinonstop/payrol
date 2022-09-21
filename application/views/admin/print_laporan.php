<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan </title>
</head>

<body>
    <h1><?php echo $title ?></h1>
    <h2><?php echo $subtitle ?></h2>

    <br>
    <br>
    <hr>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php $no=1; 
                
                foreach($datafilter as $row): ?>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->tanggal; ?></td>
                <td><?php echo $row->kd_barang; ?></td>
                <td><?php echo $row->harga; ?></td>
                <td><?php echo $row->qty; ?></td>
                <td><?php echo $row->total; ?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

</body>

</html>