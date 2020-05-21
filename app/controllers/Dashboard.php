<?php

class Dashboard extends Controller{
  private $kelompok = "dashboard";
  private $judul = "Dashboard MikMan";
  public  $template = "index";

  public function __construct(){
    parent::__construct();
    if(!$this->is_login_dashboard())
      Redirect::to('/');
  }

  public function index(){
    $this->display_dashboard($this->kelompok .'/'. $this->template, $this->judul);
  }

  public function logout(){
    session_destroy();
    Redirect::to('/');
  }
}
