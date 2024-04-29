<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 3 Soal 2</title>
    <style>
        form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        Tinggi : <input type="text" name="tinggi" value="<?php echo isset($_POST['tinggi']) ? $_POST['tinggi'] : ''; ?>"><br/>
        Alamat Gambar: <input type="textbox" name="alamatgambar" value="<?php echo isset($_POST['alamatgambar']) ? $_POST['alamatgambar'] : ''; ?>"><br/>
        <input type="submit" name="submit" value="Cetak">
    </form>

    <?php 
    if (isset($_POST['submit'])) {
        $tinggi = $_POST['tinggi'];
        $alamatgambar = $_POST['alamatgambar'];
        $i = 1;
        $j = 1;
        $k = $tinggi;
        
        while ($i <= $tinggi) {
            while ($j < $i) {
                echo "<img style='width: 25px; opacity: 0;' src='$alamatgambar' alt=''>";
                $j = $j + 1;
            }
            while ($k >= $i) {
                echo "<img style='width: 25px' src='$alamatgambar' alt=''>";
                $k = $k - 1;
            }
            echo "<br>";
            
            $j = 1;
            $k = $tinggi;
            $i = $i + 1;
        }
    }
    ?>
</body>
</html>