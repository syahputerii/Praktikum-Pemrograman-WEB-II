<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 3 Soal 1</title>
</head>

<body>
    <form action="" method="POST">
        Jumlah Peserta: <input type="number" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br/>
        <input type="submit" name="submit" value="Cetak">
    </form>

    <?php
    session_start();

    if (isset($_POST['submit'])) {
        $nilai = $_POST['nilai'];
        $_SESSION['nilai'] = $nilai;
        $i = 1;
        while ($i <= $nilai) {
            if ($i % 2 == 0) {
                echo "<h3><font color='green'>Peserta Ke-$i</font></br>";
            } else {
                echo "<h3><font color='red'>Peserta Ke-$i</font></br>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>