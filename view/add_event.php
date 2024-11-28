<!-- add_event.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un événement</title>
</head>

<body>

    <h1>Ajouter un événement</h1>

    <form action="../controller/eventController.php" method="POST" enctype="multipart/form-data">
        <label for="title">Titre de l'événement :</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="date">Date :</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="location">Lieu :</label>
        <input type="text" id="location" name="location" required><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="image">Image de l'événement :</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit">Ajouter l'événement</button>
    </form>

</body>

</html>