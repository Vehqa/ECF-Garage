<?php
namespace App\Controllers;

use App\Models\LoginModel;


class LoginController {
    public function index()
        {
            // View LOGIN
            include_once ROOT.'/Views/login/index.php';
        }

    private $model;
    public function __construct() {
        $this->model = new LoginModel();
    }

    public function login($email_users, $password_users) {
        session_start();
        // Vérification E-mail / Password 
        $user = $this->model->getUserByEmailAndPassword($email_users, $password_users);
        if ($user) {
            // Vérification du rôle de l'utilisateur : ADMIN 
            if ($user->id_role == 1) {
                $_SESSION['user_id'] = $user->id;
                header("Location: /admin");
                // Vérification du rôle de l'utilisateur : EMPLOYE 
            } elseif ($user->id_role == 2) {
                $_SESSION['user_id'] = $user->id;
                header("Location: /employe");
            } else {
                echo 'Vous n\'avez pas les droits d\'accès appropriés.';
            }
        } else {
            echo '<span style="color: red;">E-Mail ou mot de passe incorrect</span>';
        }
    }
    // Déconnexion 
    public function logout()
    {
        session_start();
        // Destruction de la session / Plus de login
        $_SESSION = array();
        session_destroy();
        // Redirection
        header('Location: /login');
        exit();
    }
}

// Traitement du formulaire 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email_users']) && isset($_POST['password_users'])) {
        $email_users = $_POST['email_users'];
        $password_users = $_POST['password_users'];
        $controller = new LoginController();
        $controller->login($email_users, $password_users);
    } else {
        echo 'Veuillez remplir tous les champs du formulaire.';
    }
}
