<?php

class Controller{

  public $API = null;
  public $ROOT = "ROOT";

  public function __construct(){
    $this->API = new RouterosAPI;
  }

  public function view($view, $data = []){
    require_once 'app/views/'. $view .'.php';
  }

  public function model($model){
    require_once 'app/models/'. $model .'.php';
    return new $model;
  }
}
