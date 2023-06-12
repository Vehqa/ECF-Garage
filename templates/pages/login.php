<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa&family=Orbitron:wght@500;600;800&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/Images/Images/cleicone.png" type="image/x-icon">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <script defer src="../../Javascript/nav.js"></script>
    <title>Login</title>
</head>

<!-- IMPORT DU HEADER -->

<?= require_once '../header.php';
?>

<main>

<!-- SECTION LOGIN  -->

    <div>
        <div class="login">
        </div>
            <form class="login__form" action="verification.php" method="POST">
                <h1 class="login__title">Connexion</h1>
                <input class="login__input" type="email" placeholder="E-Mail" name="email" required="required">
                <input class="login__input" type="password" placeholder="Mot de passe" name="password" required="required">
                <input class="box2__btn2" type="submit" id='submit' value='Log In' >
            </form>
    </div>
    <hr class="separation">
</main>