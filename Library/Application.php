<?php

namespace Library;

abstract class Application {

  protected $httpRequest;
  protected $httpResponse;
  public $name;
  public $locale;
  public $localeDefault;

  protected $user;
  protected $config;
  public $i8n;
  public $pageUrls;

  public function __construct() {
    $this->httpRequest = new HttpRequest($this);
    $this->httpResponse = new HttpResponse($this);

    $this->router = new Router($this);
    $this->user = new User($this);
    $this->config = new Config($this);
    $this->context = new Context($this);
    $this->i8n = new Globalization($this);    
    $this->locale = $this->httpRequest->initLanguage($this, "browser");
    echo '<!-- locale=' . $this->locale . ' -->';
    $this->name = '';
  }
  public function initConfig() {
    
  }

  public function getController() {
//    //
//    $router = new \Library\Router;
//    $router->LoadAvailableRoutes($this);
    $this->router->LoadAvailableRoutes($this);
    $matchedRoute = $this->FindRouteMatch();

    // On ajoute les variables de l'URL au tableau $_GET.
    $_GET = array_merge($_GET, $matchedRoute->vars());

    $controllerClass = $this->BuildControllerClass($matchedRoute);
    if (!file_exists(__ROOT__ . str_replace('\\', '/', $controllerClass) . Enums\FileNameConst::ClassSuffix)) {
      $this->httpResponse->displayError(Enums\ErrorCodes::ControllerNotExist); //Controller doesn't exist
    }
    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  }

  abstract public function run();

  public function httpRequest() {
    return $this->httpRequest;
  }

  public function httpResponse() {
    return $this->httpResponse;
  }

  public function user() {
    return $this->user;
  }

  public function config() {
    return $this->config;
  }

  public function context() {
    return $this->context;
  }
  
  public function i8n() {
    return $this->i8n;
  }
  
  public function pageUrls() {
    return array();
  }  
  
  public function router() {
    return $this->router;
  }

  public function name() {
    return $this->name;
  }

  private function FindRouteMatch() {
    try {
      // On récupère la route correspondante à l'URL.
      return $this->router->getRoute($this->httpRequest->requestURI());
    } catch (\RuntimeException $e) {
      if ($e->getCode() == \Library\Router::NO_ROUTE) {
        // Si aucune route ne correspond, c'est que la page demandée n'existe pas.
        $this->httpResponse->displayError(\Library\Enums\ErrorCodes::PageNotFound);
      }
    }
  }

  private function BuildControllerClass($route) {
    return Enums\NameSpaceName::AppsFolderName
            . $this->name
            . Enums\NameSpaceName::ControllersFolderName
            . $route->module()
            . Enums\FileNameConst::ControllerSuffix;
  }

}