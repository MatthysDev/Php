<?php
// autoload
require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'vendor', 'autoload.php']);

use VV\Injecteur;
use VV\Route;
use VV\Router;
use VV\Request;
use VV\AbstractManager;
use VV\BDD\MyPDO;
use VV\BDD\MyPDOSingleton;
use VV\BDD\MySQL;

$dbParams = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'bdd',
    'port' => 8889
];

//AbstractManager::setDb(MyPDOSingleton::getInstance($dbParams));
AbstractManager::setDb(new MyPDO($dbParams));
//AbstractManager::setDb(new MySQL($dbParams));

/**
 * * Variables de requete **
 */
$request = new Request();

/**
 * * ROUTES **
 */
$routes = new Router();
$routes->addRoute(new Route(['url' => 'accueil', 'module' => 'langage', 'action' => 'index']));
$routes->addRoute(new Route(['url' => 'ajouter_un_langage', 'module' => 'langage', 'action' => 'ajouter']));
$routes->addRoute(new Route(['url' => 'afficher_un_langage', 'module' => 'langage', 'action' => 'afficher']));
$routes->addRoute(new Route(['url' => 'supprimer_un_langage', 'module' => 'langage', 'action' => 'supprimer']));
$routes->addRoute(new Route(['url' => 'modifier_un_langage', 'module' => 'langage', 'action' => 'modifier']));



$routes->addRoute(new Route(['url' => 'chanteur', 'module' => 'chanteur', 'action' => 'index']));
$routes->addRoute(new Route(['url' => 'ajouter_un_chanteur', 'module' => 'chanteur', 'action' => 'ajouter']));
$routes->addRoute(new Route(['url' => 'afficher_un_chanteur', 'module' => 'chanteur', 'action' => 'afficher']));
$routes->addRoute(new Route(['url' => 'supprimer_un_chanteur', 'module' => 'chanteur', 'action' => 'supprimer']));
$routes->addRoute(new Route(['url' => 'modifier_un_chanteur', 'module' => 'chanteur', 'action' => 'modifier']));

/*** Injecteur ***/
Injecteur::set($request);
Injecteur::set($routes);

/*** Création du controller et de son action ***/

$classController = $routes->getRoute($request->getUrl())->getController() ?? 'Controller\LangageController';
$action = $routes->getRoute($request->getUrl())->getAction() ?? 'index';

// variables
$controller = new $classController();
$controller->$action(...Injecteur::get($controller, $action));


