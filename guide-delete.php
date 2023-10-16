<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("classe/CRUD.php");

$crud = new CRUD;
$crud->delete('guide', $_POST['id']);
$crud->delete('personne', $_POST['id']);
?>