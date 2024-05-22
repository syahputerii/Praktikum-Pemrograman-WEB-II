<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan Mahasiswa</title>
    <style>
        body {
            background-image: url('library_page.jpg');
            background-size: cover; 
            background-position: center; 
            color: #000000; 
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        h2 {
            text-align: center;
            animation: fadeInDown 1s ease-in-out;
        }

        h1 {
            font-size: 48px; 
            margin-bottom: 20px; 
            color: #FFF5EE; 
            text-transform: uppercase; 
            letter-spacing: 2px; 
            font-weight: bold; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
            animation: scaleIn 1s ease-in-out;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px; 
            width: 80%;
            margin-top: 20px; 
        }

        .grid-item {
            background: #FFF8DC; 
            color: #8B4513; 
            border-radius: 21px;
            padding: 20px;
            text-align: center;
            animation: scaleIn 1s ease-in-out;
            transition: transform 0.3s; 
        }

        .grid-item:hover {
            transform: scale(1.05); 
        }

        .grid-item img {
            transition: transform 0.3s;
            max-width: 100%; 
        }

        .grid-item img:hover {
            transform: scale(1.1);
        }

        .grid-item h3 {
            margin-bottom: 10px;
            transition: color 0.3s; 
        }

        .grid-item:hover h3 {
            color: #B22222; 
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <h1>SISTEM INFORMASI PERPUSTAKAAN MAHASISWA</h1>
    <div class="grid-container">
        <div class="grid-item">
            <h3>Buku</h3>
            <a href="Buku.php"><img src="book.svg" alt="Buku" height="170"></a>
        </div>
        <div class="grid-item">
            <h3>Member</h3>
            <a href="Member.php"><img src="user.svg" alt="Member" height="170"></a>
        </div>
        <div class="grid-item">
            <h3>Peminjaman</h3>
            <a href="Peminjaman.php"><img src="database.svg" alt="Peminjaman" height="170"></a>
        </div>
    </div>
</body>
</html>