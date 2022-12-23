<?php
session_start();
if(isset($_SESSION['nome'])){
echo "Seja Bem vindo, ".$_SESSION['nome'];
?>
<br>
<a href="../projetobd_01/Script/scriptlogout.php">Sair</a>
<?php 
}else{
     header("Location:form/formlogin.php");
     }
?>