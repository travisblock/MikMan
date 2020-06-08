<?php

class App
{

  protected $controller = 'Welcome',
            $method     = 'index',
            $params     = [];

  function __construct()
  {
    $url = $this->getURL();

    if (!is_null($url)) {

			$url_alias = implode('_', array_map('ucfirst', explode('_', $url[0])));
			$url_alias = str_replace('_', '', $url_alias);

      if (file_exists('app/controllers/'. $url_alias . '.php')) {
        $this->controller = $url_alias;
        unset($url[0]);
      }
    }

    require_once 'app/controllers/'. $this->controller .'.php';
    $this->controller = new $this->controller;

    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    if (!empty($url)) {
      $this->params = array_values($url);
    }

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  function getURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
