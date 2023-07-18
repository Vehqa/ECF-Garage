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
        <title>Dashboard Admin</title>
    </head>

    

    <body>
        <?php include_once ROOT.'/Views/templates/headerdashboard.php'; ?>
            <div class="sidenav">
                <a href="/admin">Les Annonces</a>
                <a href="/adminaccount">Les Comptes</a>
                <a href="/adminhour">Les Horaires</a>
                <a href="/adminservice">Les Services</a>
                <a href="/adminreview">Les Avis</a>
                <hr>
                <a href="admin/form">Ajouter une Occasion</a>
                <a href="admin/formEmploye">Ajouter un Compte</a>
            </div>

            <section class="dashboard">
            <h2 class="dashboard__title2">Listes des annonces</h2>
            <div class="dashboard__space">
                <?php foreach($annonces as $annonce): ?>
                <article class="dashboard__article">
                    <table>
                        <tr>
                            <th>Titre</th>
                            <th>Prix</th>
                            <th>Model</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                            <td><?= $annonce->title_car ?></td>
                            <td><?= $annonce->price_car ?></td>
                            <td><?= $annonce->model_car ?></td>
                            <td><a class="update__btn" href="/admin/update/<?= $annonce->id_car ?>">Modifier</a></td>
                            <td><a class="delete__btn" href="/admin/delete/<?= $annonce->id_car ?>">Delete</a></td>
                        </tr>
                        </table>
                </article>
            <?php endforeach;?>
            
            </div>
        </section>
            
        </section>
</body>