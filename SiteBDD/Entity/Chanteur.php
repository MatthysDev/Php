<?php
namespace Entity;
use VV\AbstractEntity;

class Chanteur extends AbstractEntity
{
    protected $nom;
    protected $prenom;
    protected $site;
    protected $photo;


    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self {
        $this->prenom = $prenom;
        return $this;
    }

    public function getSite(): ?string {
        return $this->site;
    }
    public function setSite(string $site): self {
        $this->site = $site;
        return $this;
    }

    public function getPhoto(): ?string {
        return $this->photo;
    }
    public function setPhoto(string $photo): self {
        $this->photo = $photo;
        return $this;
    }


}