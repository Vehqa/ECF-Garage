<?php
namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function users()
    {
        //Instancie le modéle correspondanat a la table 'ad'
        $usersModel = new UsersModel;
        //On va chercher toute les annonces.
        $users = $usersModel->findAll();
        //La vue
        $this->render('dashboard/AdminAccount', ['users' => $users]);
    }
}