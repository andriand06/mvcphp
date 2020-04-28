<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Mahasiswa';
        $this->view('template/header',$data);
        $this->view('mahasiswa/index',$data);
        $this->view('template/footer');
    }
}