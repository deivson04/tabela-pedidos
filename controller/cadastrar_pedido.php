<?php
   require '../model/repositorio_pedidos.php';
   
   //Cria um novo objeto com os dados recebidos pelo form
   $pedidoRecebido = new Pedido(null, $_REQUEST['nomeDoCliente'], $_REQUEST['nomeDaLoja'], $_REQUEST['dataDoPedido'], $_REQUEST['bairroDaLoja'],  $_REQUEST['descricaoDoPedido'], $_REQUEST['metodoDePagamento'], $_REQUEST['parcelamento']);
   
   //Envia para o repositorio
   $repositorio->cadastrarPedido($pedidoRecebido);
   
   header('Location: ../index.php');
   exit;
?>

