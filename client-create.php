<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('classe/CRUD.php');

$crud = new CRUD;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataPersonne = [
        'nom' => $_POST['nom'],
        'courriel' => $_POST['courriel'],
        'telephone' => $_POST['telephone']
    ];
    
    $insertPersonne = $crud->insert('personne', $dataPersonne);

    if ($insertPersonne !== false) {
        $dataClient = [
            'id' => $insertPersonne,
            'adresse' => $_POST['adresse']
        ];
        $insertClient = $crud->insert('client', $dataClient);
        
        if ($insertClient !== false) {
            header('location:index.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout client</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <main>
        <h1>Ajouter un client</h1>
        <form action="client-create.php" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="Margot Moreau" required>

            <label for="courriel">Courriel :</label>
            <input type="email" id="courriel" name="courriel" value="margot.moreau@gmail.com" required>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="450 626-9146" required>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="3475 rue Saint-Urbain" required>

            <input type="submit" value="Ajouter">
        </form>
    </main>
</body>
</html>