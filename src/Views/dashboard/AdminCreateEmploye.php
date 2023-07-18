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
        <title>Créer un Compte</title>
    </head>
    <section class="createAdd">
    <h2 class="createAdd__title">Créer un compte</h2>
        <form class="createAdd__form" action="/admin/employe" method="post">
            <input placeholder="E-Mail" class="createAdd__input" type="text" name="email_users">
            <input placeholder="Password" class="createAdd__input" type="password" name="password_users">
            <input placeholder="Role" class="createAdd__input" type="number" name="id_role" value="2">
            <input class="createAdd__submit" type="submit" value="Ajouter">
        </form>
    </section>