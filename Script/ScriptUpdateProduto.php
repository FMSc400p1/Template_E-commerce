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

$id = $_POST['id'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$valor = $_POST['valor'];
$valid = $_POST['val'];


$imgNome = $_FILES['file1']['name'];
$imgTmp = $_FILES['file1']['tmp_name'];

$img2Nome = $_FILES['file2']['name'];
$img2Tmp = $_FILES['file2']['tmp_name'];

$img3Nome = $_FILES['file3']['name'];
$img3Tmp = $_FILES['file3']['tmp_name'];


$pasta = "../img/";
$arqValidos = ['','png', 'jpg', 'jpeg', 'PNG', 'bmp','jfif'];


$sql = "SELECT * FROM produto WHERE prod_id = ?";
    $user = $con->prepare($sql);
    $user->bindValue(1, $id);
    $user->execute();
    $dados = $user->fetchAll(PDO::FETCH_ASSOC);



    foreach ($dados as $i) {
     ?>
        <td>
            <?php
            $img1 = $i['prod_img1'];
            $img2 = $i['prod_img2'];
            $img3 = $i['prod_img3'];
            ?>
        </td>
     <?php
    }

    // echo $img1;
    // echo var_dump($img2);
    // echo $img3;


if ($img1==NULL) {
    $img = salvar_arquivo($imgNome, $imgTmp, $arqValidos, $pasta);

    $sql = "INSERT INTO produto (prod_img1) VALUE (?)";
    $user = $con->prepare($sql);
    $user->bindParam(1, $img);
    $user->execute();

} else {
    $img = atualizar_img($imgNome, $imgTmp, $arqValidos, $pasta, $img1);

}if ($img2==NULL) {
    $img = salvar_arquivo($img2Nome, $img2Tmp, $arqValidos, $pasta);

    $sql = "UPDATE produto SET prod_img2 = ?";
    $user = $con->prepare($sql);
    $user->bindValue(1, $img);
    $user->execute();
} else {
    $img = atualizar_img($img2Nome, $img2Tmp, $arqValidos, $pasta, $img2);
 }if ($img3==NULL) {
    $img = salvar_arquivo($img3Nome, $img3Tmp, $arqValidos, $pasta);

    $sql = "UPDATE produto SET prod_img3 = ?";
    $user = $con->prepare($sql);
    $user->bindValue(1, $img);
    $user->execute();

} else {
    $img = atualizar_img($img3Nome, $img3Tmp, $arqValidos, $pasta, $img3);
}


$sql = "UPDATE produto SET prod_nome = ?, prod_validade = ?, prod_marca = ?, prod_valor = ? WHERE prod_id = ?";
$user = $con->prepare($sql);
$user->bindValue(1, $nome);
$user->bindValue(2, $valid);
$user->bindValue(3, $marca);
$user->bindValue(4, $valor);
$user->bindValue(5, $id);

if ($user->execute()) {
    redirecionar_pagina("Atualização completa!!", "listaprodutoAdm.php");
};
