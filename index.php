<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("classe/CRUD.php");

$crud = new CRUD;
$clients = $crud->selectJoin('client', 'personne', 'id');
$voyages = $crud->select('voyage', 'id');
$guides = $crud->selectJoin('guide', 'personne', 'id');
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
        <img src="./img/banniere.png" alt="banniere agence de voyages">
    </header>
    <main>
        <h2>Liste de clients</h2>
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
                    <td><?= $client['nom']?></td>
                    <td><?= $client['courriel']?></td>
                    <td><?= $client['telephone']?></td>
                    <td><?= $client['adresse']?></td>
                    <td>
                        <form action="client-delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $client['id'] ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <a href="./client-create.php">Ajouter</a>
        <br>
        <h2>Liste de voyages</h2>
        <table>
            <tr>
                <th>Destination</th>
                <th>Date de départ</th>
                <th>Date de départ</th>
                <th>Prix</th>
                <th>Description</th>
            </tr>
            <?php
            foreach($voyages as $voyage){
            ?>
                <tr>
                    <td><?= $voyage['destination']?></td>
                    <td><?= $voyage['date_depart']?></td>
                    <td><?= $voyage['date_retour']?></td>
                    <td><?= $voyage['prix']?></td>
                    <td><?= $voyage['description']?></td>
                    <td>
                        <form action="voyage-delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $voyage['id'] ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <a href="./voyage-create.php">Ajouter</a>
        <br>
        <h2>Liste de guides</h2>
        <table>
        <tr>
                <th>Nom</th>
                <th>Courriel</th>
                <th>Téléphone</th>
                <th>Langue(s) parlée(s)</th>
                <th>Spécialité</th>
            </tr>
            <?php
            foreach($guides as $guide){
            ?>
                <tr>
                    <td><?= $guide['nom']?></td>
                    <td><?= $guide['courriel']?></td>
                    <td><?= $guide['telephone']?></td>
                    <td><?= $guide['langues_parlees']?></td>
                    <td><?= $guide['specialite']?></td>
                    <td>
                        <form action="guide-delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $guide['id'] ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <a href="./guide-create.php">Ajouter</a>
    </main>
</body>
</html>