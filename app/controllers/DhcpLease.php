<?php

class DhcpLease extends Controller
{
	private $kelompok = "dhcp";
    private $judul    = "DHCP Lease";
    public  $template = "lease";

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

	public function list(){
		$list = $this->API->comm('/ip/dhcp-server/lease/print');
	    foreach ($list as $key => $value) {
	      $data[] = array(
			'id'		=> $value['.id'],
			'address'	=> $value['address'],
			'mac'		=> $value['mac-address'],
			'server'	=> $value['server']
	      );
	    }

		echo json_encode($data);
		//print_r($list);
	}
}
