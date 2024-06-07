<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        margin: 20px;
    }

    .title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        text-decoration: underline;
    }

    .date-range {
        margin-bottom: 10px;
    }

    .table-data {
        width: 100%;
        border-collapse: collapse;
    }

    .table-data th,
    .table-data td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    .table-data th {
        background-color: #3cb64c;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">Laporan Penjualan</div>
        <div class="date-range">
            <strong>Dari Tanggal:</strong> <?php echo date('d/m/Y', strtotime($_GET['dari'])); ?><br>
            <strong>Sampai Tanggal:</strong> <?php echo date('d/m/Y', strtotime($_GET['sampai'])); ?>

        </div>
        <table class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($penjualan as $p) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d/m/Y', strtotime($p->penjualan_tanggal)); ?></td>
                    <td><?= "Rp. " . number_format($p->penjualan_total_harga) . ' ,-' ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
    window.print();
    </script>
</body>