<?php
namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\HoursModel;
use App\Models\ServicesModel;
use App\Models\UsersModel;
use App\Models\ReviewModel;

class AdminController extends Controller
{
    private AnnoncesModel $annoncesModel;

    public function __construct()
    {
        $this->annoncesModel = new AnnoncesModel;
    }

    public function index()
    {
        //Instancie le modéle correspondanat a la table 'ad'
        $annoncesModel = new AnnoncesModel;
        //On va chercher toute les annonces.
        $annonces = $annoncesModel->findAll();
        // Rendre la vue du tableau de bord
        $this->render('dashboard/Admin',['annonces' => $annonces] );
    }

    public function hour()
    {
        $hoursModel = new HoursModel;
        $hours = $hoursModel->findAll();
        $this->render('dashboard/Adminhour', ['hours' => $hours]);
    }

    public function review()
    {
        $reviewsModel = new ReviewModel();
        $reviews = $reviewsModel->findAll();
        $this->render('dashboard/AdminReview', ['reviews' => $reviews]);
    }

    public function services()
    {
        $servicesModel = new ServicesModel;
        $services = $servicesModel->findAll();
        $this->render('dashboard/Adminservices', ['services' => $services]);
    }

    public function showFormEmploye()
    {
        $this->render('dashboard/AdminCreateEmploye');
    }

