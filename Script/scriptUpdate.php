<?php
require 'conexao.php';
require 'funcoes.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];
$senha1 =  md5($_POST['senha']);
$senha2 =  md5($_POST['senha2']);

verificar($senha1, $senha2);

if (!empty($senha1)) {
    $sql = "UPDATE usuarios SET senha = ? WHERE idusuario = ?";
    $user = $con->prepare($sql);
    $user->bindValue(1, $senha1);
    $user->bindValue(2, $id);
    $user->execute();
} 

$sql = "UPDATE usuarios SET nome = ?, email = ?,tipoUser = ? WHERE idusuario = ?";
$user = $con->prepare($sql);
$user->bindValue(1, $nome);
$user->bindValue(2, $email);
$user->bindValue(3, $tipo);
$user->bindValue(4, $id);
if ($user->execute()) {
    redirecionar_pagina("Atualização completa!!", "../index.php");
};


