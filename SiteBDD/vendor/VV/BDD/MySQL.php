<?php
namespace VV\BDD;


class MySQL implements BDDInterface
{
    private $link;

    public function __construct(array $dbParams)
    {
        $this->link = mysqli_connect($dbParams['host'], $dbParams['user'], $dbParams['password'], $dbParams['dbname']);

        mysqli_set_charset($this->link, "utf8");
    }

    public function myQuery($query): MySQLStatement
    {
        return new MySQLStatement(mysqli_query($this->link, $query));
    }

    public function lastInsertId()
    {
        return mysqli_insert_id($this->link);
    }

}