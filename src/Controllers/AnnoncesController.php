<?php
namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\HoursModel;

class AnnoncesController extends Controller
{
    /**
     * Cette méthode affichera une page listant toutes les annonces de la base de données.
    */
    public function index()
    {
         //Instancie le modéle correspondanat a la table 'ad'
        $annoncesModel = new AnnoncesModel;
        //On va chercher toute les annonces.
        $annonces = $annoncesModel->findAll();
        //La vue
        $hoursModel = new HoursModel();
        $hours = $hoursModel->getHours();
        // La vue
        $this->render('annonces/index', ['annonces' => $annonces, 'hours' => $hours]); 
    }
}