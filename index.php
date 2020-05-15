<?php
// require('inc/api.class.php');
// $API    = new RouterosAPI();
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(!empty($_POST['ip'] && $_POST['user'])){
//         if(isset($_POST['submit'])){
//             session_start();
//             $_SESSION['ip']     = $_POST['ip'];
//             $_SESSION['user']   = $_POST['user'];
//             $_SESSION['pass']   = $_POST['pass'];
//             $_SESSION['mikrotik'] = TRUE;
//
//             if($API->connect($_SESSION['ip'], $_SESSION['user'], $_SESSION['pass'])){
//             header('location:home.php');
//
//             }elseif(!$API->connect($_SESSION['ip'], $_SESSION['user'], $_SESSION['pass'])){
//                 header('location:index.php');
//             }
//             $API->disconnect();
//         }
//     }
// }

require_once 'app/init.php';

$app = new App;


?>
