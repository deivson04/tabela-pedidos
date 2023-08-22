<?php
require 'conexao.php';

class LoginModel {

    //Objeto conexão que guardará a conexão com o banco
    private $conexao;
    
    //Construtor do repositório de pratos
    public function __construct()
    {
        //Cria o objeto conexão que será responsável pelas chamadas ao banco de dados
        $this->conexao = new Conexao("loalhost", "u577415805_deivson01", "Ma=!4[@;zJP1", "u577415805_tabelapedidos");
        
        //Conecta ao banco de dados
        if ($this->conexao->conectar() == false) {
            echo "Erro".mysqli_error();
        }
    }

    public function buscarLogin($objeto) {
		$email = $objeto->getEmail();
        $sql = "SELECT 
                    * 
                FROM login 
                WHERE email='$email'";

        $listagem = $this->conexao->executarQuery($sql);
        $login = new Login();
        //Varre a lista de entradas da tabela pedidos e cria um novo objeto pedido para cada entrada da tabela
        while($linha = mysqli_fetch_array($listagem)){   
            $login->setId($linha["id"]);
            $login->setEmail($linha["email"]);
            $login->setSenha($linha["senha"]);			    
        }

        //Retorna o array de pedidos
        return $login;
        
    }
}