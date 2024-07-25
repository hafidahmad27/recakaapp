<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1><?= $title ?></h1>
    <p>Periode: <?= $start_date ?> - <?= $end_date ?></p>
    <table>
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Nama Member</th>
                <th>Tanggal Transaksi</th>
                <th>Status Pembayaran</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $order['kode_transaksi'] ?></td>
                    <td><?= $order['nama_member'] ?></td>
                    <td><?= $order['tanggal_transaksi'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td><?= $order['total'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>