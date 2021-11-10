<?php

namespace VV;

use VV\BDD\BDDInterface;

abstract class AbstractManager
{
    private static $db;
    protected $entity = '';
    protected $table = '';

    public function __construct(string $entity)
    {
        $this->entity = $entity;
        $e = preg_replace('/.*[\\\]/', '', $entity);
        $this->table = strtolower($e) . 's';
    }

    public static function setDb(BDDInterface $db)
    {
        self::$db = $db;
    }

    public function findAll(): array
    {
        $requete = "SELECT * FROM {$this->table}";
        $listeFiches = $this->getDb()->myQuery($requete)->fetchAll();
        return array_map(
            function ($fiche) {
                return new $this->entity($fiche);
            },
            $listeFiches
        );
    }

    public function getDb(): BDDInterface
    {
        return self::$db;
    }

    public function find(int $id): ?AbstractEntity
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";

        $fiche = $this->getDb()->myQuery($sql)->fetch();
        if (!$fiche) {
            return null;
        }

        return new $this->entity($fiche);
    }

    public function update(AbstractEntity $entity): AbstractEntity
    {
        $set = array_map(
            function ($champ) use ($entity) {
                $meth = 'get' . ucfirst($champ);
                return $champ . ' = ' . "'{$entity->$meth()}'";
            },
            $this->getChamps($entity)
        );

        $sql = "UPDATE "
            . $this->table
            . " SET " . implode(', ', $set)
            . " WHERE id = '{$entity->getId()}'";
        $this->getDb()->myQuery($sql);

        return $entity;
    }

    protected function getChamps(AbstractEntity $entity): array
    {
        $columns = $this->getDb()->myQuery("SHOW COLUMNS FROM {$this->table}")->fetchAll();
        // liste des champs de la table
        $columns = array_map(
            function ($element) {
                return $element['Field'];
            },
            $columns
        );
        unset($columns[array_search('id', $columns)]);
        // récupération des champs de la table
        // filtrés en fonction de l'existance du getter
        return array_filter(
            $columns,
            function ($v) use ($entity) {
                return method_exists($entity, 'get' . ucfirst($v));
            }
        );
    }

    public function insert(AbstractEntity $entity): ?AbstractEntity
    {
        $champs = $this->getChamps($entity);
        // récupération des valeurs
        $valeurs = array_map(
            function ($champ) use ($entity) {
                $meth = 'get' . ucfirst($champ);
                return $entity->$meth();
            },
            $champs
        );

        $sql = "INSERT INTO "
            . $this->table
            . " (" . implode(", ", $champs) . ") "
            . "VALUES ('" . implode("','", $valeurs) . "')";
        $this->getDb()->myQuery($sql);

        // récupération de la fiche créée
        return $this->find($this->getDb()->lastInsertId());
    }

    public function delete(AbstractEntity $entity): self
    {
        $this->getDb()->exec("DELETE FROM {$this->table} WHERE id = {$entity->getId()}");
        return $this;
    }

}