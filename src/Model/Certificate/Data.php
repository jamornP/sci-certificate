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
    public function getDataByProjectOne($project){
        $sql ="
            SELECT *
            FROM tb_data
            WHERE project = '{$project}'
            ORDER BY name 
        ";
        $stmt = $this->pdo->query($sql);
        // $stmt->execute([$project]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getGroupProject(){
        $sql ="
            SELECT *
            FROM tb_data
            GROUP BY project
            ORDER BY id 
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
        return true;
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
    public function addGenCer($folder,$project){
        $sql ="
           INSERT INTO tb_gencer (
            folder,
            project
            ) VALUES (
            '{$folder}',
            '{$project}'
            )             
        ";
        $stmt = $this->pdo->query($sql);
        return true;
    }
    public function getGenCerAll(){
        $sql ="
            SELECT *
            FROM tb_gencer
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}

?>