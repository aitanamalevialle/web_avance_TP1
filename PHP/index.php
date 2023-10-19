<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclut le fichier CRUD.php qui contient la classe CRUD pour les opérations sur la base de données.
require_once("classe/CRUD.php");

// Crée une nouvelle instance de la classe CRUD.
$crud = new CRUD;

// Récupère la liste des clients en faisant une jointure avec la table personne sur l'identifiant 'id'.
$clients = $crud->selectJoin('client', 'personne', 'id');

// Récupère la liste des voyages triés par 'id'.
$voyages = $crud->select('voyage', 'id');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agence de voyages</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <header>
        <img src="./img/banniere.png" alt="agence voyages">
    </header>
    <main>
        <h1>Liste de clients</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Courriel</th>
                <th>Téléphone</th>
                <th>Adresse</th>
            </tr>
            <?php
            foreach($clients as $client){
            ?>
                <tr>
                    <td><a href="client-show.php?id=<?= $client['id']?>"><?= $client['nom']?></a></td>
                    <td><?= $client['courriel']?></td>
                    <td><?= $client['telephone']?></td>
                    <td><?= $client['adresse']?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="./client-create.php">Ajouter</a>
        <h1>Liste de voyages</h1>
        <table>
            <tr>
                <th>Destination</th>
                <th>Date de départ</th>
                <th>Date de retour</th>
                <th>Prix</th>
                <th>Description</th>
            </tr>
            <?php
            foreach($voyages as $voyage){
            ?>
                <tr>
                    <td><a href="voyage-show.php?id=<?= $voyage['id']?>"><?= $voyage['destination']?></a></td>
                    <td><?= $voyage['date_depart']?></td>
                    <td><?= $voyage['date_retour']?></td>
                    <td><?= $voyage['prix']?></td>
                    <td><?= $voyage['description']?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="./voyage-create.php">Ajouter</a>
    </main>
</body>
</html>