<?php

require_once "TokoKelontong.php";

$toko = new TokoKelontong();
$table = "tokoKelontong";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kelontong</title>
    <style>
        body{
            background: linear-gradient(to bottom, pink, #e2cbe1);
            background-attachment: fixed;
            background-size:cover;
            background-repeat:no-repeat;
        }
        table{
            border-collapse: collapse;
            width: 70%;
            margin-left:180px;
        }
        table,th,td{
            border: 1px solid #000;
            padding: 7px;
        }
        th{
            background: #289205ff;
        }
        td{
            background: yellow;
            text-align: justify;
        }
        h1{
            text-align:center;
        }
    </style>
</head>
<body>
    <h1>Tabel Toko Kelontong</h1>

    <table>
        <thead>
            <tr>
                <th>
                    Kode
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Jenis
                </th>
                <th>
                    Harga
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $baris = $toko->tampilData($table);

            foreach ($baris as $data){?>
                <tr>
                    <td><?= $data['kode']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['jenis']; ?></td>
                    <td><?= $data['harga']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>