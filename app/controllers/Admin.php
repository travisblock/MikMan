<?php

class Admin extends Controller{

  public function __construct(){
    parent::__construct();
    if(!$this->is_login())
      Redirect::to('/');
  }

  public function index(){
    $this->view('templates/header');
    $this->view('admin/menu');
    $this->view('admin/index');
    $this->view('templates/footer');
  }
}
