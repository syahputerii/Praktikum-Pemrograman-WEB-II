<?php

$daftarsmartphonesamsung = ["Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum WEB II Modul 1 Soal 4</title>
    <style>
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung[0]; ?></td>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung[1]; ?></td>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung[2]; ?></td>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung[3]; ?></td>
        </tr>
    </table>
</body>
</html>