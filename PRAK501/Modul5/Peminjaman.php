<?php
require "Koneksi.php";
require 'Model.php';
$result = getPeminjaman($conn);
$dataMember = getMember($conn);
$dataBuku = getBuku($conn);
if (isset($_GET['id_peminjaman'])) {
    deletePeminjaman($_GET['id_peminjaman']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Peminjaman</title>
    <style>
        body {
            background-image: url('library_page.jpg');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: auto;
        }

        .buttons-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .buttons-container a:first-child {
            margin-right: 10px;
        }

        table,
        tr,
        td {
            border-collapse: collapse;
            border-radius: 21px;
            padding: 20px;
            font-size: 18px;
        }

        table {
            width: max-content;
            border-radius: 21px;
            background: rgba(255, 255, 255, 0.8);
            color: black;
        }

        td {
            width: 100px;
            text-align: center;
        }

        button {
            display: inline-block;
            border-radius: 10px;
            border: 1px solid #03045e;
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease-in;
            z-index: 1;
        }

        button::before,
        button::after {
            content: '';
            position: absolute;
            top: 0;
            width: 0;
            height: 100%;
            transform: skew(15deg);
            transition: all 0.5s;
            overflow: hidden;
            z-index: -1;
        }

        button::before {
            left: -10px;
            background: #537188;
        }

        button::after {
            right: -10px;
            background: #537188;
        }

        button:hover::before,
        button:hover::after {
            width: 70%;
        }

        button:hover span {
            color: #e0aaff;
            transition: 0.3s;
        }

        button span {
            color: #03045e;
            font-size: 18px;
            transition: all 0.3s ease-in;
        }

        .header {
            background-color: rgba(128, 128, 128, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            width: max-content;
        }

        h1 {
            font-size: 48px;
            margin: 40px auto 20px;
            color: #FFFAF0;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: fadeInDown 1s ease-in-out, scaleIn 1s ease-in-out;
            border-bottom: 2px solid #FFFAF0;
            padding-bottom: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            width: 80%;
            text-align: center;
        }
    </style>
</head>

<body class="p-3" style="background-color: #E1D4BB;">
    <h2>
        <center><h1>Data Peminjaman</h1></center>
    </h2>
    <div class="buttons-container">
        <a href="index.php"><button class="btn btn-dark mb-4">Kembali</button></a>
        <a href="FormPeminjaman.php"><button class="btn btn-warning mb-1">Tambah Data Peminjaman</button></a>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="text-center">ID Peminjaman</th>
                <th class="text-center">Tanggal Pinjam</th>
                <th class="text-center">Tanggal Kembali</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Nama Member</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $hasil) {
            echo "<tr>";
            echo "<td>" . $hasil["id_peminjaman"] . "</td>";
            echo "<td>" . $hasil["tgl_pinjam"] . "</td>";
            echo "<td>" . $hasil["tgl_kembali"] . "</td>";
            $judulBuku = '';
            foreach ($dataBuku as $temp) {
                if ($hasil['id_buku'] == $temp['id_buku']) {
                    $judulBuku = $temp['judul_buku'];
                    break;
                }
            }
            echo "<td>" . $judulBuku . "</td>";
            $namaMember = '';
            foreach ($dataMember as $temp) {
                if ($hasil['id_member'] == $temp['id_member']) {
                    $namaMember = $temp['nama_member'];
                    break;
                }
            }
            echo "<td>" . $namaMember . "</td>";
            echo "<td>";
            echo "<a class='btn btn-primary' href='FormPeminjaman.php?id_peminjaman=" . $hasil['id_peminjaman'] . "'>Edit</a>";
            echo " ";
            echo "<a class='btn btn-danger' href='Peminjaman.php?id_peminjaman=" . $hasil['id_peminjaman'] . "' onclick=\"return confirm('Yakin Ingin Dihapus?')\">Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>