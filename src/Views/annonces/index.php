<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa&family=Orbitron:wght@500;600;800&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../../assets/Images/Images/cleicone.png" type="image/x-icon">
        <link href="../../assets/css/style.css" rel="stylesheet">
        <title>V.Parrot Occasions</title>
    </head>
    <body>
    <?php include_once ROOT.'/Views/templates/header.php'; ?>
    <h1 class="main__title">Liste des annonces :</h1>
    <main class="adpage">
        <?php foreach($annonces as $annonce):?>
        <article class="adpage__list">
            <img class="adpage__img" src="/<?= $annonce->image_car ?>">
            <h2 class="adpage__title"><?= $annonce->title_car ?></h2>
            <div class="adpage__info">
                <p>Prix : <?= $annonce->price_car ?> €</p>
                <p>Km : <?= $annonce->km_car ?> km</p>
            </div>
            <hr class="separation">
            <div class="adpage__info2">
            <p>Modèle : <?= $annonce->model_car ?></p>
            <p>Année du Modèle : <?= $annonce->year_car ?></p>
            </div>
            <p class="adpage__contact"><a class="adpage__link" href="/contact?title=<?= urlencode($annonce->title_car) ?>">Nous Contacter</a></p>
        </article>
        <?php endforeach; ?>
    </main>

    <!-- IMPORT DU FOOTER -->
    <footer class="footer">
            <div class="footer__categories">
                <div class="footer__garage">
                    <div class="footer__logo">
                        <h1>V.Parrot</h1>
                        <p class="footer__logop">Garage Automobile</p>
                    </div>
                    <p class="footer__garageP">Tel : 06 54 67 89 65</p>
                    <p class="footer__garageP">Adresse : Toulouse 31200</p>
                    <p class="footer__garageP">V.Parrot@gmail.com</p>
                </div>
                <div class="footer__hour">
                    <p class="footer__title">Horaire d'ouverture :</p>
                        <ul class="footer__hourUl">
                        <?php foreach ($hours as $hour): ?>
                            <li class="footer__hourLi">
                                Lundi a Vendredi :<br><?=  $hour->getMonday_hour() ?><br>
                                Samedi : <br><?= $hour->getSaturday_hour()  ?><br>
                                Dimanche : <br><?= $hour->getSunday_hour()  ?><br>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                </div>
                <div class="footer__info">
                    <p class="footer__title">Infos Utiles :</p>
                    <div class="footer__infoLink">
                        <a href="/main">Accueil</a>
                        <a href="https://goo.gl/maps/h6nH3d2LyzczdU1i8">Google Maps</a>
                        <a href="/contact">Contact</a>
                    </div>
                </div>
                <div class="footer__follow">
                    <p class="footer__followP">Suivez Nous :</p>
                    <div class="footer__followLink">
                        <a href="https://www.instagram.com">Instagram</a>
                        <a href="https://www.facebook.com">Facebook</a>
                    </div>
                </div>
            </div>
        </footer>
        <p class="registered">Made by Vehqa ®| Arthur Nectoux || ECF 2023</p>
    <script src="../../assets/javascript/nav.js"></script>
    </body>


