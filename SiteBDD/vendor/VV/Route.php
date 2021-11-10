<?php

namespace VV;

class Route extends AbstractEntity
{

    protected $action;
    protected $module;
    protected $url;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

   public function getModule()
    {
        return $this->module;
    }

    public function setModule($module)
    {
        $this->module = $module;
    }

    public function getController()
    {
        if ($this->getModule() == null) return null;
        return 'Controller\\' . ucfirst($this->getModule()) . 'Controller';
    }

}