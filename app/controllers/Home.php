<?php
class Home extends Controller{
    public function index()

    {   $data['judul'] = 'Home';
        $this->view('template/header',$data);
        $this->view('Home/index');
        $this->view('template/footer');
    }
}