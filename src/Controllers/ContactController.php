<?php
namespace App\Controllers;

use App\Controllers\HoursController;
use App\Models\ContactModel;
use App\Models\HoursModel;
use App\Models\AnnoncesModel;


class ContactController extends Controller
{
    public function index($title = null)
    {
        //Instancie le modèle correspondant à la table 'ad'
        $annoncesModel = new AnnoncesModel;
        //On va chercher toutes les annonces.
        $annonces = $annoncesModel->findAll();
        //Instancie le modèle correspondant à la table 'hour'
        $hoursModel = new HoursModel();
        $hours = $hoursModel->getHours();
        // La vue
        $this->render('contact/index', ['annonces' => $annonces, 'title' => $title, 'hours' => $hours]);
    }
    
    public function submitForm()
    {
        // Récupérer les données
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        //Envoyer l'email
        $contactForm = new ContactModel();
        $contactForm->sendEmail($name, $email, $message);
        // Redirection / succcess
        echo "✅ Message envoyé avec succès, redirection en cours.";
        header("refresh:4;url=http://ecf_garage.test/main");
    }
}