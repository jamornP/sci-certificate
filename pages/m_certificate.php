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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        <div class="card  mt-5">
            <div class="card-header bg-primary text-white text-center">
                <h2>Certificate</h2>
            </div>
            <div class="card-body">
                <form class="" action="" method="POST">
                    <div class="row">
                        <p>เลือกพื้นหลัง</p>  
                        <div class="row">
                            <?php
                                $bg = array("certificate-BG.png","expo2023.jpg","sciday2022.png","sciday2022-bronze.png","sciday2022-gold.png","sciday2022-silver.png","workshop2023.png","cer-01.png");
                                for($i=0;$i<count($bg);$i++){
                                    echo "
                                    <div class='col-lg-2'>
                                    
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='bg' id='{$i}' value='{$bg[$i]}' required>
                                            <label class='form-check-label' for='{$i}'>
                                            <img src='/sci-certificate/background/{$bg[$i]}' class='img-thumbnail' alt='...'>
                                            </label>
                                        </div>
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="mt-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="select" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">มีโรงเรียน</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="select" id="inlineRadio2" value="2" required>
                        <label class="form-check-label" for="inlineRadio2">ไม่มีโรงเรียน</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="select" id="inlineRadio3" value="3" required>
                        <label class="form-check-label" for="inlineRadio3">สมาคมวิทยาศาสตร์</label>
                    </div>
                    </div>
                    <div class="d-flex mt-3">
                        <select class="form-select me-2 " aria-label="Default select example" name="search">
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
                                $ck = $personObj->getGenCerByProject($pro['project']);
                                if($ck){
                                    $text2 = "สร้างแล้ว =>";
                                }else{
                                    $text2 = "";
                                }
                                echo "
                                        <option value='{$pro['project']}'>{$text2} {$pro['project']}</option>
                                    ";
                            }
                            ?>
                        </select>
                        <!-- <input class="form-control me-2" type="search" placeholder="ใส่ชื่ออย่างเดียว" aria-label="Search" name="search" autofocus> -->
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="">
            <div class="card ">
                <div class="card-header bg-primary text-white text-center">
                    <h5>กิจกรรมที่สร้าง Certificate แล้ว</h5>
                </div>
                <div class="card-body">
                    <?php
                        $gencers = $personObj->getGenCerAll();
                        foreach($gencers as $gencer){
                            echo "
                                <p>{$gencer['folder']}-{$gencer['project']}</p>
                            ";
                        }
                    ?>
                </div>
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
            $bg = $_POST['bg'];
            $select = $_POST['select'];
            if($select==3){
                $page = "cer-01.php";
            }else{
                $page = "gen.php";
            }
        
        ?>
        <div class="card mt-5">
            <div class="card-header">
                <form class="" action="<?php echo $page;?>" method="POST">
                    
                    
                    <div class="d-flex mt-2">
                        <input class="form-control me-2" type="hidden"  name="project" value='<?php echo $pro;?>'>
                        <input class="form-control me-2" type="hidden"  name="bg" value='<?php echo $bg;?>'>
                        <input class="form-control me-2" type="hidden"  name="select" value='<?php echo $select;?>'>
                        <input class="form-control me-2" type="text"  placeholder="ชื่อ Folder ที่จะเก็บใบประกาศ" name="folder" require autofocus>
                        <button class="btn btn-primary text-white me-2" type="submit" name="excample">ตัวอย่าง Certificate</button>
                        <button class="btn btn-success text-white me-2" type="submit" name="create">สร้าง Certificate</button>
                        
                    </div>
                </form>
                <!-- <a class='btn btn-primary text-white mt-2' href='example.php?project=<?php //echo $pro;?>&bg=<?php //echo $bg;?>&select=<?php //echo $select;?>' target='_blank'>ตัวอย่าง Certificate</a> -->
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