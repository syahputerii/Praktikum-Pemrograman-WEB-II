<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 3 Soal 3</title>
</head>

<body>
    <form action="" method="POST">
        Batas Bawah : <input type="number" name="bawah" value="<?php echo isset($_POST['bawah']) ? $_POST['bawah'] : ''; ?>"></br>
        Batas Atas : <input type="number" name="atas" value="<?php echo isset($_POST['atas']) ? $_POST['atas'] : ''; ?>"></br>
        <input type="submit" name="submit" value="Cetak"></br>
    </form></br>

<?php 
if (isset($_POST['submit'])) {
    $bawah = $_POST['bawah'];
    $atas = $_POST['atas'];
    $i = $bawah;
    do {
        if (($i + 7) % 5 == 0) {
            echo "<img src='Gambar/Bintang.png' width='15px' height='15px'>";
        } else {
            echo $i;
        }
        echo "&nbsp";
        $i++;
    } while ($i <= $atas);
}
?>
</body>
</html>