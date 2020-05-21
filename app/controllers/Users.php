<?php

class Users extends Controller{

  private $kelompok = "hotspot";
  private $judul    = "Hotspot Users";
  public  $template = "users";

  public function __construct(){
    parent::__construct();
    if(!$this->is_login())
      Redirect::to('/');
  }

  public function index($menu = 'list'){
    $data['menu'] = $menu;
    $this->display_admin($this->kelompok . '/' . $this->template, $this->judul, $data);
    // echo "<pre>";
    // $list = $this->API->comm('/ip/hotspot/user/print');
    // print_r($list);
    // foreach ($list as $key => $value) {
    //   echo $value['name'];
    // }
    // echo "</pre>";
  }

  public function list(){
    $list = $this->API->comm('/ip/hotspot/user/print');
    foreach ($list as $key => $value) {
      // $data['name'] = $value['name'];
      // $data['profile'] = $value['profile'];
      // $data['uptime'] = $value['uptime'];
      // $data['bytes_in'] = $value['bytes-in'];
      // $data['bytes_out'] = $value['bytes-out'];
      $data[] = array(
        'name' => $value['name'],
        'profile' => $value['profile'],
        'uptime' => $value['uptime'],
        'bytes_in' => $value['bytes-in'],
        'bytes_out' => $value['bytes-out']
      );

    }

    echo json_encode($data);


  }

}
