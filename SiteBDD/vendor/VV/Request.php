<?php

namespace VV;

class Request
{
    protected $base = '';
    protected $url = '';
    protected $vars = [];
    protected $post = [];
    protected $files = null;

    public function __construct()
    {
        $this->base = dirname($_SERVER['PHP_SELF']) == DIRECTORY_SEPARATOR ? dirname($_SERVER['PHP_SELF']) : dirname(
                $_SERVER['PHP_SELF']
            ) . DIRECTORY_SEPARATOR;
        $this->base = str_replace('/', DIRECTORY_SEPARATOR, $this->base);

        $uri = str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['REQUEST_URI']);
        $uri = substr($uri, mb_strlen($this->base));

        $reponse = [];
        preg_match_all('/[^\/\\\]+/', $uri, $reponse);
        $vars = $reponse[0] ?? [];
        $this->url = $vars[0] ?? '';
        for ($i = 1; $i < count($vars); $i += 2) {
            $this->vars[$vars[$i]] = $vars[$i + 1] ?? '';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->files = $_FILES;
        }
    }

    public function getBase(): string
    {
        return $this->base;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getVars(): array
    {
        return $this->vars;
    }

    public function getPost(): ?array
    {
        return $this->post;
    }

    public function post(): bool
    {
        return $this->post != [];
    }

    public function getFiles(string $name): ?array
    {
        return $this->files[$name];
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->post)) return $this->post[$name];
        if (array_key_exists($name, $this->vars)) return $this->vars[$name];
        if (array_key_exists($name, $this->files)) return $this->files[$name];
        return null;
    }
}