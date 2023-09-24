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
        //Conecta ao banco de dados
        $this->conexao = (new Conexao())->abrirConexao();
    }
    
    public function cadastrarLogin($login)
		{
			$nome = $login->getNome();
            $email = $login->getEmail();
			$senha = $login->getSenha();
			
			$sql = "INSERT INTO login 
                        (nome, email, senha) 
                        VALUES
			            (:nome, :email, :senha)";
			
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindParam(":nome", $nome);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":senha", $senha);
			$stmt->execute();
		}
        
    public function buscarLogin($objeto) {
		$email = $objeto->getEmail();
        $sql = "SELECT 
                    * 
                FROM login 
                WHERE email = :email";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        $login = new Login(null,null,null,null); 
        $login->setId($linha["id"]);
        $login->setNome($linha["nome"]);
        $login->setEmail($linha["email"]);
        $login->setSenha($linha["senha"]);

        //Retorna o array de pedidos
        return $login;
        
    }

}
$repositorio = new LoginModel();