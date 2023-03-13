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
    public function getGroupProject(){
        $sql ="
            SELECT *
            FROM tb_data
            GROUP BY project 
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function updateCer($data){
        $sql ="
            UPDATE tb_data 
            SET file_cer = :file_cer
            WHERE id = :id 
             
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getCerByPerson($person){
        $sql ="
            SELECT *
            FROM tb_data
            WHERE name LIKE '".$person."%'
            ORDER BY project  
             
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>