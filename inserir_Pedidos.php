



<!DOCTYPE html>
<html lang="en">
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
 
 <h1>INSERIR PEDIDOS</h1>
 
 <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Pedidos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="inserir_Pedidos.php">Inserir Pedidos</a>
  </li>
</ul>

<form action="" method="post"> 
<?= @$oculto; ?>
<div class="form-label">
    <label for="cliente" class="form-label">Nome do Cliente:</label>
    <input type="text" value="<?php echo isset($pedido)?$pedido->getNomeDoCliente():""; ?>" name="nomeDoCliente" class="form-control" id="nomeDoCliente" style="min-width:300px;"  placeholder="Enter client" required>
  </div>
  
  <div class="form-label">
    <label for="salao" class="form-label">Nome do Salão:</label>
    <input type="text" value="<?php echo isset($pedido)?$pedido->getNomeDoSalao():""; ?>" name="nomeDoSalao" class="form-control" id="nomeDoSalao" style="min-width:300px;" placeholder="Enter hall" required>
  </div>

  <div class="form-label">
    <label for="date" class="form-label">Data do Pedido:</label>
    <input type="date" value="<?php echo isset($pedido)?$pedido->STR_TO_DATE(getDataDoPedido()):""; ?>" name="dataDoPedido" class="form-control" id="dataDoPedido" style="min-width:300px;"  placeholder="Enter Date" required>
  </div>
  
  <div class="form-label">
    <label for="bairro" class="form-label">Bairro do Salão:</label>
    <input type="text" value="<?php echo isset($pedido)?$pedido->getBairroDoSalao():""; ?>" name="bairroDoSalao" class="form-control" id="bairroDoSalao" style="min-width:300px;"  placeholder="Enter Neighborhood" required>
  </div>
  
  <label for="descricao">Descriçao do Pedido:</label>
  <textarea name="descricaoDoPedido" value="<?php echo isset($pedido)?$pedido->getDescricaoDoPedido():"";?>" class="form-control" rows="5" id="descricao" required></textarea>
  
  <br> 
  <select class="form-select" value="<?php echo isset($pedido)?$pedido->getMetodoDePagamento():""; ?>" id="pagamento"  name="metodoDePagamento" aria-label="Default select example">
  <option selected>Escolha a Forma de Pagamento</option>
  <option value="Cartão de Credito">Cartão de Credito</option>
  <option value="Boleto">Boleto</option>
  <option value="Pix">Pix</option>
  <option value="Á Vista">Á Vista</option>
</select>  
<br>
<br>
  <select class="form-select" value="<?php echo isset($pedido)?$pedido->getParcelamento():""; ?>" id="parcela" name="parcelamento" aria-label="Default select example">
  <option selected>Escolha a Quantidade de Parcelas</option>
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
<br>  
<br>  
<button type="submit" class="btn btn-primary">Salvar</button>






 
</div>
  
</form>     
      
    

  <script src="js/bootstrap.bundle.min.js"></script> 
  <script src="js/tabelaPedidos.js"></script> 

</body>
</html>
















