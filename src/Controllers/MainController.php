<?php
namespace App\Controllers;


use App\Models\HoursModel;
use App\Models\ServicesModel;
use App\Models\ReviewModel;

class MainController extends Controller
{
    public function index()
    {

        $acceptedReviews = $this->getAcceptedReviews();
        // Récupérer les horaires
        $hoursModel = new HoursModel();
        $hours = $hoursModel->getHours();
        // Récupérer les avis
        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->getReviews(); // Assurez-vous d'avoir une méthode appropriée pour récupérer les avis
        // Récuperer les services
        $serviceModel = new ServicesModel();
        $services = $serviceModel->getServices();
        // Passer les horaires, services, hours et les avis à la vue
        $this->render('main/index', ['hours' => $hours, 'reviews' => $reviews, 'services' => $services]);
    }

    public function getAcceptedReviews()
    {
        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->getReviews();
        return $reviews;
    }

    public function createReview()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'name_review' => $_POST['name_review'] ?? '',
                    'surname_review' => $_POST['surname_review'] ?? '',
                    'grade_review' => $_POST['grade_review'] ?? '',
                    'comment_review' => $_POST['comment_review'] ?? '',
                    'accept_review' => $_POST['accept_review'] ?? '',
                ];
                // Créer une instance de votre modèle AnnoncesModel
                $reviewModel = new ReviewModel();
                // Appeler la méthode create en passant les données
                $result = $reviewModel->create($data);
                
                // Définir la valeur de $_SESSION['success'] en fonction du résultat
                if ($result) {
                    $_SESSION['success'] = "L'annonce a été créée avec succès.";
                } else {
                    $_SESSION['error'] = "Erreur lors de la création de l'annonce. Veuillez réessayer.";
                }
                // Redirection ou message
                if ($result) {
                    echo "✅ L'annonce a été créée avec succès, redirection en cours.";
                } else {
                    echo "Erreur lors de la création de l'annonce. Veuillez réessayer, redirection en cours.";
                }
            }
                // Inclure le fichier CSS en tant qu'en-tête HTTP
                header("refresh:2;url=http://ecf_garage.test/");
        }

}