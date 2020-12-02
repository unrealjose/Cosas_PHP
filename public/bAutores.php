<?php

if(!isset($_GET['id_autor'])){
    header("Location:listaAutores.php");
    die();
}

require "../vendor/autoload.php";
use Clases\Autores;

$id = $_GET['id_autor'];
$autor = new Autores();
$autor->setId_autor($id);
$autor->delete();
$autor = null;
header("Location:listaAutores.php");
die();