    public function createAnnonce()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if(!empty($_FILES['images']['name'][0])){
                $images = $this->upload($_FILES['images']);
                if($images === false){
                    echo "Erreur lors de la création de l'annonce. Veuillez réessayer, redirection en cours.";
                    header("refresh:2;url=http://ecf_garage.test/admin");
                }
            } else {
                $images = null;
            }
            $data = [
                        'title_car' => $_POST['title_car'] ?? '',
                        'price_car' => $_POST['price_car'] ?? '',
                        'model_car' => $_POST['model_car'] ?? '',
                        'km_car' => $_POST['km_car'] ?? '',
                        'year_car' => $_POST['year_car'] ?? '',
                        'image_car' => $images[0],
                    ];
            $success = $this->annoncesModel->create($data);
            if ($success){
                echo "✅ L'annonce a été créée avec succès, redirection en cours.";
            } else {
                echo "Erreur lors de la création de l'annonce. Veuillez réessayer, redirection en cours.";
            }
            header("refresh:2;url=http://ecf_garage.test/admin");
        }
    }

    public function deleteAnnonce($id_car)
    {
        // Créer une instance d'AnnoncesModel
        $annoncesModel = new AnnoncesModel();
        // Appeler la méthode delete grace a l'id.
        $annoncesModel->delete($id_car);
        // Redirection en cours : 
        echo "✅ L'annonce a été supprimée avec succès, redirection en cours.";
        header("refresh:2;url=http://ecf_garage.test/admin");
    }

    public function showForm()
    {
        // View
        $this->render('dashboard/FormAdmin');
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
            header("Location: /admin");
            exit();
        } else {
            //formulaire de mise à jour avec les données de l'annonce pré remplui
            $this->render('dashboard/UpdateForm', ['id_car' => $id_car, 'annonce' => $annonce]);
        }
    }

    // Appeler la méthode update pour changer les HORRAIRES: 
    public function updateHour($id_hour)
    {
        // Créer une instance d'HoursModel
        $hoursModel = new HoursModel();
        // Récupérer l'annonce à partir de l'ID
        $hour = $hoursModel->find('id_hour', $id_hour);
        // Hours ? 
        if (!$hour) {
            http_response_code(404);
            $controller = new ErrorController();
            $controller->index();
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'monday_hour' => $_POST['monday_hour'] ?? '',
                'saturday_hour' => $_POST['saturday_hour'] ?? '',
                'sunday_hour' => $_POST['sunday_hour'] ?? '',
            ];
             // méthode update : l'ID de l'annonce + Data
            $result = $hoursModel->update($id_hour, $data);
            session_start();
            if ($result) {
                $_SESSION['success'] = "L'annonce a été mise à jour avec succès.";
            } else {
                $_SESSION['error'] = "Erreur lors de la mise à jour de l'annonce. Veuillez réessayer.";
            }
            // Redirection 
            header("Location: /adminhour");
            exit();
            } else {
            //formulaire de mise à jour avec les données des heures
            $this->render('dashboard/UpdateHour', ['id_hour' => $id_hour, 'hour' => $hour]);
        }
    }


        // Créer des employé
    public function createEmploye()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'email_users' => $_POST['email_users'] ?? '',
                'password_users' => $_POST['password_users'] ?? '',
                'id_role' => $_POST['id_role'] ?? '',
            ];
        // Créer une instance de votre modèle UsersModel
            $usersModel = new UsersModel();
            // Appeler la méthode create en passant les données
            $result = $usersModel->create($data);
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
        header("refresh:2;url=http://ecf_garage.test/admin");
    }

        // Appeler la méthode update pour changer les Services
    public function updateService($id_service)
    {
         // Créer une instance de servicesModel
        $servicesModel = new ServicesModel();
        // Récupérer le service à partir de l'ID
        $service = $servicesModel->find('id_service', $id_service);
         // Services ? 
        if (!$service) {
            http_response_code(404);
            $controller = new ErrorController();
            $controller->index();
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title_service' => $_POST['title_service'] ?? '',
                'description_service' => $_POST['description_service'] ?? '',
                'price_service' => $_POST['price_service'] ?? '',
            ];
             // méthode update : l'ID de l'annonce + Data
            $result = $servicesModel->update($id_service, $data);
            session_start();
            if ($result) {
                $_SESSION['success'] = "L'annonce a été mise à jour avec succès.";
            } else {
                $_SESSION['error'] = "Erreur lors de la mise à jour de l'annonce. Veuillez réessayer.";
            }
            // Redirection 
            header("Location:/adminservice");
            exit();
        } else {
            //formulaire de mise à jour avec les données des services
            $this->render('dashboard/UpdateService', ['id_service' => $id_service, 'service' => $service]);
        }
    }


        // Appeler la méthode update pour changer les Services
    public function updateAccount($id)
    {
        // Créer une instance d'usersModel
        $usersModel = new UsersModel();
        // Récupérer l'users à partir de l'ID
        $user = $usersModel->find('id', $id);
        //Users ? 
        if (!$user) {
            http_response_code(404);
            $controller = new ErrorController();
            $controller->index();
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'email_users' => $_POST['email_users'] ?? '',
            'password_users' => $_POST['password_users'] ?? '',
                ];
        // méthode update : l'ID de l'annonce + Data
        $result = $usersModel->update($id, $data);
        session_start();
            if ($result) {
            $_SESSION['success'] = "L'annonce a été mise à jour avec succès.";
            } else {
            $_SESSION['error'] = "Erreur lors de la mise à jour de l'annonce. Veuillez réessayer.";
            }
        // Redirection 
        header("Location:/adminaccount");
        exit();
        } else {
        //formulaire de mise à jour avec les données de l'users
        $this->render('dashboard/UpdateUsers', ['id_users' => $id, 'user' => $user]);
        }
    }

    public function deleteAccount($id)
    {
        // Créer une instance d'usersModel
        $usersModel = new UsersModel();
        // Appeler la méthode delete grace a l'id.
        $usersModel->delete($id);
        // Redirection en cours : 
        echo "✅ L'annonce a été supprimée avec succès, redirection en cours.";
        header("refresh:2;url=http://ecf_garage.test/admin");
    }

    public function updateReview($id_review)
    {
        $reviewModel = new ReviewModel();
        $success = $reviewModel->updateAcceptReview($id_review, 2); // Mettre à jour accept_review à 2
        if ($success) {
            //Message Ok ou erreur 
            echo "✅ L'avis a été acceptée avec succès, redirection en cours.";
        } else {
            echo "Erreur lors de l'acceptation de la revue. Veuillez réessayer, redirection en cours.";
        }
        // Redirection en cours :
        header("refresh:2;url=http://ecf_garage.test/adminreview");
    }

    public function deleteReview($id)
    {
        // Créer une instance d'AnnoncesModel
        $reviewModel = new ReviewModel();
        // Appeler la méthode delete grace a l'id.
        $reviewModel->delete($id);
        // Redirection en cours : 
        echo "✅ L'annonce a été supprimée avec succès, redirection en cours.";
        header("refresh:2;url=http://ecf_garage.test/adminreview");
    }
}