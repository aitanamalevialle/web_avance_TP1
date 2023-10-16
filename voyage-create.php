<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("classe/CRUD.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crud = new CRUD();

    $voyage_data = array(
        'destination' => $_POST['destination'],
        'date_depart' => $_POST['date_depart'],
        'date_retour' => $_POST['date_retour'],
        'prix' => $_POST['prix'],
        'description' => $_POST['description'],
    );
    
    $crud->insert('voyage', $voyage_data);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un voyage</title>
</head>
<body>
    <form action="voyage-create.php" method="POST">
        <label for="destination">Destination</label>
        <input type="text" id="destination" name="destination" value="Canada" required><br>

        <label for="date depart">Date de départ</label>
        <input type="date" id="date depart" name="date depart" required><br>

        <label for="date retour">Date de retour</label>
        <input type="date" id="date retour" name="date retour" required><br>

        <label for="prix">Prix</label>
        <input type="text" id="prix" name="prix" value="3000" required><br>

        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="Bla bla bla" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>