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
        <title>Créer Annonce</title>
    </head>
    <section class="createAdd">
    <h2 class="createAdd__title">Créer une annonce</h2>
        <form class="createAdd__form" action="/employe/create" method="post">
            <input placeholder="Titre de l'Annonce" class="createAdd__input" type="text" name="title_car" id="title">
            <input placeholder="Prix" class="createAdd__input" type="number" name="price_car" id="price">
            <input placeholder="Modèle" class="createAdd__input" type="text" name="model_car" id="model">
            <input placeholder="Killométrage" class="createAdd__input" type="number" name="km_car" id="km" required>
            <input placeholder="Année de circulation" class="createAdd__input" type="number" name="year_car" id="year" required>
            <input type="file" placeholder="upload" name="images[]" multiple id="images">
            <input class="createAdd__submit" type="submit" value="Ajouter">
        </form>
    </section>