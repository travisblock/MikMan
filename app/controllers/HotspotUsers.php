<?php

class HotspotUsers extends Controller
{

  private $kelompok = "hotspot";
  private $judul    = "Hotspot Users";
  public  $template = "users";

  public function __construct()
  {
    parent::__construct();
    if (!$this->isLogin())
      Redirect::to('/');
  }

  public function index($menu = 'list')
  {

    $data['menu'] = $menu;
    $this->displayAdmin($this->kelompok . '/' . $this->template, $this->judul, $data);
  }

  public function list()
  {
    $list = $this->API->comm('/ip/hotspot/user/print');
    foreach ($list as $key => $value) {
    	$data[] = array(
				'id'				=> $value['.id'],
	      'name'      => $value['name'],
	      'profile'   => $value['profile'],
	      'uptime'    => $value['uptime'],
	      'bytes_in'  => $value['bytes-in'],
	      'bytes_out' => $value['bytes-out']
      );
    }

    echo json_encode($data);

  }

  public function delete($id)
  {

	  if (!empty($id)) {
		  $delete = $this->API->comm('/ip/hotspot/user/remove', array(
			  ".id" => $id
		  ));
		  if ($delete) {
			  Redirect::to('HotspotUsers');
		  }
	  }

	  Redirect::to('HotspotUsers');
  }

// test
  // public function edit($id)
  // {
	//   $user = $this->API->comm('/ip/hotspot/user/print', array(
	// 	  ".id" => $id
	//   ));
	//   if ($user) {
	// 	  $edit = $this->API->comm('/ip/hotspot/set,', array(
	// 		  'id'		=> $value['.id'],
	//           'name'      => $value['name'],
	//           'profile'   => $value['profile'],
	//           'uptime'    => $value['uptime'],
	//           'bytes_in'  => $value['bytes-in'],
	//           'bytes_out' => $value['bytes-out']
	// 	  ))
	//   }
  // }

}
