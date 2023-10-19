<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclusion du fichier contenant la classe CRUD.
require_once('classe/CRUD.php');

// Instanciation de l'objet CRUD.
$crud = new CRUD;

// Vérification si la méthode de requête est POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Préparation du tableau de données pour l'insertion d'une personne.
    $dataPersonne = [
        'nom' => $_POST['nom'],
        'courriel' => $_POST['courriel'],
        'telephone' => $_POST['telephone']
    ];
    
    // Tentative d'insertion des données de la personne dans la base de données.
    $insertPersonne = $crud->insert('personne', $dataPersonne);

    // Vérification si l'insertion de la personne a réussi.
    if ($insertPersonne !== false) {
        // Préparation du tableau de données pour l'insertion d'un client.
        // On utilise l'ID de la personne insérée comme ID du client.
        $dataClient = [
            'id' => $insertPersonne,
            'adresse' => $_POST['adresse']
        ];

        // Tentative d'insertion des données du client dans la base de données.
        $insertClient = $crud->insert('client', $dataClient);
        
        // Si l'insertion du client est réussie, redirige vers index.php.
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
            <input type="text" id="telephone" name="telephone" value="450 626-9146">

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="3475 rue Saint-Urbain" required>

            <input type="submit" value="Ajouter">
        </form>
    </main>
</body>
</html>