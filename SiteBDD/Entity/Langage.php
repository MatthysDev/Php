<?php
namespace Entity;
use VV\AbstractEntity;

class Langage extends AbstractEntity
{
    protected $titre;
    protected $resume;
    protected $logo;


    public function getTitre(): ?string {
        return $this->titre;
    }

    public function setTitre(string $titre): self {
        $this->titre = $titre;
        return $this;
    }

    public function getResume(): ?string {
        return $this->resume;
    }
    public function setResume(string $resume): self {
        $this->resume = $resume;
        return $this;
    }

    public function getLogo(): ?string {
        return $this->logo;
    }
    public function setLogo(string $logo): self {
        $this->logo = $logo;
        return $this;
    }


}