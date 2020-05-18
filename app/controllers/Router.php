<?php

class Router extends Controller{

  public function __construct(){
    parent::__construct();
    if(!$this->is_login_dashboard())
      Redirect::to('/');
  }

  public function index(){

  }

  public function add(){
    if(!Input::exists('POST')){
      Redirect::to('/');
    }

    $ip   = Input::get('ip');
    $user = Input::get('user');
    $pass = Input::get('pass');

    // $this->API->debug = TRUE;
    if(!empty($ip) && !empty($user)){
      if($this->API->connect($ip, $user, $pass)){
        Session::set('MikMan', TRUE);
        Redirect::to('admin');
      }else{
        Redirect::to('dashboard');
      }
      // var_dump($this->API);
    }
  }
}
