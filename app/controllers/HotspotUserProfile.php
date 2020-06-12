<?php

class HotspotUserProfile extends Controller
{
		private $kelompok = "hotspot";
    private $judul    = "Hotspot User Profile";
    public  $template = "user_profile";

    public function __construct()
    {
      parent::__construct();
      if (!$this->isLogin())
        Redirect::to('/');
    }

    public function index()
    {
			$data['profile'] = $this->list();
	    $this->displayAdmin($this->kelompok . '/' . $this->template, $this->judul, $data);
    }

	public function list(){
		$list = $this->API->comm('/ip/hotspot/user/profile/print');
		$profile = null;
		if (!empty($list)) {
	    foreach ($list as $key => $value) {
	      $profile[] = array(
				'id'			=> $value['.id'],
				'name'		=> $value['name'],
				'session'	=> $value['session-timeout'],
				'idle'		=> $value['idle-timeout'],
				'shared'	=> $value['shared-users'],
				'rate'		=> $value['rate-limit'],
				'action'	=> "<a class='badge badge-primary' href='".BASEURL."hotspot_user_profile/edit/".$value['.id']."'>Edit</a>
				 							<a class='badge badge-danger delete normal' id='".$value['.id']."'>Delete</a>"
	      );
	    }

		}

		return $profile;
	}

	public function add()
	{
		
	}
}
