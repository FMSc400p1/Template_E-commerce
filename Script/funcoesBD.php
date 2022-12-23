<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

function cadastrar_usuario($con,$nome, $email, $senha, $dt, $tipo)
{
    $sql = "INSERT INTO usuarios (nome,email,senha,dataCad,tipoUser) VALUES(?,?,?,?,?)";
    $user = $con->prepare($sql);
    $user->bindParam(1, $nome);
    $user->bindParam(2, $email);
    $user->bindParam(3, $senha);
    $user->bindParam(4, $dt);
    $user->bindParam(5, $tipo);

    if ($user->execute()) {
        redirecionar_pagina("Seus dados foram cadastrados", "../index.html");
    }
}

function cadastrar_prod($con,$nome,$marca, $datav, $preco, $img, $img2, $img3,$desc) 
{
    $sql = "INSERT INTO produto (prod_nome,prod_validade,prod_marca,prod_valor,prod_img1,prod_img2,prod_img3,prod_desc) VALUES(?,?,?,?,?,?,?,?)";
    $user = $con->prepare($sql);
    $user->bindParam(1, $nome);
    $user->bindParam(2, $datav);
    $user->bindParam(3, $marca);    
    $user->bindParam(4, $preco);
    $user->bindParam(5, $img);
    $user->bindParam(6, $img2);
    $user->bindParam(7, $img3);
    $user->bindParam(8, $desc);



    if ($user->execute()) {
        redirecionar_pagina("Seus dados foram cadastrados", "../index.php");
    }

}

function verificar_E($con,$email)
{
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $obj = $con->prepare($sql);
    $obj->bindParam(1, $email);
    $obj->execute();

    if ($obj->rowCount() > 0) {
        redirecionar_pagina("esse email ja existe",'../Form/formCadUsuario.php');
        $con = null;
        exit;
    }
}

function deletarU($con,$id,$img,$pasta){
    $sql = "DELETE FROM usuarios WHERE idusuario = ? ";
    $user = $con->prepare($sql);
    $user->bindParam(1,$id);
    if($user->execute()){
        //Apagar arquivos
        unlink($pasta.$img);
        redirecionar_pagina('Dados excluidos com sucesso','listausuariosAdm.php');
    }
    }


    function deletarP($con,$id,$img1,$img2,$img3,$pasta){
        $sql = "DELETE FROM produto WHERE prod_id = ? ";
        $user = $con->prepare($sql);
        $user->bindParam(1,$id);
        if($user->execute()){
            //Apagar arquivos
            unlink($pasta.$img1);
            unlink($pasta.$img2);
            unlink($pasta.$img3);
            redirecionar_pagina('Dados excluidos com sucesso','listaprodutoAdm.php');
        }
        }
?>



</body>
</html>

