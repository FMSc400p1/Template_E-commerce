<?php
session_start();
if(!isset($_SESSION['id']) or $_SESSION['tipo']!="adm"){
 header('Location:formlogin.php') ; 
}else{
    $id =$_SESSION['id'];
    $nome =$_SESSION['nome'];
    $tipo =$_SESSION['tipo'];
}
?>
<?php
require '../Script/conexao.php';
$id = $_GET['id'];

$sql = "SELECT prod_nome,prod_validade,prod_marca,prod_valor,prod_img1,prod_img2,prod_img3 FROM produto WHERE prod_id = ?";
$user = $con->prepare($sql);
$user-> bindValue(1,$id);
$user->execute();
$dados = $user->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T.e-commerce - Atualizar Produto</title>
    <link rel="stylesheet" href="../CSS/estilos.css">

    <!-- FAVICON -->
  <link rel="shortcut icon" href="../img/FavIcon/favicon.ico" type="image/x-icon">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
        .borda{
            width: 35%;
        }
    </style>
</head>

<body>
    
<div>
    <main class="d-flex justify-content-center flex-column align-items-center">
        <div class="m-5 bg- p-3 w-75 bg-light rounded">
            <h1 class="text-danger mt-3 ">Atualizar produto(s)</h1>
            <form action="../Script/ScriptUpdateProduto.php" method="POST" enctype="multipart/form-data" class="w-50 bg-danger">
                <label class="form-label mt-3 mx-3 text-white" for="">Nome:</label>
                    <input class="form-control" type="text" name="nome" value="<?=$dados['prod_nome']?>">

                <label class="form-label mt-3 mx-3 text-white" for="">Marca:</label>
                    <input class="form-control" type="text" name="marca" value="<?=$dados['prod_marca']?>">

                <label class="form-label mt-3 mx-3 text-white" for="">Valor:</label>
                    <input class="form-control" type="number" name="valor" value="<?=$dados['prod_valor']?>">

                <label class="form-label mt-3 mx-3 text-white" for="">Validade:</label>
                    <input class="form-control" type="date" name="val" value="<?=$dados['prod_validade']?>">

                <label class="form-label mt-3 mx-3 text-white" for="">Imagem 1:</label>
                    <img src="../img/<?=$dados['prod_img1']?>" width="150px" height="150px">
                    <input class="form-control" type="file" name="file1">

                <label class="form-label mt-3 mx-3 text-white" for="">Imagem 2:</label>
                    <img src="../img/<?=$dados['prod_img2']?>" width="150px" height="150px">
                    <input class="form-control" type="file" name="file2">

                <label class="form-label mt-3 mx-3 text-white" for="">Imagem 3:</label>
                    <img src="../img/<?=$dados['prod_img3']?>" width="150px" height="150px">
                    <input class="form-control" type="file" name="file3">
                    <input class="form-control" type="hidden" name="id" value="<?=$id?>">

                <br>
                    <input class="btn btn-light" type="submit" value="atualizar">
            </form>
        </div>
    </main>
</div>
</body>

</html>