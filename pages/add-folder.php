<?php require $_SERVER['DOCUMENT_ROOT']."/sci-certificate/vendor/autoload.php" ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/sci-certificate/lib/TCPDF-master/tcpdf.php"; ?>
<?php

use App\Model\Certificate\Data;

$personObj = new Data;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science-Certificate</title>
    <link rel="stylesheet" href="/sci-certificate/theme/css/bootstrap-theme.css">
</head>

<body class="font-kanit">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Science@KMITL Certificate</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header bg-primary text-white">
                <h2>Certificate</h2>
            </div>
            <div class="card-body">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="text" placeholder="ใส่ชื่ออย่างเดียว" aria-label="Search" name="folder" autofocus>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

        </div>
    </div>
    <?php
        if(isset($_POST['folder'])){
            echo $_POST['folder'];
            if($_POST['folder']<>""){
                $dirf = "../upload/certificate/{$_POST['folder']}";
                if (is_dir($dirf)) {
    
                } else {
                    mkdir("$dirf", 0777);
                }
            }
           
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>