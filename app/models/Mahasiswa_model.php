<?php

class Mahasiswa_model 
{
    private $_pdo;
    private $_host = 'localhost';
    private $_dbname = 'ian';
    private $_username = 'root';
    private $_password = '';
    public function __construct()
    {
        try{
            $this->_pdo = new PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname,$this->_username,$this->_password);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            die("Koneksi / Query Bermasalah =".$e->getMessage()."(".$e->getCode().")");
        }
    }
    public function getAllMahasiswa() {
        $query = "SELECT * FROM mahasiswa";
       $stmt = $this->_pdo->prepare($query);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}