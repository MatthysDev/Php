<?php
namespace VV\BDD;

interface BDDInterface
{
    public function myQuery($query);
    public function lastInsertId();
}