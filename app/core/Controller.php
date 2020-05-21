<?php

class Controller{

  public $API = null;
  public $template = null;

  public function __construct(){
    $this->API = RouterosAPI::getAPI();
    if($this->is_login()){
      $this->API->connect($_SESSION['ip'], $_SESSION['user'], $_SESSION['pass']);
    }

  }

  public function view($view, $data = []){
    require_once 'app/views/'. $view .'.php';
  }

  public function model($model){
    require_once 'app/models/'. $model .'.php';
    return new $model;
  }

  public function is_login(){
    return (Session::exists('MikMan')) ? TRUE : FALSE;
  }

  public function is_login_dashboard(){
    return (Session::exists('LoginAdmin')) ? TRUE : FALSE;
  }

  public function display_dashboard($template, $judul, $data=null){
    $data['judul']   = $judul;
    $data['content'] = $template;
    $this->view("templates/template_dashboard", $data);
  }

  public function display_admin($template, $judul, $data=null){
    $data['judul']   = $judul;
    $data['content'] = $template;
    $this->view("templates/template_admin", $data);
  }
}
