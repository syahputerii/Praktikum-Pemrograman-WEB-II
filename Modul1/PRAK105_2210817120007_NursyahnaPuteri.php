<?php

$daftarsmartphonesamsung = ["S22" => "Samsung Galaxy S22", "S22+" => "Samsung Galaxy S22+", "A03" => "Samsung Galaxy A03", "Xcover5" => "Samsung Galaxy Xcover 5"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum WEB II Modul 1 Soal 5</title>
    <style>
        table, th, td {
            border: 1px solid;
        }
        th {
            font-size: x-large;
            background-color: red;
            padding: 20px 0px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung["S22"]; ?></td>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung["S22+"]; ?></td>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung["A03"]; ?></td>
        </tr>
        <tr>
            <td><?php echo $daftarsmartphonesamsung["Xcover5"]; ?></td>
        </tr>
    </table>
</body>
</html>