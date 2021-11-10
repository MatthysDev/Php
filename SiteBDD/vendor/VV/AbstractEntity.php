<?php

namespace VV;

abstract class AbstractEntity
{
    protected $id;

    public function __construct(array $datas = [])
    {
        $this->hydrate($datas);
        return $this;
    }

    protected function hydrate(array $datas): self
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function getId(): ?int
    {
        return (int)$this->id;
    }

    public function setId(int $id): self
    {
        $this->id = (int)$id;
        return $this;
    }
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) return $this->$method();
        return null;
    }

    public function __set($name, $value)
    {
        $method = 'set' . ucfirst($name);
        if (method_exists($this, $method)) return $this->$method($value);
        return null;
    }

}