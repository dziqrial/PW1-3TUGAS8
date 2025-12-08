<?php
ob_start();
require_once "TokoKelontong.php";

$toko = new TokoKelontong();
$table = "tokoKelontong";

if(isset($_POST['delete'])) {
    $kode = $_POST['kode'];
    $toko->hapusData($table, ['kode' => $kode]);

    header("Refresh:0");
    exit;
}
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
        .delete-link{
            background: red;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.875rem;
        }
        .delete-form{
            display: inline-block;
            margin:0;
            margin-left: 20px;
        }
        .ubah-box{
            background:#007bff; 
            padding:4px 8px; 
            color:white; 
            text-decoration:none; 
            border-radius:4px;"
        }
        .tambah-box{
            display:inline-block; 
            margin-left:180px; 
            margin-bottom:15px; 
            background:#28a745; 
            color:white; 
            padding:8px 12px; 
            text-decoration:none; 
            border-radius:5px;
        }
    </style>
</head>
<body>
    <h1>Tabel Toko Kelontong</h1>
    <a href="tambah.php" class="tambah-box">
        + Tambah Data
    </a>
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
                <th>
                    Tools
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

                <td>
                    <a href="edit.php?kode=<?= $data['kode']; ?>"
                    class="ubah-box">
                    Ubah
                    </a>

                    <form method="POST" onsubmit="return confirm('Yakin hapus?')" class="delete-form">
                        <input type="hidden" name="kode" value="<?= $data['kode']; ?>">
                        <input class="delete-link" type="submit" name="delete" value="Hapus">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>