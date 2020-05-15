<?php

class Welcome extends Controller{
  // public function __construct(){
  //   if(empty(Session::get('MikrotikAdmin'))){
  //     Redirect::to(BASEURL);
  //   }
  // }
  // public function __construct(){
  //   parent::__construct();
  // }
  public function index(){
    $this->view('login/index');
  }

  public function login(){
    if(!Input::exists('POST')){
      Redirect::to(BASEURL);
    }

    $ip = Input::get('ip');
    $user = Input::get('user');
    $pass = Input::get('pass');

    $this->API->debug = TRUE;
    if(!empty($ip) && !empty($user)){
      if($this->API->connect($ip, $user, $pass)){
        echo "YES";
      }else{
        echo "NO";
      }
      var_dump($this->API);
    }

  }
}
