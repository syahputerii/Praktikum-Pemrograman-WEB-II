<?php
require "Koneksi.php";
require 'Model.php';

if (isset($_GET['id_peminjaman'])) {
    editPeminjaman();
}

$dataMember = getMember($conn);
$dataBuku = getBuku($conn);

if (isset($_POST['update'])) {
    updatePeminjaman($_GET["id_peminjaman"], $_POST["tgl_pinjam"], $_POST["tgl_kembali"], $_POST["id_buku"], $_POST["id_member"]);
}
if (isset($_POST['tambah'])) {
    insertDataPeminjaman($_POST["tgl_pinjam"], $_POST["tgl_kembali"], $_POST["id_buku"], $_POST["id_member"]);
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
    <title>Form Peminjaman</title>
    <style>
        body {
            background-image: url('library_page.jpg');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: auto;
        }
        input {
            font-weight: 500;
            font-size: .8vw;
            color: #fff;
            background-color: rgb(28, 28, 30);
            box-shadow: 0 0 .4vw rgba(0, 0, 0, 0.5), 0 0 0 .15vw transparent;
            border-radius: 0.4vw;
            border: none;
            outline: none;
            padding: 0.4vw;
            transition: .4s;
        }
        .form-container {
            background-color: rgba(225, 212, 187, 0.5); 
            padding: 20px;
            border-radius: 10px;
        }
        input:hover {
            box-shadow: 0 0 0 .15vw rgba(135, 207, 235, 0.186);
        }

        input:focus {
            box-shadow: 0 0 0 .15vw skyblue;
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
    </style>
</head>

<div class="container form-container">
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <h1 style="text-align: center;" class="mt-2">Tambah Data Peminjaman</h1>
                <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control mb-3" value="<?php if (isset($_GET['id_peminjaman']))
                    echo $result[0]["tgl_pinjam"] ?>" required>

                    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control mb-3" value="<?php if (isset($_GET['id_peminjaman']))
                    echo $result[0]["tgl_kembali"] ?>" required>

                    <label for="id_buku">Judul Buku:</label><br>
                    <select id="id_buku" name="id_buku">
                        <?php
                if (!isset($_GET['id_peminjaman'])) { ?>
                        <option disabled selected></option>
                        <?php
                }
                foreach ($dataBuku as $barisBuku) {
                    $selected = '';
                    if (
                        isset($_GET['id_peminjaman']) && $hasil[0]['id_buku'] ==

                        $barisBuku['id_buku']
                    ) {

                        $selected = 'selected';
                    }
                    ?>
                        <option value="<?php echo $barisBuku['id_buku']; ?>" <?php echo $selected; ?>><?php echo $barisBuku['judul_buku']; ?></option>
                    <?php } ?>
                </select>
                <br><br>

                <label for="id_member">Nama Member:</label><br>
                <select id="id_member" name="id_member">
                    <?php
                    if (!isset($_GET['id_peminjaman'])) { ?>
                        <option disabled selected></option>
                        <?php
                    }
                    foreach ($dataMember as $barisMember) {
                        $selected = '';
                        if (
                            isset($_GET['id_peminjaman']) && $hasil[0]['id_member'] ==

                            $barisMember['id_member']
                        ) {

                            $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $barisMember['id_member']; ?>" <?php echo $selected; ?>><?php echo $barisMember['nama_member']; ?></option>
                    <?php } ?>
                </select>
                <br><br>

                <?php
                if (isset($_GET['id_peminjaman'])) {
                    echo "<button type=\"submit\" class=\"btn btn-success mt-3\" name=\"update\"> Update </button>";
                } else {
                    echo "<button type=\"submit\" class=\"btn btn-success mt-3\" name=\"tambah\"> Tambah </button>";
                }
                ?>
        </div>
    </div>
    </form>
</body>
</html>