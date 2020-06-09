<?php

/**
* @author Yusuf Al Majid <ajidalmajid6@gmail.com>
* @license MIT
* @version 0.0.1
*/

class Msg
{

  public static function setMsg($type, $msg)
  {
    $_SESSION['msg'] = [
      'msg'  => $msg,
      'type' => $type
    ];
  }

  public static function show()
  {
    if (isset($_SESSION['msg'])) {

			if ($_SESSION['msg']['type'] === 'success') {
				echo '<div id="notify">
								<div class="msg success"><i class="fa fa-check-circle"></i> <b>Success</b><br>'.$_SESSION['msg']['msg'].'<i class="fa fa-times close"></i></div>
							</div>';
			} elseif ($_SESSION['msg']['type'] === 'info') {
				echo '<div id="notify">
								<div class="msg info"><i class="fa fa-info-circle"></i> <b>Info</b><br>'.$_SESSION['msg']['msg'].'<i class="fa fa-times close"></i></div>
							</div>';
			} elseif ($_SESSION['msg']['type'] === 'warning') {
				echo '<div id="notify">
								<div class="msg warning"><i class="fa fa-exclamation-circle"></i> <b>Warning</b><br>'.$_SESSION['msg']['msg'].'<i class="fa fa-times close"></i></div>
							</div>';
			} else {
				echo '<div id="notify">
								<div class="msg error"><i class="fa fa-times-circle"></i> <b>Error</b><br>'.$_SESSION['msg']['msg'].'<i class="fa fa-times close"></i></div>
							</div>';
			}

      unset($_SESSION['msg']);
    }
  }

}
