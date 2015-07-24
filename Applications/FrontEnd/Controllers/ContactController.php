<?php

namespace Applications\Frontend\Controllers;

class ContactController extends \Library\BaseController {

  public function executeIndex(\Library\HTTPRequest $request) {
    //TODO: add resource using a Resource manage
    $this->page->addVar('title', 'Contact');
    $resourceFileKey = "contact";

    $this->page->addVar('h3_title', $this->app->i8n->getLocalResource($resourceFileKey,"h3_title"));
    $this->page->addVar('input_1_placeholder', $this->app->i8n->getLocalResource($resourceFileKey,"input_1_placeholder"));
    $this->page->addVar('input_2_placeholder', $this->app->i8n->getLocalResource($resourceFileKey,"input_2_placeholder"));
    $this->page->addVar('input_3_placeholder', $this->app->i8n->getLocalResource($resourceFileKey,"input_3_placeholder"));
    $this->page->addVar('submit_link_text', $this->app->i8n->getLocalResource($resourceFileKey,"submit_link_text"));
    $this->page->addVar('submit_url', $this->app->router->pageUrls[\Library\Enums\ResourceKeys\PublicPageUrls::ContactUrl]);    
  }
}