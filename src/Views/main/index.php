<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa&family=Orbitron:wght@500;600;800&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="../../assets/Images/Images/cleicone.png" type="image/x-icon">
        <link href="../../assets/css/style.css" rel="stylesheet">
        <title>V.Parrot Garage</title>
    </head>
    <body>
    <?php include_once ROOT.'/Views/templates/header.php'; ?>
    <main>
        <!-- MAIN COVER -->
        <div class="main__cover">
            <div class="partners__container">
                <p class="partners__text">Nos partenaires</p>
                <img class="main__img citroenlogo"  src="../../assets/Images/Images/citroenlogo2.png">
                <img class="main__img" src="../../assets/Images/Images/bmwlogo.png">
                <img class="main__img" src="../../assets/Images/Images/audilogo2.png">
            </div>
        </div>
        <hr class="separation">

    <!-- Séparation services -->
        <div class="presentation">
            <img class="presentation__img" src="../../assets/Images/Images/Garagiste2.png">
            <p class="presentation__p">V.Parrot Garage est un fournisseur de services
                de réparation automobile de confiance et professionnel
                dédié à maintenir votre véhicule dans un état optimal.
                Avec notre équipe de techniciens expérimentés et certifiés, 
                nous offrons une large gamme de services complets de réparation
                et d'entretien pour répondre à tous vos besoins automobiles.</p>
        </div>


        <!-- Code pour afficher les services -->
    <h2 class="services__maintitle">Nos Services</h2>
    <div class="services">
    <?php foreach ($services as $service) : ?>
    <div class="services__cards">
        <img class="services__img" src="<?= $service->getImage_service() ?>">
        <h3 class="services__title"><?= $service->getTitle_service() ?><h3>
        <p class="services__para"><?= $service->getDescription_service() ?></p>
        <hr class="separation">
        <p class="services__para2">Le prix indiqué si dessous n'est pas nominatif, le prix peux varié a la hausse ou a la baisse selon votre véhicule ou selon les choses a faire.</p>
        <p class="services__price">Prix : <?= $service->getPrice_service() ?> €</p>
        <a class="services__link" href="/contact">Nous Contacter</a>
    </div>
    <?php endforeach; ?>
    </div>
    <!-- SEPARATION -->
    <hr class="separation">
    <!-- Code pour afficher les avis -->
    <h2 class="review__heading">Les Avis Clients</h2>
    <div class="avis__section">  
    <div class="container">
        <?php $first = true; ?>
        <?php foreach ($reviews as $review): ?>
            <div class="slide-container <?php echo ($first ? 'active' : ''); ?>">
                <div class="slide">                
                    <h3 class="review__title"><?php echo $review->getName_review(); ?></h3>
                    <p class="review__grade">Note : <?php echo $review->getGrade_review(); ?> / 5</p>
                    <hr class="review__hr">
                    <p class="review__text"><?php echo $review->getComment_review(); ?></p>
                </div>
            </div>
            <?php $first = false; ?>
        <?php endforeach; ?>
        <div id="next" class="fas fa-chevron-right"></div>
        <div id="prev" class="fas fa-chevron-left"></div>
    </div>
    </div>


    <!-- Formulaire AVIS-->
    <div>
        <h2 class="Addreview__title">Vous aussi laissez un avis</h2>
        <form class="Addreview__form" action="main/create" method="post" enctype="multipart/form-data">
            <input placeholder="Prénom" class="Addreview__input" type="text" name="name_review" id="name" required>
            <input placeholder="Nom" class="Addreview__input" type="text" name="surname_review" id="surname" required>
            <input placeholder="Note / 5" class="Addreview__input" type="Number" name="grade_review" id="grade" required>
            <input placeholder="" class="Addreview__inputnone" type="Number" name="accept_review" id="accept" value="1">
            <textarea class="Addreview__textarea" placeholder="Commentaire" class="Addreview__input" type="text" name="comment_review" id="comment" required></textarea>
            <input class="Addreview__submit" type="submit" value="Soumettre">
        </form>
    </div>
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
    <script src="../../assets/javascript/carou.js"></script>
    <script src="../../assets/javascript/nav.js"></script>
    </body>