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

		$data['list'] = $this->list();
    $this->displayAdmin($this->kelompok . '/' . $this->template, $this->judul, $data);

  }

  public function list()
  {
    $list = $this->API->comm('/ip/hotspot/user/print');
		$datalist = null;
		
		if (!empty($list)) {
	    foreach ($list as $key => $value) {
	    	$datalist[] = array(
		      $value['name'],
		      $value['profile'],
		      $value['uptime'],
		      $value['bytes-in'],
		      $value['bytes-out'],
					"<a class='badge badge-primary' href='".BASEURL."HotspotUsers/edit/".$value['.id']."'>Edit</a>
					 <a class='badge badge-danger delete normal' id='".$value['.id']."'>Delete</a>"
	      );
	    }
		}

    return $datalist;

  }

  public function delete($id)
  {
	  if (!empty($id)) {
		  $delete = $this->API->comm('/ip/hotspot/user/remove', array(
			  ".id" => $id
		  ));
		  if (!$delete) {
			  Msg::setMsg('success', 'User berhasil dihapus');
		  }else{
				Msg::setMsg('error', 'User gagal dihapus');
			}
	  }

  }

	public function add()
	{
		$add = $this->API->comm('/ip/hotspot/user/add', array(
			"name"		 		 => $_POST['username'],
			"password"		 => $_POST['password'],
			"limit-uptime" => $_POST['uptime']
		));

		Msg::setMsg('success', 'User berhasil ditambahkan');
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
