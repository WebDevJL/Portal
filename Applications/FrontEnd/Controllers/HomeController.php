<?php

namespace Applications\Frontend\Controllers;

class HomeController extends \Library\BaseController {

  public function executeIndex(\Library\HTTPRequest $request) {
    //TODO: add resource using a Resource manage
    $this->page->addVar('title', 'Home');

    $this->page->addVar('h3_title', $this->app->i8n->getLocalResource("home","h3_title"));
    $this->page->addVar('paragraph_1', $this->app->i8n->getLocalResource("home","paragraph_1"));
    $this->page->addVar('paragraph_2', $this->app->i8n->getLocalResource("home","paragraph_2"));
    $this->page->addVar('h3_emphasis', $this->app->i8n->getLocalResource("home","h3_emphasis"));
    $this->page->addVar('about_link_text', $this->app->i8n->getLocalResource("home","about_link_text"));
    $this->page->addVar('about_url', $this->app->router->pageUrls[\Library\Enums\ResourceKeys\PublicPageUrls::AboutUrl]);
    
//    $this->page->addVar(
//            \Library\Enums\AppSettingKeys::Config_test, $this->app->config()->get(\Library\Enums\AppSettingKeys::Config_test));
//    $this->page->addVar(
//            \Library\Enums\AppSettingKeys::DefaultLanguage, $this->app->context()->language);
  }

}