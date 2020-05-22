<?php

class ControlRouter extends Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->isLoginDashboard())
      Redirect::to('/');
  }

  public function index()
  {

  }

  public function add()
  {
    if (!Input::exists('POST'))
      Redirect::to('/');

    $ip   = Input::get('ip');
    $user = Input::get('user');
    $pass = Input::get('pass');

    if (!empty($ip) && !empty($user)) {
      if ($this->API->connect($ip, $user, $pass)) {
        Session::set('MikMan', TRUE);
        Session::set('ip', $ip);
        Session::set('user', $user);
        Session::set('pass', $pass);
        Redirect::to('admin');
      } else {
        Redirect::to('dashboard');
      }
    }
  }

  public function save()
  {
    $file = fopen('app/config/router.php', 'a') or die("Tidak bisa membuka file");
    $text = "\$data['router'] = array('". $_POST['ip'] ."', '". $_POST['user'] ."', '". $_POST['pass'] ."');" . PHP_EOL;
    fwrite($file, $text);
    fclose($file);

    if (is_file('app/config/router.php')) {
      echo "OK";
    }
    
    echo $_POST['ip'];
  }
}
