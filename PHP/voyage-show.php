<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vérifie si l'ID est défini et n'est pas nul dans l'URL.
if(isset($_GET['id']) && $_GET['id'] != null){
    // Stocke l'ID dans une variable.
    $id = $_GET['id'];

    // Inclut la classe CRUD pour effectuer des opérations sur la base de données.
    require_once('classe/CRUD.php');
    
    // Crée une nouvelle instance de la classe CRUD.
    $crud = new CRUD;

    // Sélectionne un voyage basé sur l'ID fourni et stocke les informations dans la variable $voyage.
    $voyage = $crud->selectId('voyage', $id);
    
    // Extrait les informations de $voyage en tant que variables individuelles.
    extract($voyage);
}
else{
    // Si l'ID n'est pas défini ou est nul, redirige vers index.php.
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <main>
        <h1>Voyage</h1>
        <p><strong>Destination : </strong><?= $destination; ?></p>
        <p><strong>Date de départ : </strong><?= $date_depart; ?></p>
        <p><strong>Date de retour : </strong><?= $date_retour; ?></p>
        <p><strong>Prix : </strong><?= $prix; ?></p>
        <p><strong>Description : </strong><?= $description; ?></p>
        <a href="voyage-edit.php?id=<?= $id; ?>">Modifier</a>
        <form action="voyage-delete.php" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="Supprimer">
        </form>
    </main>
</body>
</html>