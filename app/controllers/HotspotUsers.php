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
	      $value['name'],
	      $value['profile'],
	      $value['uptime'],
	      $value['bytes-in'],
	      $value['bytes-out'],
				"<a class='badge badge-primary' href='".BASEURL."HotspotUsers/edit/".$value['.id']."'>Edit</a>
				 <button type='button' class='badge badge-danger delete text-white' id='".$value['.id']."'>Delete</button>"
      );
    }

		$result = array(
			"draw"				 		=> 1,
			"recordsTotal" 		=> count($list),
			"recordsFiltered" => 2,
			"data"						=> $data
		);
		//var_dump(count($list));
    echo json_encode($result);

  }

  public function delete($id)
  {

	  if (!empty($id)) {
		  $delete = $this->API->comm('/ip/hotspot/user/remove', array(
			  ".id" => $id
		  ));
		  if ($delete) {
			  echo "User terhapus";
		  }else{
				echo "Error hapus user";
			}
	  }

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
