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

function redirecionar_pagina($msg,$url){
    echo "<script>alert('$msg')</script>";
    echo "<script>window.location='$url'</script>";
}


function salvar_arquivo($imgNome, $imgTmp, $arqValidos, $pasta)
{
    //verificar a extensao do arquivo
    $ext = pathinfo($imgNome, PATHINFO_EXTENSION);
    if (in_array($ext, $arqValidos)) {
        //gerar nome unico
        $novoNome = uniqid() . "." . $ext;
        //mover arquivo para o servidor
        move_uploaded_file($imgTmp, $pasta . $novoNome);
        return $novoNome;
    } else {
        redirecionar_pagina('Arquivo Invalido', '../Form/formCadUsuario.php');
        exit;
    }
}


function verificar($str1,$str2){
    if($str1!=$str2){
        redirecionar_pagina("As senhas nao conferem","../Form/formCadUsuario.php");
        exit;
    }
}

function verificarEmail($str1,$str2){
    if($str1!=$str2){
        redirecionar_pagina("Os email nao conferem","../Form/formCadUsuario.php");
        exit;
    }
}

function atualizar_img($imgNome, $imgTmp, $arqValidos, $pasta, $imgBanco)
    {
        //verificar a extensao do arquivo
        $ext = pathinfo($imgNome, PATHINFO_EXTENSION);
        if (in_array($ext, $arqValidos)) {
            //mover arquivo para o servidor
            move_uploaded_file($imgTmp, $pasta . $imgBanco);
        } else {
            redirecionar_pagina('Arquivo Invalido', '../Form/formCadUsuario.php');
            exit;
        }
    }

?>


</body>
</html>

