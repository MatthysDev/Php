<?php
namespace Model;
use VV\AbstractManager;
use Entity\Langage;

class LangageManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct(Langage::class);
    }
}