<?php
namespace VV;

abstract class Injecteur
{
    // liste des paramètres pouvant être injectés
    protected static $dependencys;

    // permet de récupérer les paramètres de la méthode $method de l'objet $objet
    public static function get($objet, $method)
    {
        // objet contenant les informations de la classe de $objet (méthodes, paramètres...)
        $reflectorClass = new \ReflectionClass(get_class($objet));

        // on vérifie que $method est une méthode de $objet
        if($reflectorClass->hasMethod($method)){
            $dependencys = self::$dependencys;
            // on boucle sur l'ensemble des paramètres de la méthode $method
            // et on retourne un tableau des réponses
            return array_map(function($reflectorParameter)use($dependencys){
                // on recherche la valeur du tableau associatif $dependencys
                // dont la clé correspond à la classe du paramètre
                return $dependencys[$reflectorParameter->getType()->getName()];
            }, $reflectorClass->getMethod($method)->getParameters());
        }
        return [];
    }

    // permet d'ajouter un objet au tableau associatif $dependencys
    // la clé correspond à la classe de l'objet
    // la valeur à l'objet lui-même
    public static function set($objet){
        self::$dependencys[get_class($objet)] = $objet;
    }

}