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

require "conexao.php";
require "funcoes.php";
require "funcoesBD.php";

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$datav = $_POST['datav'];
$preco = $_POST ['preco'];
$desc = $_POST ['desc'];


//Armazenar Imagem
$imgNome = $_FILES['file1']['name'];
$imgTmp = $_FILES['file1']['tmp_name'];
$pasta = "../img/";
$arqValidos = ['','png', 'jpg', 'jpeg', 'PNG', 'bmp'];

//Armazenar Imagem
$img2Nome = $_FILES['file2']['name'];
$img2Tmp = $_FILES['file2']['tmp_name'];
$pasta = "../img/";
$arqValidos = ['','png', 'jpg', 'jpeg', 'PNG', 'bmp'];

//Armazenar Imagem
$img3Nome = $_FILES['file3']['name'];
$img3Tmp = $_FILES['file3']['tmp_name'];
$pasta = "../img/";
$arqValidos = ['','png', 'jpg', 'jpeg', 'PNG', 'bmp','jfif'];




$img = salvar_arquivo($imgNome, $imgTmp, $arqValidos, $pasta);
$img2 = salvar_arquivo($img2Nome, $img2Tmp, $arqValidos, $pasta);
$img3 = salvar_arquivo($img3Nome, $img3Tmp, $arqValidos, $pasta);

cadastrar_prod($con,$nome,$marca, $datav, $preco, $img, $img2, $img3, $desc);
