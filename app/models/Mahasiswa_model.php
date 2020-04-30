<?php

class Mahasiswa_model 
{
  private $table = 'mahasiswa';
  private $db;
    public function __construct()
    {
        $this->db = NEW DB();
    }
    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM'.$this->table);
        return $this->db->resultset();
    }
    public function getMahasiswabyId($id)
    {
        $this->db->query('SELECT * FROM'.$this->table.'WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function insertMahasiswa($nim,$email)
    {
        $this->db->query('INSERT INTO'.$this->table.'(nim,email) VALUES (:nim,:email)');
        $this->db->bind('nim',$nim);
        $this->db->bind('email',$email);
        $this->db->execute();
    }

    public function updateMahasiswa($nim,$email)
    {
        $this->db->query('UPDATE'.$this->table.'SET email=:email WHERE nim=:nim');
        $this->db->bind(nim,$nim);
        $this->db->bind(email,$email);
        $this->db->execute();
    }
    public function deleteMahasiswa($id)
    {
        $this->db->query('DELETE FROM'.$this->table.'WHERE id=:id');
        $this->db->bind(id,$id);
        $this->db->execute();
    }
 


}

  
    
   
