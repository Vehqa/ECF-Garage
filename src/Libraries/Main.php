<?php
namespace App\Libraries;

use App\Controllers\AdminController;
use App\Controllers\MainController;
use App\Controllers\EmployeController;
use App\Controllers\ErrorController;
use App\Controllers\AnnoncesController;
use App\Controllers\LoginController;
use App\Controllers\ContactController;
use App\Controllers\HoursController;
use App\Controllers\UsersController;
use App\Controllers\ServicesController;
use App\Controllers\ReviewController;

require_once ROOT . '/vendor/autoload.php'; // Inclure votre fichier d'autoloading

class Main
{
    public function start()
    {
        // On retire le dernier slash de l'URL
        $uri = rtrim($_SERVER['REQUEST_URI'], '/');

        // Redirige si l'URL se termine par un slash
        if ($uri !== $_SERVER['REQUEST_URI']) {
            http_response_code(301);
            header('Location: ' . $uri);
            exit();
        }

        // Vérifier si l'utilisateur est connecté
        $loggedIn = $this->checkLoggedIn();

        // ROUTES :

        //Main 
        if ($uri === '/main') {
            $controller = new MainController();
            $controller->index();
        } elseif ($uri === '/main') {
            $controller = new MainController();
            $reviews = $controller->getAcceptedReviews();
            $controller->index($reviews);
        } elseif ($uri === '/main/create') {
            $controller = new MainController();
            $controller->createReview();

        // Page Services
        } elseif ($uri === '/services') {
            $controller = new ServicesController();
            $controller->index();

        //Login Page
        } elseif ($uri === '/login') {
            $controller = new LoginController();
            $controller->index();

        //Dashboard Employe
        } elseif ($loggedIn && $uri === '/employe') { // Login check
            $controller = new EmployeController();
            $controller->index();
        // View des avis
        } elseif ($loggedIn && $uri === '/employe/review') { // Login check
            $controller = new ReviewController();
            $controller->index();
        //Création d'annonce
        } elseif ($loggedIn && $uri === '/employe/create') { // Login check
            $controller = new EmployeController();
            $controller->createAnnonce();
        }   elseif ($loggedIn && $uri === '/employe/form') { // Login check
            $controller = new EmployeController();
            $controller->showForm();
        }  // Gestion supression d'annonce
        elseif ($loggedIn && strpos($uri, '/employe/delete/') === 0) { // Login check
            $id_car = substr($uri, strlen('/employe/delete/'));
            $controller = new EmployeController();
            $controller->deleteAnnonce($id_car);
            // Mettre a jour les annonces
        } elseif ($loggedIn && strpos($uri, '/employe/update/') === 0) { // Login check
            $id_car = substr($uri, strlen('/employe/update/'));
            $id_car = intval($id_car); // Convertir en entier
            if ($id_car > 0) {
                $controller = new EmployeController();
                $controller->updateAnnonce($id_car);
            } else {
                http_response_code(404);
                $controller = new ErrorController();
                $controller->index();
            }
            //Accepter les avis ! 
        } elseif ($loggedIn && strpos($uri, '/employe/updatereview/') === 0) { // Login check
            $id_review = substr($uri, strlen('/employe/updatereview/'));
            $id_review = intval($id_review); // Convertir en entier
            if ($id_review > 0) {
                $controller = new EmployeController();
                $controller->updateReview($id_review);
            } else {
                http_response_code(404);
                $controller = new ErrorController();
                $controller->index();
            }
            //supprimer les avis
        } elseif ($loggedIn && strpos($uri, '/employe/deletereview/') === 0) { // Login check
            $id_review = substr($uri, strlen('/employe/deletereview/'));
            $controller = new EmployeController();
            $controller->deleteReview($id_review);


        //Dashboard Admin
             // View des horraire d'ouverture
        } elseif ($loggedIn && $uri === '/adminhour') { // Login check
            $controller = new AdminController();
            $controller->hour();
            // View des Service proposé
        } elseif ($loggedIn && $uri === '/adminservice') { // Login check
            $controller = new AdminController();
            $controller->services();
            // View des avis
        } elseif ($loggedIn && $uri === '/adminreview') { // Login check
            $controller = new AdminController();
            $controller->review();
            //Index admin / annonces
        } elseif ($loggedIn && $uri === '/admin') { // Login check
            $controller = new AdminController();
            $controller->index();
        // View pour les comptes
        } elseif ($loggedIn && $uri === '/adminaccount') { // Login check
            $controller = new UsersController();
            $controller->users();
        // Mettre a jour les comptes employés
        } elseif ($loggedIn && strpos($uri, '/admin/updateaccount/') === 0) { // Login check
            $id_users = substr($uri, strlen('/admin/updateaccount/'));
            $id_users = intval($id_users); // Convertir en entier
            if ($id_users > 0) {
                $controller = new AdminController();
                $controller->updateAccount($id_users);
            } else {
                http_response_code(404);
                $controller = new ErrorController();
                $controller->index();
            }
        // Accepter les Avis clients
        } elseif ($loggedIn && strpos($uri, '/admin/updatereview/') === 0) { // Login check
            $id_review = substr($uri, strlen('/admin/updatereview/'));
            $id_review = intval($id_review); // Convertir en entier
            if ($id_review > 0) {
                $controller = new AdminController();
                $controller->updateReview($id_review);
            } else {
                http_response_code(404);
                $controller = new ErrorController();
                $controller->index();
            }
            //Supression des review
        } elseif ($loggedIn && strpos($uri, '/admin/deletereview/') === 0) { // Login check
            $id_review = substr($uri, strlen('/admin/deletereview/'));
            $controller = new AdminController();
            $controller->deleteReview($id_review);

            // Creation d 'annonce
        } elseif ($loggedIn && $uri === '/admin/create') { // Login check
            $controller = new AdminController();
            $controller->createAnnonce();
            // View du formulaire d'annonce
        }   elseif ($loggedIn && $uri === '/admin/form') { // Login check
            $controller = new AdminController();
            $controller->showForm(); 

        // Visibilité de la view creation employé
        }  elseif ($loggedIn && $uri === '/admin/formEmploye') { // Login check
        $controller = new AdminController();
        $controller->showFormEmploye();
        //Creation de l'employe + redirection.
        } elseif ($loggedIn && $uri === '/admin/employe') { // Login check
        $controller = new AdminController();
        $controller->createEmploye();
        // Gestion supression d'annonce
        } elseif ($loggedIn && strpos($uri, '/admin/delete/') === 0) { // Login check
            $id_car = substr($uri, strlen('/admin/delete/'));
            $controller = new AdminController();
            $controller->deleteAnnonce($id_car);
        // Mettre a jour les annonces
        } elseif ($loggedIn && strpos($uri, '/admin/update/') === 0) { // Login check
            $id_car = substr($uri, strlen('/admin/update/'));
            $id_car = intval($id_car); // Convertir en entier
            if ($id_car > 0) {
                $controller = new AdminController();
                $controller->updateAnnonce($id_car);
            } else {
                http_response_code(404);
                $controller = new ErrorController();
                $controller->index();
            }
            // Modification d'horraire
        } elseif ($loggedIn && strpos($uri, '/admin/updatehour/') === 0) { // Login check
                $id_hour = substr($uri, strlen('/admin/updatehour/'));
                $id_hour = intval($id_hour); // Convertir en entier
                if ($id_hour > 0) {
                    $controller = new AdminController();
                    $controller->updateHour($id_hour);
                } else {
                    http_response_code(404);
                    $controller = new ErrorController();
                    $controller->index();
                }
            // Modification des services proposé 
        } elseif ($loggedIn && strpos($uri, '/admin/updateservice/') === 0) { // Login check
            $id_service = substr($uri, strlen('/admin/updateservice/'));
            $id_service = intval($id_service); // Convertir en entier
            if ($id_service > 0) {
                $controller = new AdminController();
                $controller->updateService($id_service);
            } else {
                http_response_code(404);
                $controller = new ErrorController();
                $controller->index();
            }

            //Suppression de compte employé
        } elseif ($loggedIn && strpos($uri, '/admin/deleteaccount/') === 0) { // Login check
            $id = substr($uri, strlen('/admin/deleteaccount/'));
            $controller = new AdminController();
            $controller->deleteAccount($id);


// Les Pages 
        // Page Annonces
        }  elseif ($uri === '/annonces') {
            $controller = new AnnoncesController();
            $controller->index();

            // Page Information ( Pour tester)
        }  elseif ($uri === '/information') {
            $controller = new HoursController();
            $controller->index();


        // Page Contact
        } elseif ($uri === '/contact') {
            $controller = new ContactController();
            $controller->index();
            // Envoyer le formulaire de contact
        } elseif ($uri === '/contact/submit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new ContactController();
            $controller->submitForm();
            // Si Nous contacter dans annonces =
        } elseif (strpos($uri, '/contact?title=') === 0) {
            $title = urldecode(substr($uri, strlen('/contact?title=')));
            $controller = new ContactController();
            $controller->index($title);
        

        //Gestion decconexion
        } elseif ($uri === '/logout') {
            $controller = new LoginController();
            $controller->logout();
            exit();

        // Error 404
        }  else {
        http_response_code(404);
        $controller = new ErrorController();
        $controller->index();
        } 
    }

//Fonction pour savoir si l'user est connecter :
private function checkLoggedIn()
    {
        if (isset($_SESSION['user_id'])) { // Session selon l'id
            return true; // L'utilisateur est connecté
        } else {
            return false; // L'utilisateur n'est pas connecté
        }
    }   
}