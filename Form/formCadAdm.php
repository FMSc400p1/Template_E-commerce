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
    <title>T.e-commerce - Cadastrar Administrador</title>
    <link rel="stylesheet" href="../CSS/estilos.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img/FavIcon/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="css/reset.css" />

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>

<body>
    <main class="d-flex justify-content-center flex-column align-items-center">

        <div class="row col col-10 col-sm-6 rounded mt-3 mb-3">
            <div class="d-flex justify-content-center">
                <h1 class="text-danger mt-3 ">Cadastrar Administrador</h1>
            </div>
            <form action="../Script/scriptinsert.php" method="POST" enctype="multipart/form-data" class="bg-light border-danger mb-3">
                <label for="" class="form-label mt-3 mx-3">Nome</label>
                <input type="text" name="nome" id="" class="form-control" required>
                <label for="" class="form-label mt-3 mx-3">Email</label>
                <input type="email" name="email" id="" class="form-control" required>
                <label for="" class="form-label mt-3 mx-3">Confirmar Email</label>
                <input type="email" name="email2" id="" class="form-control" required>
                <label for="" class="form-label mt-3 mx-3">Senha</label>
                <input type="password" name="senha" id="" class="form-control" required>
                <label for="" class="form-label mt-3 mx-3">Confirme sua senha</label>
                <input type="password" name="senha2" id="" class="form-control mb-3" required>
                <input type="hidden" name="tipo" value="adm">
                <input type="submit" class="btn btn-danger" value="Cadastrar">
            </form>
        </div>
    </main>
</body>

</html>