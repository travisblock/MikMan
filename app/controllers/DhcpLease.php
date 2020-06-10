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
			$data['lease'] = $this->list();
	    $this->displayAdmin($this->kelompok . '/' . $this->template, $this->judul, $data);
    }

	public function list(){
		$list = $this->API->comm('/ip/dhcp-server/lease/print');
		$lease = null;
		if (!empty($list)) {
	    foreach ($list as $key => $value) {
	      $lease[] = array(
				'id'			=> $value['.id'],
				'address'	=> $value['address'],
				'mac'			=> $value['mac-address'],
				'server'	=> $value['server']
	      );
	    }
		}

		return $lease;
	}
}
