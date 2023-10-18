<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET['id']) && $_GET['id']!=null ){
    $id= $_GET['id'];
    require_once('classe/CRUD.php');
    
    $crud = new CRUD;
    $voyage = $crud->selectId('voyage', $id);
    
    extract($voyage);
}else{
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification voyage</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <main>
        <h1>Modifier le voyage</h1>
        <form action="voyage-update.php" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            
            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" value="<?= $destination; ?>" required>

            <label for="date_depart">Date de départ :</label>
            <input type="date" id="date_depart" name="date_depart" value="<?= $date_depart; ?>" required>

            <label for="date_retour">Date de retour :</label>
            <input type="date" id="date_retour" name="date_retour" value="<?= $date_retour; ?>" required>

            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" value="<?= $prix; ?>" required>

            <label for="description">Description :</label>
            <input type="text" id="description" name="description" value="<?= $description; ?>" required>

            <input type="submit" value="Enregistrer">
        </form>
    </main>
</body>
</html>