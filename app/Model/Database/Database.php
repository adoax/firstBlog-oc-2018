<?php

namespace App\Model\Database;
use PDO;

class Database {

    private  $pdo;

    private function getPDO(){
        if($this->pdo === null){
           $pdo = new PDO('mysql:host=e7qyahb3d90mletd.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=r4bdn4pyj121z7j2; charset=utf8', 'u9md5xj2g0a5ts8g', 'a384w88bcbzkaqgq');
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }



    public function query($statement, $class_name = null, $one = false){
        $req = $this->getPDO()->query($statement);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }

        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one){
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }


    public function prepare($statement, $attributes, $class_name = null, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }
}