<?php

namespace Applications\FrontEnd;

class FrontEndApplication extends \Library\Application {

  public function __construct() {
    parent::__construct();

    $this->name = 'FrontEnd';
    $this->context()->setLanguage();
    
  }

  public function run() {
    $this->i8n->loadResources();
    $controller = $this->getController();
    $controller->execute();

    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }

}