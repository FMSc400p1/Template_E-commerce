<?php

require "conexao.php";
require "funcoes.php";
require "funcoesBD.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$email2 = $_POST['email2'];
$senha = md5($_POST['senha']);
$senha2 = md5($_POST['senha2']);
$tipo = $_POST['tipo'];
$dt = date("Y-m-d");



verificarEmail($email,$email2);
verificar($senha, $senha2);
verificar_E($con,$email);


cadastrar_usuario($con,$nome, $email, $senha, $dt, $tipo);

