<?php
class About extends Controller {
    public function index($nama = 'abc',$pekerjaan ='aaa')
    {   
        $data['judul'] = 'About';
        $this->view('template/header',$data);
       $this->view('About/index');
       $this->view('template/footer');
    }
    public function page()

    {  
        $data['judul'] = 'Page';
        $this->view('template/header',$data);
        $this->view('About/page');
        $this->view('template/footer');
    }
}