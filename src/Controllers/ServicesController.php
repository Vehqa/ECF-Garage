<?php
namespace App\Controllers;

use App\Models\HoursModel;
use App\Models\ServicesModel;

class ServicesController extends Controller
{
    /**
     * Cette méthode affichera une page listant toutes les annonces de la base de données.
    */
    public function index()
    {
        //Instancie le modéle correspondanat a la table 'ad'
        $servicesModel = new ServicesModel;
        //On va chercher toute les annonces.
        $services = $servicesModel->findAll();
        // Récupérer les horaires
        $hoursModel = new HoursModel();
        $hours = $hoursModel->getHours();
        //La vue
        $this->render('services/index', ['services' => $services, 'hours' => $hours]);
    }
}