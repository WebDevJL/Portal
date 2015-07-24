<?php

namespace Applications\Frontend\Controllers;

class ResumeController extends \Library\BaseController {

  public function executeIndex(\Library\HTTPRequest $request) {
    //TODO: add resource using a Resource manage
    $this->page->addVar('title', 'Resume');
    
    $resourceFileKey = "resume";

    $this->page->addVar('h3_title', $this->app->i8n->getLocalResource($resourceFileKey,"h3_title"));
    $this->page->addVar('paragraph_1', $this->app->i8n->getLocalResource($resourceFileKey,"paragraph_1"));
    $this->page->addVar('paragraph_2', $this->app->i8n->getLocalResource($resourceFileKey,"paragraph_2"));
    $this->page->addVar('resume_link_text', $this->app->i8n->getLocalResource($resourceFileKey,"resume_link_text"));
    $this->page->addVar('resume_link_ext_url', $this->app->i8n->getLocalResource($resourceFileKey,"resume_link_ext_url"));
    $this->page->addVar('contact_link_text', $this->app->i8n->getLocalResource($resourceFileKey,"contact_link_text"));
    $this->page->addVar('contact_url', $this->app->router->pageUrls[\Library\Enums\ResourceKeys\PublicPageUrls::ContactUrl]);    
  }

}