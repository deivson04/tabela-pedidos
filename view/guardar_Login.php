<?php
require '../model/loginModel.php';

$destino = "../controller/cadastrar_login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
<div class='container'>
    <h3>CADASTRO</h3>
    
    
    <form action="<?=$destino; ?>" method="post">
    
    <div class="form-group">
    <div class="col-md-6 offset-md-3">    
    <label>SEU E-MAIL</label>
        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp" placeholder="Digite seu Email" required>
    </div>
    <br>
    <div class="form-group">
    <div class="col-md-6 offset-md-3">    
    <label>SUA SENHA</label>
        <input type="password" class="form-control" name="senha" id="" placeholder="Minimo 06 caracteres" required>
    </div>
    <br>
    <div class="col-md-6 offset-md-3">
      <input type="submit" class="btn btn-dark" value="Cadastrar">
    </div>
    
    <p class="link">
    <div class="col-md-6 offset-md-3">       
            Já tem conta?
            <a href="login.php">Faça Login</a>
          </p>
    </div>
    
    <p class="link1">   
        <div class="col-md-6 offset-md-3">      
            <a href="#">Esquecir minha senha</a>
        </p>  
        </div>  

</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="js/tabelaPedidos.js"></script>

</body>
</html>