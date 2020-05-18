<?php

class Dashboard extends Controller{

  public function __construct(){
    parent::__construct();
    if(!$this->is_login_dashboard())
      Redirect::to('/');
  }

  public function index(){
    $this->view('templates/header');
    $this->view('dashboard/menu');
    $this->view('dashboard/index');
    $this->view('templates/footer');
  }

  public function logout(){
    session_destroy();
    Redirect::to('/');
  }
}
