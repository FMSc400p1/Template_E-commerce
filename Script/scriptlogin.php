<?php
require 'conexao.php';
require 'funcoes.php';

$email = $_POST['email'];
$senha = md5($_POST['senha']);
echo $email.$senha;

$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$user = $con->prepare($sql);
$user->bindValue(1,$email);
$user->bindValue(2,$senha);
$user->execute();

if($user->rowCount()==1){
    session_start();
    $dados = $user->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $dados['idusuario'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['tipo'] = $dados['tipoUser'];
    header('Location:../index.php');
}else{
   redirecionar_pagina("Dados incorretos",'../Form/formlogin.php');
}

?>