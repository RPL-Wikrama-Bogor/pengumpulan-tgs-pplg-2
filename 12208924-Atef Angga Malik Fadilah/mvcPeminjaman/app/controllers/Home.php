<?php

class Home extends Controller {
    public function index(){
        $data['page'] = 'Home';
        $this->view('template/header', $data);
        $this->view('home/index');
        $this->view('template/footer');
    }
}