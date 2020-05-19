<?php

class Admin extends Controller{

  public function __construct(){
    parent::__construct();
    if(!$this->is_login())
      Redirect::to('/');
  }

  public function index(){
    //$this->API->debug = true;
    $date = $this->API->comm("/system/clock/print");
    $data['date'] = ucfirst($date[0]['date']);
    $data['jam']  = $date[0]['time'];

    $this->view('templates/header');
    $this->view('admin/menu');
    $this->view('admin/index', $data);
    $this->view('templates/footer');
  }
}
