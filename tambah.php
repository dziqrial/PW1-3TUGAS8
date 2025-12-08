<?php
require_once "TokoKelontong.php";

$toko = new TokoKelontong();
$table = "tokoKelontong";

if (isset($_POST['simpan'])) {
    $data = [
        'kode'  => $_POST['kode'],
        'nama'  => $_POST['nama'],
        'jenis' => $_POST['jenis'],
        'harga' => $_POST['harga']
    ];

    $toko->tambahData($table, $data);
    header("Refresh:0; url=dataTokoKelontong.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
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
            background: #2563eb;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-save:hover {
            background: #1d4ed8;
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
        <h2>Tambah Barang</h2>

        <form method="post">
            <label>Kode Barang</label>
            <input type="text" name="kode" required>

            <label>Nama Barang</label>
            <input type="text" name="nama" required>

            <label>Jenis Barang</label>
            <input type="text" name="jenis" required>

            <label>Harga</label>
            <input type="number" name="harga" required>

            <button type="submit" name="simpan" class="btn-save">Simpan</button>
        </form>

        <a href="dataTokoKelontong.php" class="back">← Kembali</a>
    </div>
</body>
</html>