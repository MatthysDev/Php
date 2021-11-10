<?php
namespace VV\BDD;

class MySQLStatement implements StatementInterface
{

    protected $statement;

    public function __construct($statement)
    {
        $this->statement = $statement;
    }

    public function fetch()
    {
        return mysqli_fetch_assoc($this->statement);
    }

    public function fetchAll()
    {
        $tab = [];
        while($obj = mysqli_fetch_assoc($this->statement))
        {
            $tab[] = $obj;
        }
        return $tab;
    }
}