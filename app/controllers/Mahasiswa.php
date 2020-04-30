<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Mahasiswa';
        $data['mhs'] =$this->model('Mahasiswa_model')->get('mahasiswa');
        $this->view('template/header',$data);
        $this->view('mahasiswa/index',$data);
        $this->view('template/footer');
    }
    public function tambah()
    { 
        
        $this->view('template/header');
        $this->view('mahasiswa/tambah');
        $this->view('template/footer');
    }
}