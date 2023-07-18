<?php
namespace App\Controllers;

use App\Models\HoursModel;

class HoursController extends Controller
{
    /**
     * Cette méthode affichera une page listant toutes les horraires de la base de données.
    */
        public function index()
        {
        $hoursModel = new HoursModel();
        $hours = $hoursModel->findAll();
        $this->render('information/index', ['hours' => $hours]);
    }
}