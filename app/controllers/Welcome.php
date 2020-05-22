<?php

class Welcome extends Controller
{

  public function index()
  {
    $this->view('login/index');
  }

  public function login()
  {
    if (!Input::exists('POST')) {
      Redirect::to('/');
    }

    $ip   = Input::get('ip');
    $user = Input::get('user');
    $pass = Input::get('pass');

    if (!empty($ip) && !empty($user)) {
      if ($this->API->connect($ip, $user, $pass)) {
        Session::set('MikMan', TRUE);
        Redirect::to('Admindashboard');
      } else {
        Redirect::to('/');
      }
    }

  }

  public function loginDashboard()
  {
    if (!Input::exists('POST')) {
      Redirect::to('/');
    }

    $user = Input::get('user');
    $pass = Input::get('pass');

    if (!empty($user) && !empty($pass)) {
      if ($user === 'ajid' && $pass === 'gans') {
        Session::set('LoginAdmin', TRUE);
        Redirect::to('AdminDashboard');
      } else {
        Redirect::to('/');
      }
    }
  }
}
