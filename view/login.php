<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABELA DE PEDIDOS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class='container'>
    <h3>Login</h3>
    
    
    <form action="../controller/controllerLogin.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp" placeholder="Digite seu Email" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" name="senha" id="" placeholder="Senha" required>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Entrar">
    
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="js/tabelaPedidos.js"></script>

</body>
</html>