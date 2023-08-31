<?php
session_start();

if(!isset($_SESSION["email"])) {
  header('Location: login.php');
}
require '../model/repositorio_pedidos.php';

$pedidos = $repositorio->getListaPedido();

//  $destino = "cadastrar_pedido.php";

if(isset($_GET['codigo'])){
  $codigo = $_GET['codigo']; //Guardamos o codigo enviado na variável $codigo
  //Obtemos o objeto pedido relativo ao código
  $pedido = $repositorio->buscarPedido($codigo);
 //Agora a variável destino vai apontar para alterar_pedido.php
  $destino = "../controller/alterar_pedido.php";
 //Vamos acrescentar este campo oculto no formulário que contem o codigo do resgistro 
  // $oculto = '<input type="hidden" name="codigo" value="'. $codigo .'" />'; 
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <title>Tabela De Pedidos</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>


<div class='container'>
 
 <h1>ATUALIZAR PEDIDOS</h1>
 

<form action="<?=$destino; ?>" method="post"> 
<div class="form-label">
    <label for=" nome do cliente" class="form-label">Nome do Cliente:</label>
    <input type="text" value="<?php echo $pedido->getNomeDoCliente() ?>" name="nomeDoCliente" class="form-control" id="nomeDoCliente" style="min-width:300px;"  placeholder="Enter client" required>
  </div>
  
  <div class="form-label">
    <label for="nome do salao" class="form-label">Nome do Salão:</label>
    <input type="text" value="<?php echo isset($pedido)?$pedido->getNomeDaLoja():""; ?>" name="nomeDoSalao" class="form-control" id="nomeDoSalao" style="min-width:300px;" placeholder="Enter hall" required>
  </div>
  
  <div class="form-label">  
  <label for="data do pedido" class="form-label">Data do Pedido:</label>
    <input type="date" value="<?php echo isset($pedidos)?$pedido->getDataDoPedido():""; ?>" name="dataDoPedido" class="form-control" id="dataDoPedido" style="min-width:300px;"  placeholder="Enter Date" required>
  </div>
   
  <div class="form-label">
    <label for="bairro do salao" class="form-label">Bairro do Salão:</label>
    <input type="text" value="<?php echo isset($pedido)?$pedido->getBairroDaLoja():""; ?>" name="bairroDoSalao" class="form-control" id="bairroDoSalao" style="min-width:300px;"  placeholder="Enter Neighborhood" required>
  </div>
  
  <div class="form-label">
  <label for="descricao do pedido">Descriçao do Pedido:</label>
  <textarea name="descricaoDoPedido" class="form-control" rows="5" required><?php echo isset($pedido)?$pedido->getDescricaoDoPedido():"";?></textarea>
  </div>
  <br> 
<div class="form-label">

<select class="form-select" id="pagamento"  name="metodoDePagamento" aria-label="Default select example">
  <option><?php echo isset($pedido)?$pedido->getMetodoDePagamento():""; ?></option>
  <option value="Cartão de Credito">Cartão de Credito</option>
  <option value="Boleto">Boleto</option>
  <option value="Pix">Pix</option>
  <option value="Á Vista">Á Vista</option>
  
</select>  

</div>
<br>
<br>
<div class="form-label">  
<select class="form-select" id="parcela" name="parcelamento" aria-label="Default select example">
  <option><?php echo isset($pedido)?$pedido->getParcelamento():""; ?></option>
  <option value="1x">1x</option>
  <option value="2x">2x</option>
  <option value="3x">3x</option>
  <option value="4x">4x</option>
  <option value="5x">5x</option>
  <option value="6x">6x</option>
  <option value="7x">7x</option>
  <option value="8x">8x</option>
  <option value="9x">9x</option>
  <option value="10x">10x</option>
  <option value="11x">11x</option>
  <option value="12x">12x</option>
</select>  
</div>
<br>  
<br>  

 <input type="hidden" name="codigo" value="<?= $pedido->getCodigo(); ?>" />
 <p><input type="submit" name="submit" class="btn btn-primary" value="salvar" /></p>
 
</form>     
</div>     
    

  <script src="js/bootstrap.bundle.min.js"></script> 
  <script src="js/tabelaPedidos.js"></script> 

</body>
</html>
















