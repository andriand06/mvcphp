<?php
class DB{

  // Property untuk koneksi ke database mysql
  private $_host = 'DB_HOST';
  private $_dbname = 'DB_NAME';
  private $_username = 'DB_USER';
  private $_password = 'DB_PASS';

  // Property internal dari class DB
  private static $_instance = null;
  private $_pdo;
  private $_stmt;
  

  // Constructor untuk pembuatan PDO Object
  private function __construct(){
    try {
      $this->_pdo = new PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname,
                             $this->_username, $this->_password);
      $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
      die("Koneksi / Query bermasalah: ".$e->getMessage(). " (".$e->getCode().")");
    }
  }

  // Singleton pattern untuk membuat class DB
  public static function getInstance(){
    if(!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
    return self::$_instance;
  }

  // Method dasar untuk menjalankan prepared statement query
  public function query ($query) {
    $this->_stmt = $this->_pdo->prepare($query);
  }
  public function bind($params,$value,$type = null){
    if(is_null($type))
    {
      switch(true){
      case is_int($value):
        $type = PDO::PARAM_INT;
      break;
      case is_bool($value):
        $type = PDO::PARAM_BOOL;
      break;
      case is_null($value):
        $type = PDO::PARAM_NULL;
      break;
      default :
      $type = PDO::PARAM_STR;
      }

    }
    $this->_stmt->bind($params,$value,$type);
  }
  public function execute()
  {
    $this->_stmt->execute();
  }

  public function resultset()
  {
    $this->execute();
    return $this->_stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single()
  {
    $this->execute();
    return $this->_stmt->fetch(PDO::FETCH_ASSOC);
  }

}
