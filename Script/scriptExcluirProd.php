<?php
session_start();
if(!isset($_SESSION['id']) or $_SESSION['tipo']!="adm"){
}else{
    $id =$_SESSION['id'];
    $nome =$_SESSION['nome'];
    $tipo =$_SESSION['tipo'];
}
?>
<?php
require 'conexao.php';
require 'funcoes.php';
require 'funcoesBD.php';

$id = $_GET['id'];
$img1 = $_GET['ft1'];
$img2 = $_GET['ft2'];
$img3 = $_GET['ft3'];
$pasta = '../img/';

deletarP($con,$id,$img1,$img2,$img3,$pasta);


?>