<?php
namespace App\Model\Certificate;
use App\Database\DbCertificate;

class Data extends DbCertificate{
    public function getDataByProject($project){
        $sql ="
            SELECT *
            FROM tb_data
            WHERE project = ?
            ORDER BY name 
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$project]);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>