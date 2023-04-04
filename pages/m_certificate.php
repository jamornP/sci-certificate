<?php session_start(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/sci-certificate/vendor/autoload.php" ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/sci-certificate/lib/TCPDF-master/tcpdf.php"; ?>
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
        <?php 
        if($_SESSION['login']){
            echo "
                <a href='/sci-certificate/backend/logout.php'>Logout</a>
            ";
        }else{
            header("location:/sci-certificate/backend");
            exit(0);
        }
            
        ?>
        <div class="card text-center mt-5">
            <div class="card-header bg-primary text-white">
                <h2>Certificate</h2>
            </div>
            <div class="card-body">
                <form class="d-flex" action="" method="POST">
                    <select class="form-select me-2" aria-label="Default select example" name="search">
                        <?php
                        if (isset($_POST['search'])) {
                            echo "
                                    <option selected>{$_POST['search']}</option>
                                    <option>เลือกกิจกรรม</option>
                               ";
                        } else {
                            echo "
                                    <option selected>เลือกกิจกรรม</option>
                                ";
                        }
                        ?>

                        <?php
                        $project = $personObj->getGroupProject();
                        foreach ($project as $pro) {
                            echo "
                                    <option value='{$pro['project']}'>{$pro['project']}</option>
                                ";
                        }
                        ?>
                    </select>
                    <!-- <input class="form-control me-2" type="search" placeholder="ใส่ชื่ออย่างเดียว" aria-label="Search" name="search" autofocus> -->
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

        </div>
        <?php
        $ck = 0;
        $pro="";
        if (isset($_POST['search'])) {

            $data = $personObj->getDataByProject($_POST['search']);
            $ck = count($data);
            echo "<p><b>จำวนวน {$ck} คน</b></p>";
            $pro =$_POST['search'];
        
        ?>
        <div class="card mt-5">
            <div class="card-header">
                <form class="d-flex" action="gen_certificate.php" method="POST">
                    <input class="form-control me-2" type="hidden"  name="project" value="<?php echo $pro;?>">
                    <input class="form-control me-2" type="text"  placeholder="ชื่อ Folder" name="folder" require autofocus>
                    <button class="btn btn-success text-white me-2" type="submit">สร้าง Certificate</button>
                    
                </form>
                <a class="btn btn-primary text-white mt-2" href="example.php?project=<?php echo $pro;?>" target="_blank">ตัวอย่าง Certificate</a>
            </div>
            <div class="card-body">

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">ที่</th>
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">Certificate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($ck > 0) {
                            $i = 0;
                            foreach ($data as $person) {
                                $fullname = $person['title'] . $person['name'] . " " . $person['surname'];
                                if($person['file_cer']<>""){
                                    $certificate = "Yes";
                                }else{
                                    $certificate = "No";
                                }
                                $i++;
                                echo "
                            <tr>
                                <td>{$i}</td>
                                <td>{$fullname}</td>
                                <td>{$certificate}</td>
                            </tr>
                        ";
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
            }
        ?>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>