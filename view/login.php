    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RELATÓRIO DE PEDIDOS</title>
        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">    
        <link href="../css/styles.css" rel="stylesheet">
    </head>
    <body>
    <div class='container'>
        <h3>LOGIN</h3>
        
        
        <form action="../controller/controllerLogin.php" method="post">
        <div class="form-group">
                <div class="   col-md-6 offset-md-3">
                    <label>SEU E-MAIL</label>
                    <input type="text" name="email" class="form-control " placeholder="E-MAIL" required="" >    
                </div>
            </div>
            <br>  
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <label>SUA SENHA</label>  
                    <input type="password" name="senha" class="form-control" placeholder="SENHA" required="" >
                </div>
            </div>      
            <br>
            <div class="mb-3">
                <div class="col-md-6 offset-md-3">
                    <input type="submit" value="Entrar" class="btn btn-dark" name=""> 
                </div>
            </div>
            
            
            <div class="mb-3">   
            <div class="col-md-6 offset-md-3">      
                Não tem conta?
                <a href="guardar_Login.php">Cadastre-se</a>
            </div>
            </div>  
        </form>
        <div class="mb-3"> 
        <div class="col-md-6 offset-md-5">   
            <small><strong>&copy; Your Site 2023</strong></small>
        </div> 
    </div>
    </div>
    <script src="js/bootstrap.min"></script>
    <script src="js/tabelaPedidos.js"></script>

    </body>
    </html>