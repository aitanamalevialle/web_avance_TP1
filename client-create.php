<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("classe/CRUD.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crud = new CRUD();

    $personne_data = array(
        'nom' => $_POST['nom'],
        'courriel' => $_POST['courriel'],
        'telephone' => $_POST['telephone']
    );
    
    $id_personne = $crud->insert('personne', $personne_data);

    if ($id_personne) {
        $client_data = array(
            'id' => $id_personne,
            'adresse' => $_POST['adresse']
        );
        
        $crud->insert('client', $client_data);
    }

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
</head>
<body>
    <form action="client-create.php" method="POST">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="Margot Moreau" required><br>

        <label for="courriel">Courriel</label>
        <input type="email" id="courriel" name="courriel" value="margot.moreau@gmail.com" required><br>

        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone" value="450 626-9146" required><br>

        <label for="adresse">Adresse</label>
        <input type="text" id="adresse" name="adresse" value="3475 rue Saint-Urbain" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>