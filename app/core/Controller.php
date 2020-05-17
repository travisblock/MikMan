<?php

class Controller{

  public $API = null;
  public $ROOT = "ROOT";

  public function __construct(){
    $this->API = RouterosAPI::getAPI();
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
}
