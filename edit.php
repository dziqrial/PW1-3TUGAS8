<?php
require_once "TokoKelontong.php";

$toko = new TokoKelontong();
$table = "tokoKelontong";

$kode = $_GET['kode'];
$data = $toko->tampilData($table, ['kode' => $kode])[0];

if (isset($_POST['ubah'])) {
    $update = [
        'nama'  => $_POST['nama'],
        'jenis' => $_POST['jenis'],
        'harga' => $_POST['harga']
    ];

    $toko->ubahData($table, $update, ['kode' => $kode]);
    header("Refresh:0; url=dataTokoKelontong.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        body {
            background: linear-gradient(to bottom, pink, #e2cbe1);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 400px;
            background: white;
            padding: 10px 50px;
            margin: 60px auto;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 18px;
            color: #444;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #bbb;
            border-radius: 6px;
        }

        .btn-save {
            background: #16a34a;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-save:hover {
            background: #15803d;
        }

        .back {
            display: block;
            margin-top: 12px;
            text-align: center;
            text-decoration: none;
            color: #333;
            background: #ddd;
            padding: 8px;
            border-radius: 6px;
        }

        .back:hover {
            background: #ccc;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Edit Barang</h2>

        <form method="post">
            <label>Kode Barang (tidak bisa diubah)</label>
            <input type="text" value="<?= $data['kode']; ?>" disabled>

            <label>Nama Barang</label>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

            <label>Jenis Barang</label>
            <input type="text" name="jenis" value="<?= $data['jenis']; ?>" required>

            <label>Harga</label>
            <input type="number" name="harga" value="<?= $data['harga']; ?>" required>

            <button type="submit" name="ubah" class="btn-save">Update</button>
        </form>

        <a href="dataTokoKelontong.php" class="back">← Kembali</a>
    </div>
</body>
</html>