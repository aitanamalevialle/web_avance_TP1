<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET['id']) && $_GET['id']!=null ){
    $id= $_GET['id'];
    require_once('classe/CRUD.php');
    
    $crud = new CRUD;
    $personne = $crud->selectId('personne', $id);
    $client = $crud->selectId('client', $id);

    extract($personne);
    extract($client);
}else{
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <main>
        <h1>Client</h1>
        <p><strong>Nom : </strong><?= $nom; ?></p>
        <p><strong>Courriel : </strong><?= $courriel; ?></p>
        <p><strong>Téléphone : </strong><?= $telephone; ?></p>
        <p><strong>Adresse : </strong><?= $adresse; ?></p>
        <a href="client-edit.php?id=<?= $id; ?>">Modifier</a>
        <form action="client-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="Supprimer">
        </form>
    </main>
</body>
</html>