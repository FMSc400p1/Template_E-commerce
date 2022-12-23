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
    <title>T.e-commerce - Lista de Produtos</title>
    <link rel="stylesheet" href="../CSS/estilos.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img/FavIcon/favicon.ico" type="image/x-icon">

    <!-- GOOGLE FONTS ICONS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

</head>

<body>
    <?php
    require '../Script/conexao.php';
    require '../Script/funcoesBD.php';
    require '../Script/funcoes.php';

    $sql = "SELECT * FROM produto";
    $user = $con->prepare($sql);
    $user->execute();
    //Armazenar os dados da consulta em um array
    $dados = $user->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <h1 class="bg-danger text-white">Lista de Produtos</h1>
    <table class="d-flex justify-content-center table bg-danger">
        <tr>
            <th class="text-white">
                ID
            </th>
            <th class="text-white">
                Img1
            </th>
            <th class="text-white">
                Img2
            </th>
            <th class="text-white">
                Img3
            </th>
            <th class="text-white">
                Nome
            </th>
            <th class="text-white">
                Marca
            </th>
            <th class="text-white">
                Valor
            </th class="text-white">
            <th class="text-white">
                Validade
            </th>
            <th class="text-white">
                Descrição
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
                    <?php echo $i['prod_id']."<br>"; ?>
                </td>
                <td class="text-white">
                    <img src="../img/<?=$i['prod_img1']?>" width="100px" height="100px">
                </td>
                <td class="text-white">
                    <img src="../img/<?=$i['prod_img2']?>" width="100px" height="100px">
                </td>
                <td class="text-white">
                    <img src="../img/<?=$i['prod_img3']?>" width="100px" height="100px">
                </td>
                <td class="text-white">
                    <?=$i['prod_nome'] . "<br>"; ?>
                </td>
                <td class="text-white">
                    <?=$i['prod_marca'] . "<br>"; ?>
                </td>
                <td class="text-white">
                    <?=$i['prod_valor'] . "<br>"; ?>
                </td>
                
                <td class="text-white">
                    <?=date("d/m/Y",strtotime($i['prod_validade'])) . "<br>"; ?>
                </td>
                <td class="text-white">
                    <?=$i['prod_desc'] . "<br>"; ?>
                </td>
                <td class="text-white">
                    <a href="../Form/formUpdateProduto.php?id=<?=$i['prod_id']?>" class="novoLink bg-light text-dark p-1 rounded">
                        Editar
                    </a>
                </td>
                <td class="text-white">
                    <a href="scriptExcluirProd.php?id=<?=$i['prod_id']?>&ft1=<?=$i['prod_img1']?>&ft2=<?=$i['prod_img2']?>&ft3=<?=$i['prod_img3']?>" class="novoLink bg-light text-dark p-1 rounded">
                        Excluir
                    </a>
                </td>
                <td class="text-white">
                    <a href="../Form/formCadProd.php" class="novoLink bg-light text-dark p-1 rounded">
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