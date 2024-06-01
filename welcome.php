<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Riko Randika</title>
    <link rel="shortcut icon" href="BINJAI.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
            background-image: url(pinked.jpg);
            background-size: cover;
            box-sizing: border-box;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 100px;
            padding-bottom: 100px;
        }
        .container {
            margin-top: 50px;
        }
        .zoom-out {
            transform: scale(1.2);
            transition: transform 0.3s ease;
        }
        .btn-zoom {
            transition: transform 0.3s ease;
        }
        .btn-zoom:hover {
            transform: scale(1.05);
            background-color: rgba(0, 255, 0, 0.5);
            box-shadow: 0px 0px 2px 2px rgba(0, 255, 0, 0.5);
            transition: 0,7s;
        }
        .text-shadow {
            text-shadow: 2px 2px 5px rgba(0, 255, 0, 0.5);
        }
        .img-shadow {
            box-shadow: 5px 5px 15px rgba(0, 255, 0, 0.5);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <img src="BINJAI.jpg" class="navbar-brand" href="BINJAI.jpg" alt="foto" style="width: 30px; border-radius: 50%;">
            <a class="navbar-brand">Website Riko Randika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="welcome.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teams.html"><i class="fa-solid fa-people-group"></i> Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="project.html"><i class="fa-solid fa-bars-progress"></i> Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html"><i class="fa-solid fa-address-book"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                        <i class="bi bi-arrow-bar-right"><i class="fa-solid fa-right-from-bracket"></i> Logout</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <center><img src="BINJAI.jpg" class="img-fluid rounded-circle img-shadow" alt="poto" height="200px" width="200px" style="border-radius: 50%;"></center><br>
        <h1 style="font-family: Sedan SC Regular; margin-bottom: 30px; font-weight: bold; text-align: center; color: white;" class="text-center text-white font-weight-bold text-shadow">SELAMAT DATANG, <?php echo $_SESSION['nama']; ?>!</h1><br>
        <div style="justify-content:space-between; display:flex;">
            <a href="index.html">
                <button type="button" class="btn-zoom" onclick="zoomButton(this)" style="margin-left: 280px; background-color: rgb(30 58 138); padding: 10px 30px; border-radius: 5px; border: none; color: white;">
                <i class="fa-solid fa-house-user"></i> Kembali Ke Beranda
                </button>
            </a>
            <a href="logout.php">
                <button type="button" class="btn-zoom" onclick="zoomButton(this)" style="margin-right: 320px; background-color: rgb(30 58 138); padding: 10px 30px; border-radius: 5px; border: none; color: white;">
                <i class="fa-solid fa-right-from-bracket"></i> Log Out Disini
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb3daAzB1CjAPj4h1rgjj0AqzB6BwejL4PpFrTllPJw/sUXH9" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-qb6KZp6UZTr38wknpV00AV5+pXvGhFfw65qogD2p+qt+GdRCs2eF5jwDME+AF7YZ" crossorigin="anonymous"></script>
    <script>
        function zoomButton(element) {
            element.classList.toggle('zoom-out');
        }
    </script>
</body>
</html>
