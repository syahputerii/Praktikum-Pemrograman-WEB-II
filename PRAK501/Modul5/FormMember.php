<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form Member</title>
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
        .form-container {
            background-color: rgba(225, 212, 187, 0.5); 
            padding: 20px;
            border-radius: 10px;
        }
        input, textarea {
            font-weight: 500;
            font-size: 1rem;
            color: #fff;
            background-color: rgb(28, 28, 30);
            box-shadow: 0 0 0.4rem rgba(0, 0, 0, 0.5), 0 0 0 0.15rem transparent;
            border-radius: 0.4rem;
            border: none;
            outline: none;
            padding: 0.4rem;
            transition: 0.4s;
        }
        input:hover, textarea:hover {
            box-shadow: 0 0 0 0.15rem rgba(135, 207, 235, 0.186);
        }
        input:focus, textarea:focus {
            box-shadow: 0 0 0 0.15rem skyblue;
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
        button::before, button::after {
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
        button:hover::before, button:hover::after {
            width: 70%;
        }
        button:hover span {
            color: #e0aaff;
            transition: 0.3s;
        }
        button span {
            color: #03045e;
            font-size: 1rem;
            transition: all 0.3s ease-in;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php
    ob_start();
    include_once('Model.php');
    if (isset($_GET['id_member'])) {
        editMember();
    }
    ?>
    <div class="container form-container">
        <div class="row">
            <form action="" method="post">
                <h1 class="mt-2">Tambah Data Member</h1>

                <label for="nama_member" class="form-label" style="color: #fff;">Nama Member</label>
                <input type="text" name="nama_member" id="nama_member" class="form-control mb-3"
                    value="<?php if (isset($_GET['id_member'])) echo $result[0]['nama_member']; ?>" required>

                <label for="nomor_member" class="form-label" style="color: #fff;">Nomor Member</label>
                <input type="text" name="nomor_member" id="nomor_member" class="form-control mb-3"
                    value="<?php if (isset($_GET['id_member'])) echo $result[0]['nomor_member']; ?>" required>

                <label for="alamat" class="form-label" style="color: #fff;">Alamat Member</label>
                <textarea name="alamat" id="alamat" class="form-control mb-3" required><?php if (isset($_GET['id_member'])) echo $result[0]['alamat']; ?></textarea>

                <label for="tgl_mendaftar" class="form-label" style="color: #fff;">Tanggal Mendaftar</label>
                <input type="datetime-local" name="tgl_mendaftar" id="tgl_mendaftar" class="form-control mb-3"
                    value="<?php if (isset($_GET['id_member'])) echo date('Y-m-d\TH:i', strtotime($result[0]['tgl_mendaftar'])); ?>" required>

                <label for="tgl_terakhir_bayar" class="form-label" style="color: #fff;">Tanggal Terakhir Bayar</label>
                <input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar" class="form-control mb-3"
                    value="<?php if (isset($_GET['id_member'])) echo $result[0]['tgl_terakhir_bayar']; ?>" required>
                <?php
                ob_start();
                if (isset($_GET['id_member'])) {
                    echo '<button type="submit" class="btn btn-success mt-3" name="update">Update</button>';
                } else {
                    echo '<button type="submit" class="btn btn-success mt-3" name="tambah">Tambah</button>';
                }
                ?>
            </form>
        </div>
    </div>
    <?php
    ob_start();
    if (isset($_POST['update'])) {
        $tgl_mendaftar = date('Y-m-d H:i:s', strtotime($_POST['tgl_mendaftar']));
        updateMember($_GET['id_member'], $_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_mendaftar, $_POST['tgl_terakhir_bayar']);
    }

    if (isset($_POST['tambah'])) {
        $tgl_mendaftar = date('Y-m-d H:i:s', strtotime($_POST['tgl_mendaftar']));
        insertDataMember($_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_mendaftar, $_POST['tgl_terakhir_bayar']);
    }
    ?>
</body>
</html>