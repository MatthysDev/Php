<?php

namespace Controller;

use Entity\Chanteur;
use Model\ChanteurManager;
use VV\Request;
use VV\Router;

class ChanteurController
{
    private $manager;

    public function __construct()
    {
        $this->manager = new ChanteurManager;
    }

    public function index(Request $request, Router $routes)
    {
        $page_title = "Chanteur";
        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";

        // récupération des langages
        $listeChanteurs = $this->manager->findAll();

        // view
        require "View/chanteur/index.php";
    }

    public function afficher(Request $request, Router $routes)
    {
        $id = $request->id ?? 1;

        // chanteur
        $chanteur = $this->manager->find($id);

        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";

        $page_title = "Langage " . $chanteur->nom;


        // view
        require "View/chanteur/afficher.php";
    }

    public function ajouter(Request $request, Router $routes)
    {
        $page_title = "Ajouter un chanteur";
        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";

        if ($request->post()) {
            if ($request->ajouter !== null) {

                // chanteur
                $chanteur = new Chanteur(
                    [
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'site' => $request->site
                    ]
                );

                // ajouter chanteur
                $chanteur = $this->manager->insert($chanteur);

                // récupération photo
                if ($request->photo && is_uploaded_file($request->photo['tmp_name'])) {
                    $photo = $chanteur->id . "_" . $request->nom . "." . strtolower(
                            pathinfo($request->photo['name'], PATHINFO_EXTENSION)
                        );
                    $origine = $request->photo['tmp_name'];
                    $destination = "images/chanteurs/$photo";
                    move_uploaded_file($origine, $destination);

                    $chanteur->photo = $photo;
                    $this->manager->update($chanteur);
                }

                // redirection
                header("location:{$request->getBase()}{$routes->path('chanteur','afficher')}/id/{$chanteur->id}");
                exit();
            }
        }

        // view
        require "View/chanteur/ajouter.php";
    }

    public function supprimer(Request $request, Router $routes)
    {
        $id = $request->id ?? '';
        // chanteur
        $chanteur = $this->manager->find($id);

        if ($request->post()) {
            if ($request->supprimer !== null) {
                // suppression photo
                $url = "images/" . $chanteur->photo;
                if (file_exists($url)) {
                    unlink($url);
                }
                // Suppression des données
                $this->manager->delete($chanteur);
            }
            header("location:{$request->getBase()}{$routes->path('chanteur','index')}");
        }

        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";
        $page_title = "Supprimer le chanteur " . $chanteur->nom;

        // view
        require "View/chanteur/supprimer.php";
    }

    public function modifier(Request $request, Router $routes)
    {
        $id = $request->id ?? '';
        // chanteur
        $chanteur = $this->manager->find($id);

        if ($request->post()) {
            if ($request->modifier !== null) {

                // chanteur
                $chanteur->nom = $request->nom;
                $chanteur->prenom=$request->prenom;
                $chanteur->site = $request->site;

                // modification des données du formulaire
                $this->manager->update($chanteur);
            };
            header("location:{$request->getBase()}{$routes->path('chanteur','index')}");
        }


        $page_titre = "Projet PHP";
        $page_description = "Ce projet permet de découvrir la programmation PHP.";
        $page_title = "Supprimer le chanteur " . $chanteur->nom;

        // view
        require "View/chanteur/modifier.php";
    }
}