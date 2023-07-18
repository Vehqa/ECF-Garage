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
    <title>Modifier les Services</title>
</head>

<body>
    <section class="createAdd">
        <h1 class="createAdd__title">Modifier les Services</h1>
        <form class="createAdd__form" action="/admin/updateservice/<?= $id_service ?>" method="POST">
            <input type="text" class="createAdd__input" name="title_service" value="<?= $service->title_service ?>" required>
            <input type="text" class="createAdd__input" name="description_service" value="<?= $service->description_service ?>" required>
            <input type="number" class="createAdd__input" name="price_service" value="<?= $service->price_service ?>" required>
            <input class="createAdd__submit" type="submit" value="Modifier">
        </form>
    </section>
</body>