<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard MikMan</title>
    <link href="<?= BASEURL; ?>public/fonts/font-awesome/css/all.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>public/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= BASEURL; ?>public/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="top_navbar">
        <div class="list-menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="top_menu">
          <div class="logo">MikMan</div>
          <div class="logout"><a href="<?= BASEURL ?>dashboard/logout">Logout</a></div>
        </div>
      </div>
      <div class="sidebar">
        <ul class="list-unstyled components">
          <li>
            <a href="<?= BASEURL; ?>RouterDashboard" class="parent">
              <span class="icon">
                <i class="fa fa-tachometer-alt"></i>
              </span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle parent">
              <span class="icon"><i class="fa fa-wifi"></i></span>
              <span class="title">Hotspot</span>
            </a>
            <ul class="collapse list-unstyled submenu" id="pageSubmenu">
                <li>
                    <a href="<?= BASEURL; ?>HotspotUsers">
                      <span class="icon"><i class="fa fa-users"></i></span>
                      <span class="title">Users</span>
                    </a>
                </li>
                <li>
                  <a href="#">
                    <span class="icon"><i class="fa fa-users-cog"></i></span>
                    <span class="title">User Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="icon"><i class="fa fa-wifi"></i></span>
                    <span class="title">Hotspot</span>
                  </a>
                </li>
            </ul>
          </li>
		  <li>
            <a href="<?= BASEURL; ?>DhcpLease" class="parent">
              <span class="icon"><i class="fa fa-list"></i></span>
              <span class="title">DHCP Lease</span>
            </a>
          </li>
          <li>
            <a href="#" class="parent">
              <span class="icon"><i class="fa fa-list"></i></span>
              <span class="title">Log</span>
            </a>
          </li>
          <li>
            <a href="#" class="parent">
              <span class="icon"><i class="fa fa-cog"></i></span>
              <span class="title">System</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="container-mikman">

        <!-- CONTENT -->
        <?php
          if(!empty($data['content'])){
            require_once 'app/views/'. $data['content'] .'.php';
          }
        ?>

      </div>
    </div>
  <script src="<?= BASEURL; ?>public/js/jquery.min.js"></script>
  <script src="<?= BASEURL; ?>public/js/bootstrap.min.js"></script>
	<script src="<?= BASEURL; ?>public/js/jquery.dataTables.min.js"></script>
	<script src="<?= BASEURL; ?>public/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= BASEURL; ?>public/js/script.js"></script>
  </body>
</html>
