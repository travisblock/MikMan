<?php

/**
* @author Yusuf Al Majid <ajidalmajid6@gmail.com>
* @license MIT
* @version 0.0.1
*/

class Msg
{

  public static function setMsg($msg, $type)
  {
    $_SESSION['msg'] = [
      'msg'  => $msg,
      'type' => $type
    ];
  }

  public static function show()
  {
    if (isset($_SESSION['msg'])) {
      echo '<div id="msg" class="msg">
              <div class="'. $_SESSION['msg']['type'] .'">
                '. $_SESSION['msg']['msg'] .'
              </div>
            </div>';

      unset($_SESSION['msg']);
    }
  }

}
