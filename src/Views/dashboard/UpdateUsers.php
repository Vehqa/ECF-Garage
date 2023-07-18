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
    <title>Modifier les Utilisateurs</title>
</head>
<body>
    <section class="createAdd">
        <h1 class="createAdd__title">Modifier les utilisateurs</h1>
        <form class="createAdd__form" action="/admin/updateaccount/<?= $id_users ?>" method="POST">
            <input type="email" class="createAdd__input" name="email_users" value="<?= $user->email_users ?>" required>
            <input type="password" class="createAdd__input" name="password_users" value="<?= $user->password_users ?>" required>
            <input class="createAdd__submit" type="submit" value="Modifier">
        </form>
    </section>
</body>
</html>