<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("classe/CRUD.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crud = new CRUD();

    $personne_data = array(
        'nom' => $_POST['nom'],
        'courriel' => $_POST['courriel'],
        'telephone' => $_POST['telephone'],
    );
    
    $id_personne = $crud->insert('personne', $personne_data);

    if ($id_personne) {
        $guide_data = array(
            'id' => $id_personne,
            'langues_parlees' => $_POST['langues_parlees'],
            'specialite' => $_POST['specialite']
        );
        
        $crud->insert('guide', $guide_data);
    }

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un guide</title>
</head>
<body>
    <form action="guide-create.php" method="POST">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="Jules Lavigne" required><br>

        <label for="courriel">Courriel</label>
        <input type="email" id="courriel" name="courriel" value="jules.lavigne@gmail.com" required><br>

        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone" value="450 826-9148" required><br>

        <label for="langues_parlees">Langue(s) parlée(s)</label>
        <input type="text" id="langues_parlees" name="langues_parlees" value="Français, Anglais" required><br>

        <label for="specialite">Spécialité</label>
        <input type="text" id="specialite" name="specialite" value="Trek" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>