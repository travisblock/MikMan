<?php

class AdminDashboard extends Controller
{
  private $kelompok = "dashboard";
  private $judul    = "Dashboard MikMan";
  public  $template = "index";

  public function __construct()
  {
    parent::__construct();
    if (!$this->isLoginDashboard())
      Redirect::to('/');
  }

  public function index()
  {
    $this->displayDashboard($this->kelompok .'/'. $this->template, $this->judul);
  }

  public function logout()
  {
    session_destroy();
    Redirect::to('/');
  }
}
