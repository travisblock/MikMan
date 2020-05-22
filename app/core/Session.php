<?php

class Session
{

  public static function set($name, $session)
  {
    return $_SESSION[$name] = $session;
  }

  public static function get($name=null)
  {
    if (!empty($_SESSION)) {
      if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
      }
    } else {
      return false;
    }
  }

  public static function exists($name)
  {
    return (isset($_SESSION[$name])) ? true : false;
  }
}
