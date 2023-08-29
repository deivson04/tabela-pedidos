<?php
   require '../model/loginModel.php';
   
   //Cria um novo objeto com os dados recebidos pelo form
   $loginRecebido = new Login(null, $_REQUEST['email'], $_REQUEST['senha']);
   
   //Envia para o repositorio
   $repositorio->cadastrarLogin($loginRecebido);
   
   header('Location: ../index.php');
   exit;
?>

