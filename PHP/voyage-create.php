<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('classe/CRUD.php');

$crud = new CRUD;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataVoyage = [
        'destination' => $_POST['destination'],
        'date_depart' => $_POST['date_depart'],
        'date_retour' => $_POST['date_retour'],
        'prix' => $_POST['prix'],
        'description' => $_POST['description']
    ];

    $insertVoyage = $crud->insert('voyage', $dataVoyage);
    
    if ($insertVoyage !== false) {
        header('location:index.php');
        die;
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout voyage</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <main>
        <h1>Ajouter un voyage</h1>
        <form action="voyage-create.php" method="POST">
            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" value="Canada" required>

            <label for="date depart">Date de départ : </label>
            <input type="date" id="date depart" name="date depart" value="2023-10-18" required>

            <label for="date retour">Date de retour :</label>
            <input type="date" id="date retour" name="date retour" value="2023-11-01" required>
            
            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" min="1000" value="3000" required>
            
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" cols="50" required>Terre de merveilles naturelles, des majestueuses Rocheuses aux vastes forêts de l'érable. Découvrez une mosaïque culturelle à travers ses villes vibrantes et son riche patrimoine. L'aventure du Grand Nord vous attend !</textarea>

            <input type="submit" value="Ajouter">
        </form>
    </main>
</body>
</html>