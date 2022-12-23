<?php
require '../Script/conexao.php';
$id = $_GET['id'];
$sql = "SELECT nome,email,senha,tipoUser FROM USUARIOS WHERE idusuario = ?";
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
    <title>T.e-commerce - Atualizar Usuário</title>
    <link rel="stylesheet" href="../CSS/estilos.css">

    <!-- FAVICON -->
  <link rel="shortcut icon" href="../img/FavIcon/favicon.ico" type="image/x-icon">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>
<body>
    <div>
        <main class="d-flex justify-content-center flex-column align-items-center">
            <div class="m-5 bg- p-3 w-75 bg-light rounded">
                <h1 class="text-danger mt-3 ">Atualizar Usuários</h1>
                <form action="../Script/scriptUpdate.php" method="POST" enctype="multipart/form-data" class="w-50 bg-danger">
                    <label class="form-label mt-3 mx-3 text-white" for="">Nome:</label>
                    <input class="form-control" type="text" name="nome" value="<?=$dados['nome']?>">
                    <label class="form-label mt-3 mx-3 text-white" for="">E-mail:</label>
                    <input class="form-control" type="email" name="email" value="<?=$dados['email']?>">
                    <label class="form-label mt-3 mx-3 text-white" for="">Nova Senha:</label>
                    <input class="form-control" type="password" name="senha">
                    <label class="form-label mt-3 mx-3 text-white" for="">Confirmar Nova Senha:</label>
                    <input class="form-control" type="password" name="senha2">
                   
 

                    <?php
session_start();
if(!isset($_SESSION['id']) or $_SESSION['tipo']=="adm"){?>
 <label class="form-label mt-3 mx-3 text-white" for="">Tipo de Usuario</label>
                    <div class="d-flex align-items-center text-white">
                        <input class="m-3" type="radio" name="tipo" value="adm">Adm 
                        <input class="m-3" type="radio" name="tipo" value="comum" checked>Comum
<?php
}
   
?>
                    
                        <input class="form-control" type="hidden" name="id" value="<?=$id?>">
                    </div>
                    <br>
                    <input class="btn btn-light" type="submit" value="Atualizar">
                </form>
            </div>
        </main>
    </div>
</body>
</html>