<?php require_once("callBootstrap.php"); ?>
<html>
    <head>
        <title>SIAKAD</title>
    <style>
    .navbar-nav.navbar-center {
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
    }
    </style>
    </head>
</html>
<body>
    <div class="text-center" style="margin: 20px">
        <img src="./img/favicon.png" width=70px height=70px alt="">
        <span style="font-size: 24px; padding-top: 5px;">Academic Information System </span>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav navbar-center">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="dataMhs.php">Student Data</a>
            <a class="nav-link" href="dataDosen.php">Lecturer Data</a>
        </div>
        </div>
    </div>
    </nav>
</body>