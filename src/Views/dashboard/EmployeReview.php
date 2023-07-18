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
        <script defer src="../../assets/javascript/nav.js"></script>
        <title>Dashboard Employe</title>
    </head>
    <body>
    <?php include_once ROOT.'/Views/templates/headerdashboard.php'; ?>
        <div class="sidenav">
            <a href="/employe">Les Annonces</a>
            <a href="/employe/review">Les Avis</a>
            <hr>
            <a href="/employe/form">Ajouter une Occasion</a>
            <a href="">Ajouter un Avis</a>
        </div>

        <section class="dashboard">
            <h2 class="dashboard__title2">Listes des Avis</h2>
            <div class="dashboard__space">
                <?php foreach($reviews as $review): ?>
                    <?php if ($review->accept_review === 1): ?> <!-- Vérification de accept_review -->
                        <article class="dashboard__article">
                            <table>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Note /5</th>
                                    <th>Commentaire</th>
                                    <th>Accepter</th>
                                    <th>Supprimer</th>
                                </tr>
                                <tr>
                                    <td><?= $review->name_review ?></td>
                                    <td><?= $review->grade_review ?></td>
                                    <td><?= $review->comment_review ?></td>
                                    <td><a class="update__btn" href="/employe/updatereview/<?= $review->id_review ?>">Accepter</a></td>
                                    <td><a class="delete__btn" href="/employe/deletereview/<?= $review->id_review ?>">Delete</a></td>
                                </tr>
                            </table>
                        </article>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
    </body>