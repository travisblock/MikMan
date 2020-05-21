<?php

class Admin extends Controller{
  private $kelompok = "admin";
  private $judul    = "Dashboard Admin";
  public  $template = "index";

  public function __construct(){
    parent::__construct();
    if(!$this->is_login())
      Redirect::to('/');
  }

  public function index(){
    $this->display_admin($this->kelompok . '/' . $this->template, $this->judul);
  }

  public function infoDashboard(){

    $date = $this->API->comm("/system/clock/print");
    $data['date']  = ucfirst($date[0]['date']);
    $data['time']  = $date[0]['time'];

    $resource = $this->API->comm("/system/resource/print");
    $data['cpu_load'] = $resource[0]['cpu-load'];
    $data['free_memory'] = $resource[0]['free-memory'];
    $data['free_hdd'] = $resource[0]['free-hdd-space'];
    $data['uptime'] = $resource[0]['uptime'];
    $data['version'] = $resource[0]['version'];
    $data['board_name'] = $resource[0]['board-name'];

    $model = $this->API->comm("/system/routerboard/print");
    $data['model'] = ($model[0]['routerboard'] !== 'false') ? $model[0]['routerboard'] : "No";

    echo json_encode($data);
  }

}
