<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('classe/CRUD.php');

$crud = new CRUD;
$dataPersonne = [
    'id' => $_POST['id'],
    'nom' => $_POST['nom'],
    'courriel' => $_POST['courriel'],
    'telephone' => $_POST['telephone']
];

$dataClient = [
    'id' => $_POST['id'],
    'adresse' => $_POST['adresse']
];

$updatePersonne = $crud->update('personne', $dataPersonne);
$updateClient = $crud->update('client', $dataClient);
?>