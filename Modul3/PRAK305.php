<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 3 Soal 5</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="teks" required>
        <button type="submit" name="submit">Submit</button>
    </form>

<br>
<?php
if (isset($_POST['submit'])) {
    $teks = $_POST['teks'];
    $panjangteks = strlen($teks);
    $inputteks = str_split($teks);
    $j = 0;
    $k = 0;
    while ($k < $panjangteks) {
        echo strtoupper($inputteks[$j]);
        for ($i = 1; $i < $panjangteks; $i++) {
            echo strtolower($inputteks[$j]);
        }
        $k++;
        $j++;
    }
}
?>
</body>
</html>