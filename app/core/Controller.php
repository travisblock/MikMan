<?php

class Controller
{
  protected $API = null;

  public function __construct()
  {
    $this->API = RouterosAPI::getAPI();
    if ($this->isLogin()) {
        if (!$this->API->connect($_SESSION['ip'], $_SESSION['user'], $_SESSION['pass']))
            die("Disconnect");
    }

  }

  public function view($view, $data = [])
  {
    require_once 'app/views/'. $view .'.php';
  }

  public function model($model)
  {
    require_once 'app/models/'. $model .'.php';
    return new $model;
  }

  public function isLogin()
  {
    return (Session::exists('MikMan')) ? TRUE : FALSE;
  }

  public function isLoginDashboard()
  {
    return (Session::exists('LoginAdmin')) ? TRUE : FALSE;
  }

  public function displayDashboard($template, $judul, $data=null)
  {
    $data['judul']   = $judul;
    $data['content'] = $template;
    $this->view("templates/template_dashboard", $data);
  }

  public function displayAdmin($template, $judul, $data=null)
  {
    $data['judul']   = $judul;
    $data['content'] = $template;
    $this->view("templates/template_admin", $data);
  }
}
