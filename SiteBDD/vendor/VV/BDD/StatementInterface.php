<?php
namespace VV\BDD;

interface StatementInterface
{
    public function fetch();

    public function fetchAll();
}