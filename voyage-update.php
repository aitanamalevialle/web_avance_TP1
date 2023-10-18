<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('classe/CRUD.php');

$crud = new CRUD;
$update = $crud->update('voyage', $_POST);
?>