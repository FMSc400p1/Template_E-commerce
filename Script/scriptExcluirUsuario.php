<?php
require 'conexao.php';
require 'funcoes.php';
require 'funcoesBD.php';
echo "OI";

$id = $_GET['id'];
$img = $_GET['ft'];
$pasta = '../img/';

deletarU($con,$id,$img,$pasta);


?>