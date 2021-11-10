<?php
namespace VV\BDD;

class MyPDOSingleton extends \PDO implements BDDInterface
{
    private static $dbParams;
    private static $instance = null;

    private function __construct()
    {
        $dbParams = self::$dbParams;
        $dsn = "mysql:host={$dbParams['host']};port={$dbParams['port']};dbname={$dbParams['dbname']}";
        $username = $dbParams['user'];
        $password = $dbParams['password'];
        $options = array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
        try {
            parent::__construct($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            echo "Erreur de connexion";
            die();
        }
    }

    public function myQuery($query): MyPDOStatement
    {
        try {
            return new MyPDOStatement(parent::query($query));
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getTrace()[0]["args"][0];
            die();
        }
    }

    public static function getInstance($dbParams): self
    {
        self::$dbParams = $dbParams;
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }


}