<?php
namespace Model;
use VV\AbstractManager;
use Entity\Chanteur;

class ChanteurManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct(Chanteur::class);
    }
}