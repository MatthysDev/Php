<?php
namespace VV\BDD;

use PDO;
use PDOStatement;

class MyPDOStatement implements StatementInterface
{

    protected $statement;

    public function __construct(PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    public function fetch()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}