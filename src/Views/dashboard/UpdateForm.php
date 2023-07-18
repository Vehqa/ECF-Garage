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
    <title>Modifier une annonce</title>
</head>

<body>
    <section class="createAdd">
        <h1 class="createAdd__title">Modifier une annonce</h1>
        <form class="createAdd__form" action="/employe/update/<?= $id_car ?>" method="POST">
            <input type="text" id="title_car" class="createAdd__input" name="title_car" value="<?= $annonce->title_car ?>" required>
            <input type="text" id="price_car" class="createAdd__input" name="price_car" value="<?= $annonce->price_car ?>" required>
            <input type="text" id="model_car" class="createAdd__input" name="model_car" value="<?= $annonce->model_car ?>" required>
            <input type="text" id="km_car" class="createAdd__input" name="km_car" value="<?= $annonce->km_car ?>" required>
            <input type="text" id="year_car" class="createAdd__input" name="year_car" value="<?= $annonce->year_car ?>" required>
            <input type="text" id="image_car" class="createAdd__input" name="image_car" value="<?= $annonce->image_car ?>" required>
            <input class="createAdd__submit" type="submit" value="Modifier">
        </form>
    </section>
</body>
</html>