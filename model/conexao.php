<?php
  
  class Conexao {
  	//Atributos da classe conexão.
  	//Essas informações são relevantes para o acesso ao banco. Por exemplo, host, usuário e senha.
  	
  	private $host;
	private $usuario;
	private $senha;
	private $banco;
	private $conexao;
  	
	//Construtor da classe conexão. Este método é responsável por inicializar as variáveis
	//do objeto conexão a ser criado.
	
	public function __construct($host, $usuario, $senha,$banco)
	{
		//Observe a utilização da variável $this.Neste caso, ela está servindo para diferenciar
		//o atributo da classe (o que está apontado por this) e os argumentos da função __construct
		
		$this->host = $host;
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->banco = $banco;
		
		//Observe que o atributo conexão não está sendo inicializado.
		//Este será inicializado no método conectar.
	}
	
	public function conectar()
	{
		//Solicita conexão ao banco de dados
		$this->conexao = mysqli_connect(
			$this->host,
			$this->usuario,
			$this->senha,
			$this->banco);
		
		//Caso tenha ocorrido algum erro, avisa o usuário sobre o erro e retorna false.
		if (mysqli_connect_errno()) {
			return false;
		}
		//Se tudo deu certo! Seta a codificação para UTF8 e retorna true.
		else 
		 {
			mysqli_query($this->conexao, "SET NAMES 'utf8';");
			return true;
		}
	}
  	
	//Função que executa queries ("buscas") no banco de dados.
	public function executarQuery($sql)
	{
		return mysqli_query($this->conexao, $sql);
		
	}
	
	//Função que executa uma busca e retorna o primeiro registro encontrado.
	public function obtemPrimeiroRegistroQuery($query)
	{
		//Enviamos o pedido pelo conexão e guardamos a resposta em $linhas
		$linhas = $this ->executarQuery($query);
		// retorna a primeira linha
		return mysqli_fetch_array($linhas);
	}
  }
?>
