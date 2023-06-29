<?php

require 'repositorio_pedidos.php';

$pedidos = $repositorio->getListaPedido();

$destino = "cadastrar_pedido.php";

if(isset($_GET['codigo'])){
  $codigo = $_GET['codigo']; //Guardamos o codigo enviado na variável $codigo
  //Obtemos o objeto prato relativo ao código
  $pedido = $repositorio->buscarPedido($codigo);
 //Agora a variável destino vai apontar para alterar_pedido.php
 $destino = "alterar_pedido.php";
 //Vamos acrescentar este campo oculto no formulário que contem o codigo do resgistro 
 $oculto = '<input type="hidden" name="codigo" value="'. $codigo .'" />'; 
}
?>

<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Tabela De Pedidos</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
   
 <div class='container'>

   <h1>TABELA DE PEDIDOS</h1>
   
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#">Pedidos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="inserir_Pedidos.php">Inserir Pedidos</a>
  </li>
</ul>


<table class="table table-hover">
 
<thead>
        <th>#</th>
        <th>Nome do Cliente</th>
        <th>Nome do Salão</th>
        <th>Data do Pedido</th>
        <th>Bairro do Salão</th>
        <th>Descrição do Pedido</th>
        <th>Metodo de Pagamento</th>
        <th>Parcelamento</th>
       
</thead>
   
    
    
    <?php
     while($pedidoTemporario = array_shift($pedidos)){                               						
		?>
    <tr>
    <td><?php echo $pedidoTemporario->getCodigo() ?></td>
    <td><?php echo $pedidoTemporario->getNomeDoCliente() ?></td>
        <td><?php echo $pedidoTemporario->getNomeDoSalao() ?></td>
        <td><?php echo $pedidoTemporario->getDataDoPedido() ?></td>
        <td><?php echo $pedidoTemporario->getBairroDoSalao() ?></td>
        <td><?php echo $pedidoTemporario->getDescricaoDoPedido() ?></td>
        <td><?php echo $pedidoTemporario->getMetodoDePagamento() ?></td>
        <td><?php echo $pedidoTemporario->getParcelamento() ?></td>
        <td class="col-md-1"><a class="btn btn-danger" href="editar_pedido.php?codigo=<?= $pedidoTemporario->getCodigo(); ?>" role="button">Alterar</a></td>
        <td class="col-md-1"><a class="btn btn-danger" href="remover_Pedido.php?codigo=<?= $pedidoTemporario->getCodigo(); ?>" role="button">Remover</a></td>
				<td class="col-md-1"><a class="btn btn-danger" href="gerarPdf.php?codigo=<?= $pedidoTemporario->getCodigo(); ?>" role="button">Gerar Pdf</a></td> 
   
    
    
					        
					       
					
      </tr>
      <?php                
			  }               
			?>
    
    
  </table>

  
       
      
    

  <script src="js/bootstrap.bundle.min.js"></script> 
  <script src="js/tabelaPedidos.js"></script> 

</body>
</html>

