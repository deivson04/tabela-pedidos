<?php
require 'conexao.php';
include $_SERVER["DOCUMENT_ROOT"] . '/tabela-pedidos/controller/classeLogin.php';
include $_SERVER["DOCUMENT_ROOT"] . '/tabela-pedidos/view/ilogin_model.php';

class LoginModel implements ILoginModel {

    //Objeto conexão que guardará a conexão com o banco
    private $conexao;
    
    //Construtor do repositório 
    public function __construct()
    {
        //Cria o objeto conexão que será responsável pelas chamadas ao banco de dados
        $this->conexao = new Conexao("localhost", "u577415805_deivson01", "Ma=!4[@;zJP1", "u577415805_tabelapedidos");
        //$this->conexao = new Conexao("localhost", "root", "", "tabelapedidos");
        
        //Conecta ao banco de dados
        if ($this->conexao->conectar() == false) {
            echo "Erro".mysqli_error();
        }
    }
    
    public function cadastrarLogin($login)
		{
			$nome = $login->getNome();
            $email = $login->getEmail();
			$senha = $login->getSenha();
			
			$sql = "INSERT INTO login (id, nome, email, senha) VALUES
			(NULL, '$nome', '$email', '$senha')";
			
			$this->conexao->executarQuery($sql);
		}
        
    public function buscarLogin($objeto) {
		$email = $objeto->getEmail();
        $sql = "SELECT 
                    * 
                FROM login 
                WHERE email='$email'";

        $listagem = $this->conexao->executarQuery($sql);
        $login = new Login(null,null,null,null);
        //Varre a lista de entradas da tabela pedidos e cria um novo objeto pedido para cada entrada da tabela
        while($linha = mysqli_fetch_array($listagem)){   
            $login->setId($linha["id"]);
            $login->setNome($linha["nome"]);
            $login->setEmail($linha["email"]);
            $login->setSenha($linha["senha"]);			    
        }

        //Retorna o array de pedidos
        return $login;
        
    }

}
$repositorio = new LoginModel();