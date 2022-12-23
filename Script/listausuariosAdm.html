<?php
session_start();
if(!isset($_SESSION['id']) or $_SESSION['tipo']!="adm"){
 
}else{
    $id =$_SESSION['id'];
    $nome =$_SESSION['nome'];
    $tipo =$_SESSION['tipo'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T.e-commerce - Lista de Usuários</title>
    <link rel="stylesheet" href="../CSS/estilos.css">

    <!-- FAVICON -->
  <link rel="shortcut icon" href="../img/FavIcon/favicon.ico" type="image/x-icon">

    <!-- <link rel="stylesheet" href="../CSS/estilos.css"> -->

    <!-- GOOGLE FONTS ICONS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

<style>
   .novoLink{
     text-decoration: none; 
   }
</style>
</head>

<body>



    <?php
    require '../Script/conexao.php';
    require '../Script/funcoesBD.php';
    require '../Script/funcoes.php';

    $sql = "SELECT * FROM usuarios";
    $user = $con->prepare($sql);
    $user->execute();
    //Armazenar os dados da consulta em um array
    $dados = $user->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <h1 class="bg-danger text-white">Lista de Usuários</h1>
    <table class="d-flex justify-content-center table bg-danger">
       
        <tr>
            <th class="text-white">
                ID
            </th>
            <th class="text-white">
                NOME
            </th>
            <th class="text-white">
                E-mail
            </th>
            <th class="text-white">
                Data Cad
            </th>
            <th class="text-white">
                Tipo
            </th>
            <th colspan="3" class="text-white">
                Ações
            </th>
        </tr>

        <?php
        foreach ($dados as $i) {
        ?>
            <tr>
                <td class="text-white">
                    <?php echo $i['idusuario']."<br>"; ?>
                </td>
                <td class="text-white">
                    <?=$i['nome'] . "<br>"; ?>
                </td>
                <td class="text-white">
                    <?=$i['email'] . "<br>"; ?>
                </td>
                <td class="text-white">
                    <?=date("d/m/Y",strtotime($i['dataCad'])) . "<br>"; ?>
                </td>
                <td class="text-white">
                    <?=$i['tipoUser'] . "<br>"; ?>
                </td>
                <td class="text-white">
                    <a href="../Form/formUpdateUsuario.php?id=<?=$i['idusuario']?>" class="novoLink bg-light text-dark p-1 rounded">
                        Editar
                    </a>
                </td>
                <td class="text-white">
                    <a href="./scriptExcluirUsuario.php?id=<?=$i['idusuario']?>" class="novoLink bg-light text-dark p-1 rounded">
                        Excluir
                    </a>
                </td>
                <td class="text-white ">
                    <a href="../Form/formCadUsuario.php" class="novoLink bg-light text-dark p-1 rounded">
                        Adicionar
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>