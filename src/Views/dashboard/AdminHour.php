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
            <?php foreach ($hours as $hour) : ?>
            <article class="dashboard__article">
            <table>
                <tr>
                    <th>Lundi-Vendredi</th>
                    <th>Samedi</th>
                    <th>Dimanche</th>
                </tr>
                <tr>
                    <td><?= $hour->monday_hour ?></td>
                    <td><?= $hour->saturday_hour ?></td>
                    <td><?= $hour->sunday_hour ?></td>
                </tr>
                <tr>
                    <td><a class="update__btn" href="/admin/updatehour/<?= $hour->id_hour ?>">Modifier</a></th>
                </tr>
            </table>
        </article>
    <?php endforeach; ?>
        </section>
</body>