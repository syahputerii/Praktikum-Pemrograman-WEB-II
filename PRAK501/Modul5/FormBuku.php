<?php
ob_start();
include 'Koneksi.php';
include 'Model.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formulir Buku</title>
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

<body class="p-3">
    <?php
    ob_start();
    include_once('Model.php');
    if (isset($_GET['id_buku'])) {
        editBuku();
    }
    ?>

    <div class="container form-container">
        <div class="row">
            <form action="" method="post">
                <h1 style="text-align: center;" class="mt-2" style="color: #fff;">Tambah Data Buku</h1>

                <label for="judul_buku" class="form-label" style="color: #fff;">Judul Buku</label>
                <input type="text" name="judul_buku" id="judul_buku" class="form-control mb-3" value="<?php if (isset($_GET['id_buku']))
                    echo $result[0]["judul_buku"] ?>" required>

                    <label for="penulis" class="form-label" style="color: #fff;">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control mb-3" value="<?php if (isset($_GET['id_buku']))
                    echo $result[0]["penulis"] ?>" required>

                    <label for="penerbit" class="form-label" style="color: #fff;">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="form-control mb-3" value="<?php if (isset($_GET['id_buku']))
                    echo $result[0]["penerbit"] ?>" required>

                    <label for="tahun_terbit" class="form-label" style="color: #fff;">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control mb-3" value="<?php if (isset($_GET['id_buku']))
                    echo $result[0]["tahun_terbit"] ?>" required>
                    <?php
                    ob_start();
                if (isset($_GET['id_buku'])) {
                    echo "<button type=\"submit\" class=\"btn btn-success mt-3\" name=\"update\"> Update </button>";
                } else {
                    echo "<button type=\"submit\" class=\"btn btn-success mt-3\" name=\"tambah\"> Tambah </button>";
                }
                ?>
        </div>
    </div>
    </form>
    <?php
    ob_start();
    if (isset($_POST['update'])) {
        updateBuku($_GET['id_buku'], $_POST['judul_buku'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun_terbit']);

    }
    if (isset($_POST['tambah'])) {
        insertDataBuku($_POST['id_buku'], $_POST['judul_buku'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun_terbit']);
    }
    ?>
</body>
</html>