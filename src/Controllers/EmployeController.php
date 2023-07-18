<?php
namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\ReviewModel;

class EmployeController extends Controller
{
    /**
     *  Cette méthode affichera une page listant toutes les annonces de la base de données.
    */
    public function index()
    {
        //Instancie le modéle correspondanat a la table 'ad'
        $annoncesModel = new AnnoncesModel;
        //On va chercher toute les annonces.
        $annonces = $annoncesModel->findAll();
        //La vue
        $this->render('dashboard/Employe', ['annonces' => $annonces]);
    }

    public function createAnnonce()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title_car' => $_POST['title_car'] ?? '',
                'price_car' => $_POST['price_car'] ?? '',
                'model_car' => $_POST['model_car'] ?? '',
                'km_car' => $_POST['km_car'] ?? '',
                'year_car' => $_POST['year_car'] ?? '',
                'image_car' => $_POST['image_car'] ?? '',
            ];
        // Créer une instance de votre modèle AnnoncesModel
        $annoncesModel = new AnnoncesModel();
        // Appeler la méthode create en passant les données
        $result = $annoncesModel->create($data);
        session_start();
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
        header("refresh:2;url=http://ecf_garage.test/employe");
}

    public function deleteAnnonce($id_car)
    {
        // Créer une instance d'AnnoncesModel
        $annoncesModel = new AnnoncesModel();
        // Appeler la méthode delete grace a l'id.
        $annoncesModel->delete($id_car);
        // Redirection en cours : 
        echo "✅ L'annonce a été supprimée avec succès, redirection en cours.";
        header("refresh:2;url=http://ecf_garage.test/employe");
    }

    public function showForm()
    {
        $this->render('dashboard/FormEmploye');
    }


    // Appeler la méthode update : 
    public function updateAnnonce($id_car)
    {
        // Créer une instance d'AnnoncesModel
        $annoncesModel = new AnnoncesModel();
        // Récupérer l'annonce à partir de l'ID
        $annonce = $annoncesModel->find('id_car', $id_car);
        // Annonces ? 
        if (!$annonce) {
            http_response_code(404);
            $controller = new ErrorController();
            $controller->index();
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title_car' => $_POST['title_car'] ?? '',
                'price_car' => $_POST['price_car'] ?? '',
                'model_car' => $_POST['model_car'] ?? '',
                'km_car' => $_POST['km_car'] ?? '',
                'year_car' => $_POST['year_car'] ?? '',
                'image_car' => $_POST['image_car'] ?? '',
            ];
            // méthode update : l'ID de l'annonce + Data
            $result = $annoncesModel->update($id_car, $data);
            session_start();
            if ($result) {
                $_SESSION['success'] = "L'annonce a été mise à jour avec succès.";
            } else {
                $_SESSION['error'] = "Erreur lors de la mise à jour de l'annonce. Veuillez réessayer.";
            }
            // Redirection 
            header("Location: /employe");
            exit();
        } else {
            //formulaire de mise à jour avec les données de l'annonce
            $this->render('dashboard/UpdateForm', ['id_car' => $id_car, 'annonce' => $annonce]);
        }
    }

    public function updateReview($id_review)
    {
        $reviewModel = new ReviewModel();
        $success = $reviewModel->updateAcceptReview($id_review, 2); // Mettre à jour accept_review à 2
            if ($success) {
                echo "✅ La revue a été acceptée avec succès, redirection en cours.";
            } else {
                echo "Erreur lors de l'acceptation de la revue. Veuillez réessayer, redirection en cours.";
            }
        header("refresh:2;url=http://ecf_garage.test/employe/review");
    }

    public function deleteReview($id)
    {
        // Créer une instance de review model
        $reviewModel = new ReviewModel();
        // Appeler la méthode delete grace a l'id.
        $reviewModel->delete($id);
        // Redirection en cours : 
        echo "✅ L'annonce a été supprimée avec succès, redirection en cours.";
        header("refresh:2;url=http://ecf_garage.test/employe/review");
    }
}