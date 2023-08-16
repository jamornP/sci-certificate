<?php require $_SERVER['DOCUMENT_ROOT'] . "/sci-certificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/sci-certificate/lib/TCPDF-master/tcpdf.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/sci-certificate/function/function.php"; ?>
<?php

use App\Model\Certificate\Data;

$personObj = new Data;

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=certificate.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>ชื่อ - สกุล</th>
                <th>สาขาวิชา</th>
                <th>ชื่อไฟล์</th>
            </tr>
        </thead>
        <tbody>
            
                <?php
                $data = $personObj->getData2();
                    foreach($data as $s){
                        echo "
                            <tr>
                                <td>{$s['id']}</td>
                                <td>{$s['name']}</td>
                                <td>{$s['department']}</td>
                                <td>{$s['file_cer']}</td>
                            </tr>
                        ";
                    }
                ?>
            
        </tbody>
    </table>
</body>
</html>