<?php
namespace App\Controllers;

use App\Models\ReviewModel;

class ReviewController extends Controller
{
    /**
     * Cette méthode affichera une page listant toutes les annonces de la base de données.
    */
        public function index()
        {
        $reviewsModel = new ReviewModel();
        $reviews = $reviewsModel->findAll();
        $this->render('dashboard/EmployeReview', ['reviews' => $reviews]);
    }
}