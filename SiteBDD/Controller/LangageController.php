<?php

namespace Controller;

use Entity\Langage;
use Model\LangageManager;
use VV\Request;
use VV\Router;

class LangageController
{
    private $manager;

    public function __construct()
    {
        $this->manager = new LangageManager;
    }

    public function index(Request $request, Router $routes)
    {
        $page_title = "Langages";
        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";

        // récupération des langages
        $listeLangages = $this->manager->findAll();

        // view
        require "View/langage/index.php";
    }

    public function afficher(Request $request, Router $routes)
    {
        $id = $request->id ?? 1;

        // langage
        $langage = $this->manager->find($id);

        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";

        $page_title = "Langage " . $langage->titre;


        // view
        require "View/langage/afficher.php";
    }

    public function ajouter(Request $request, Router $routes)
    {
        $page_title = "Ajouter un langage";
        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";

        if ($request->post()) {
            if ($request->ajouter !== null) {

                // langage
                $langage = new Langage(
                    [
                        'titre' => $request->titre,
                        'resume' => $request->resume
                    ]
                );

                // ajouter langage
                $langage = $this->manager->insert($langage);

                // récupération logo
                if ($request->logo && is_uploaded_file($request->logo['tmp_name'])) {
                    $logo = $langage->id . "_" . $request->titre . "." . strtolower(
                            pathinfo($request->logo['name'], PATHINFO_EXTENSION)
                        );
                    $origine = $request->logo['tmp_name'];
                    $destination = "images/$logo";
                    move_uploaded_file($origine, $destination);

                    $langage->logo = $logo;
                    $this->manager->update($langage);
                }

                // redirection
                header("location:{$request->getBase()}{$routes->path('langage','afficher')}/id/{$langage->id}");
                exit();
            }
        }

        // view
        require "View/langage/ajouter.php";
    }

    public function supprimer(Request $request, Router $routes)
    {
        $id = $request->id ?? '';
        // langage
        $langage = $this->manager->find($id);

        if ($request->post()) {
            if ($request->supprimer !== null) {
                // suppression logo
                $url = "images/" . $langage->logo;
                if (file_exists($url)) {
                    unlink($url);
                }
                // Suppression des données
                $this->manager->delete($langage);
            }
            header("location:{$request->getBase()}{$routes->path('langage','index')}");
        }

        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";
        $page_title = "Supprimer le langage " . $langage->titre;

        // view
        require "View/langage/supprimer.php";
    }

    public function modifier(Request $request, Router $routes)
    {
        $id = $request->id ?? '';
        // langage
        $langage = $this->manager->find($id);

        if ($request->post()) {
            if ($request->modifier !== null) {

                // langage
                $langage->titre = $request->titre;
                $langage->resume = $request->resume;

                // modification des données du formulaire
                $this->manager->update($langage);
            };
            header("location:{$request->getBase()}{$routes->path('langage','index')}");
        }


        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";
        $page_title = "Supprimer le langage " . $langage->titre;

        // view
        require "View/langage/modifier.php";
    }
}