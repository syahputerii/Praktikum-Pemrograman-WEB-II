<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 3 Soal 4</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlah = $_POST["jumlah"];
    }

    if (isset($_POST['tambah'])) {
        $jumlah += 1;
    }

    if (isset($_POST['kurang'])) {
        $jumlah -= 1;
    }

    if(empty($jumlah)): ?>
        <form action="" method="post">
            Jumlah bintang <input type="number" name="jumlah" min="1">
            <br>
            <button type="submit" name="submit">Submit</button>
        </form>
    <?php
    endif;
    if(!empty($jumlah)):
    ?>
        <?php
        echo "Jumlah bintang $jumlah<br><br><br>";
        for ($i=0; $i < $jumlah; $i++) {
            echo '<img src="Gambar/Bintang.png" width="50px" height = "50px">';
        }
        ?>
        <form action="" method="post">
            <input type="number" name="jumlah" min="1" value="<?= $jumlah ?>" hidden>
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>
</body>
</html>