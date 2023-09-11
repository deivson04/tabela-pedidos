<?php
session_start();

if(!isset($_SESSION["email"])) {
  header('Location: view/login.php');
}
require 'model/repositorio_pedidos.php';

$pedidos = $repositorio->getListaPedido($_SESSION["id"]);

$destino = "controller/cadastrar_pedido.php";

if(isset($_GET['codigo'])){
  $codigo = $_GET['codigo']; //Guardamos o codigo enviado na variável $codigo
  //Obtemos o objeto prato relativo ao código
  $pedido = $repositorio->buscarPedido();
 //Agora a variável destino vai apontar para alterar_pedido.php
 $destino = "alterar_pedido.php";
//  //Vamos acrescentar este campo oculto no formulário que contem o codigo do resgistro 
//   $oculto = '<input type="hidden" name="codigo" value="'. $codigo .'" />'; 
 }
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <title>Relatório De Pedidos</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
<div class="offset-md-10 offset-sm-10 col-md-1 col-sm-1 offset-10 col-1">
  <a class="btn btn-primary" href="controller/deslogar.php"><i class="bi bi-box-arrow-right"></i> Sair </a>
</div>
 <div class='container'>

 <?php
   echo "<font size=3>Bem-Vindo(a) " . $_SESSION["nome"] . "!<BR>\n";
   ?>  
 <h1>RELATÓRIO DE PEDIDOS</h1>
  
  <form class="container-fluid justify-content-start">
    <a class="btn btn-outline-success me-2 active" href="#">Pedidos</a>
    <a class="btn btn-sm btn-outline-secondary"  href="view/inserir_Pedidos.php">Inserir Pedidos</a>
  </form>


<div class="row linha-titulo">
    <div class="col-md-1 col-sm-1 titulo">ID</div>
    <div class="col-md-1 col-sm-1 titulo">Nome do Cliente</div>
    <div class="col-md-1 col-sm-1 titulo">Nome da Loja</div>
    <div class="col-md-1 col-sm-1 titulo">Data do Pedido</div>
    <div class="col-md-1 col-sm-1 titulo">Bairro Da Loja</div>
    <div class="col-md-2 col-sm-2 titulo">Descrição do Pedido</div>
    <div class="col-md-1 col-sm-1 titulo">Met. Pagamento</div>
    <div class="col-md-2 col-sm-1 titulo">Parcelamento</div>
</div>

 
    
<?php
    if($pedidos) {
    
    while($pedidoTemporario = array_shift($pedidos)){                               						
?>
    <div class="row linha-corpo">
        <div class="col-md-1 col-sm-3 corpo"><?php echo $pedidoTemporario->getCodigo() ?></div>
        <div class="col-md-1 col-sm-1 corpo"><?php echo $pedidoTemporario->getNomeDoCliente() ?></div>
        <div class="col-md-1 col-sm-1 corpo"><?php echo $pedidoTemporario->getNomeDaLoja() ?></div>
        <div class="col-md-1 col-sm-1 corpo"><?php echo date('d/m/Y',  strtotime($pedidoTemporario->getDataDoPedido())); ?></div>
        <div class="col-md-1 col-sm-1 corpo"><?php echo $pedidoTemporario->getBairroDaLoja() ?></div>
        <div class="col-md-2 col-sm-2 corpo"><?php echo $pedidoTemporario->getDescricaoDoPedido() ?></div>
        <div class="col-md-1 col-sm-1 corpo"><?php echo $pedidoTemporario->getMetodoDePagamento() ?></div>
        <div class="col-md-1 col-sm-1 corpo"><?php echo $pedidoTemporario->getParcelamento() ?></div>
        <div class="col-md-1 col-sm-1 corpo"><a class="btn btn-primary" href="view/editar_pedido.php?codigo=<?= $pedidoTemporario->getCodigo(); ?>"><i class="bi bi-brush"></i>Alterar</a></div>
        <div class="col-md-1 col-sm-1 corpo"><a class="btn btn-primary" href="controller/remover_pedido.php?codigo=<?= $pedidoTemporario->getCodigo(); ?>"><i class="bi bi-x">Remover</i></a></div>
        <div class="col-md-1 col-sm-1 corpo"><a class="btn btn-primary" href="view/gerarpdf.php?codigo=<?= $pedidoTemporario->getCodigo(); ?>"><i class="bi bi-arrow-up-circle-fill"></i>GerarPdf</a></div>
</div>
<?php                
    }     
}else{
  echo "Você não tem relatório ainda!";
}              
?>
<script src="js/bootstrap.min"></script>
<script src="js/tabelaPedidos.js"></script> 

</body>
  
</html>

