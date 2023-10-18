<?php
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
    <title>Modification client</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <main>
        <h1>Modifier le client</h1>
        <form action="client-update.php" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $nom; ?>" required>

            <label for="courriel">Courriel :</label>
            <input type="text" id="courriel" name="courriel" value="<?= $courriel; ?>" required>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?= $telephone; ?>" required>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="<?= $adresse; ?>" required>

            <input type="submit" value="Enregistrer">
        </form>
    </main>
</body>
</html>