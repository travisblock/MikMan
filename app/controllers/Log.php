<?php

class Log extends Controller
{
	  private $kelompok = "hotspot";
	  private $judul    = "Log Router";
	  public  $template = "log";

	  public function __construct()
	  {
		  parent::__construct();
		  if (!$this->isLogin())
		  	Redirect::to('/');
	  }

	  public function index()
	  {
		  $this->displayAdmin($this->kelompok . '/' . $this->template, $this->judul);
	  }

	  public function showLog()
	  {
		  $logs = $this->API->comm('system/log/print');
		  $log = $logs[0]['log'];

		  echo json_encode($log);
	  }

}
