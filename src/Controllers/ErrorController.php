<?php
namespace App\Controllers;

class ErrorController extends Controller
{
        public function index()
        {
            // Charger la vue 404.php
            include_once ROOT.'/Views/errors/index.php';
        }
}