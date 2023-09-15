<?php
session_start();

if(!isset($_SESSION["email"])) {
  header('Location: login.php');
}
require '../model/repositorio_pedidos.php';

$pedidos = $repositorio->getListaPedido($_SESSION["id"]);

$destino = "../controller/cadastrar_pedido.php";

if(isset($_GET['codigo'])){
  $codigo = $_GET['codigo']; //Guardamos o codigo enviado na variável $codigo
  //Obtemos o objeto prato relativo ao código
  $pedido = $repositorio->buscarPedido($codigo);
 //Agora a variável destino vai apontar para alterar_pedido.php
//  $destino = "alterar_pedido.php";
 //Vamos acrescentar este campo oculto no formulário que contem o codigo do resgistro 
//  $oculto = '<input type="hidden" name="codigo" value="'. $codigo .'" />'; 
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class='container'>

<header>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand offset-sm-5" href="#">
    <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="20" height="30" class="d-inline-block align-top" alt="">
   Cadastrar Pedidos
  </a>
    
   
  </nav>

<br> 
</header>
<br>
<nav>      
<form class="container-fluid justify-content-start">
    <a class="btn btn-sm btn-outline-secondary" href="../index.php">Pedidos</a>
    <a class="btn btn-sm btn-outline-secondary active"  href="#">Inserir Pedidos</a>
</form> 
</nav>
<br>
<form action="<?=$destino; ?>" method="post"> 
<div class="form-label">
    <label for="cliente" class="form-label">Nome do Cliente:</label>
    <input type="text" value="" name="nomeDoCliente" class="form-control" id="" style="min-width:300px;"  placeholder="Nome do Cliente" required>
  </div>
  
  <div class="form-label">
    <label for="salao" class="form-label">Nome da Loja:</label>
    <input type="text" value="" name="nomeDaLoja" class="form-control" id="" style="min-width:300px;" placeholder="Nome da Loja" required>
  </div>

  <div class="form-label">
    <label for="date" class="form-label">Data do Pedido:</label>
    <input type="date" value="" name="dataDoPedido" class="form-control" id="" style="min-width:300px;" data-format="00/00/0000"  placeholder="dd/mm/yyyy" required>
  </div>
  
  <div class="form-label">
    <label for="bairro" class="form-label">Bairro da Loja:</label>
    <input type="text" value="" name="bairroDaLoja" class="form-control" id="" style="min-width:300px;"  placeholder="bairro da Loja" required>
  </div>
  
  <label for="descricao">Descriçao do Pedido:</label>
  <textarea name="descricaoDoPedido" value="" class="form-control" rows="5" id="" required></textarea>
  
  <br> 
  <label for="descricao">Metodo de pagamento:</label>
  <select class="form-select" value="" id=""  name="metodoDePagamento" aria-label="Default select example">
  <option selected>Escolha a Forma de Pagamento</option>
  <option value="Cartão de Credito">Cartão de Credito</option>
  <option value="Boleto">Boleto</option>
  <option value="Pix">Pix</option>
  <option value="Á Vista">Á Vista</option>
</select>  
<br>
<label for="descricao">Parcelamento:</label>
  <select class="form-select" value="" id=" " name="parcelamento" aria-label="Default select example">
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
<button type="submit" class="btn btn-primary">Salvar</button>
<input type="hidden" name="login_id" value="<?php echo $_SESSION["id"]; ?>">  
</form>     
</div>      
    

  <script src="../js/bootstrap.min"></script>
  <script src="js/tabelaPedidos.js"></script> 

</body>
</html>
















