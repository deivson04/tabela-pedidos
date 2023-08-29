<?php
    require 'conexao.php';
	include $_SERVER["DOCUMENT_ROOT"] . '/tabela-pedidos/controller/pedido.php';
 	include $_SERVER["DOCUMENT_ROOT"] . '/tabela-pedidos/view/irepositorio_pedido.php';
	
	//Classe de repositório de pedidos que implementa IRepositorioPedidos
	class RepositorioPedidos implements IRepositorioPedido {
		
		//Objeto conexão que guardará a conexão com o banco
		private $conexao;
		
		//Construtor do repositório de pratos
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
		
		//Cadastra um novo pedido. Observe que a SQL é preparada e enviada para o banco. 
		//O mesmo ocorre com o restante dos métodos dessa classe
		public function cadastrarPedido($pedido)
		{
			$nomeDoCliente = $pedido->getNomeDoCliente();
			$nomeDaLoja = $pedido->getNomeDaLoja();
			$dataDoPedido = $pedido->getDataDoPedido();
			$bairroDaLoja = $pedido->getBairroDaLoja();
			$descricaoDoPedido = $pedido->getDescricaoDoPedido();
			$metodoDePagamento = $pedido->getMetodoDePagamento();
			$parcelamento = $pedido->getParcelamento();
			
			$sql = "INSERT INTO pedido (codigo, nomeDoCliente, nomeDaLoja, dataDoPedido, bairroDaLoja, descricaoDoPedido,
			metodoDePagamento, parcelamento) VALUES
			(NULL, '$nomeDoCliente', '$nomeDaLoja', '$dataDoPedido', '$bairroDaLoja', '$descricaoDoPedido', '$metodoDePagamento', '$parcelamento')";
			
			$this->conexao->executarQuery($sql);
		}
		
		//Remove um pedido do banco de dados
		public function removerPedido($codigo)
		{
			$sql = "DELETE FROM pedido WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}
		
		//Atualiza a informação de um dado pedido no banco de dados
		public function alterarPedido($pedido)
		{
			$codigo = $pedido->getCodigo();
			$nomeDoCliente = $pedido->getNomeDoCliente();
			$nomeDaLoja = $pedido->getNomeDaLoja();
			$dataDoPedido = $pedido->getDataDoPedido();
			$bairroDaLoja = $pedido->getBairroDaLoja();
			$descricaoDoPedido = $pedido->getDescricaoDoPedido();
			$metodoDePagamento = $pedido->getMetodoDePagamento();
			$parcelamento = $pedido->getParcelamento();

			
			$sql = "UPDATE pedido SET nomeDoCliente='$nomeDoCliente', 
			nomeDaLoja='$nomeDaLoja', dataDoPedido='$dataDoPedido', bairroDoSalao='$bairroDaLoja', descricaoDoPedido='$descricaoDoPedido', metodoDePagamento='$metodoDePagamento', parcelamento='$parcelamento'
			WHERE codigo='$codigo'";
			
			$this->conexao->executarQuery($sql);
		}
		
		//Busca um novo pedido a partir de seu código. 
		//Observe que um novo objeto pedido é criado baseado com o que é retornado do banco.
		public function buscarPedido($codigo)
		{
			//Obtem o primeiro registro do select abaixo
			$linha = $this->conexao->obtemPrimeiroRegistroQuery("SELECT * FROM pedido WHERE codigo='$codigo'");
			 
			 //Cria um novo objeto pedido baseado na busca acima
			 $pedido = new Pedido($linha['codigo'], $linha['nomeDoCliente'], $linha['nomeDaLoja'], $linha['dataDoPedido'],  $linha['bairroDaLoja'], $linha['descricaoDoPedido'], $linha['metodoDePagamento'], $linha['parcelamento'])	;
			 
			 return $pedido;
		}
		
		public function getListaPedido()
		{
			//Obtem a lista de todos os pedidos cadastrados
			$listagem = $this->conexao->executarQuery("SELECT * FROM pedido");
			
			//Cria um novo array onde os objetos pedidos serão guardados
			$arrayPedidos = array();
			
			//Varre a lista de entradas da tabela pedidos e cria um novo objeto pedido para cada entrada da tabela
			while($linha = mysqli_fetch_array($listagem)){
				
				$pedido = new Pedido($linha['codigo'], $linha['nomeDoCliente'], $linha['nomeDaLoja'], $linha['dataDoPedido'],  $linha['bairroDaLoja'], $linha['descricaoDoPedido'], $linha['metodoDePagamento'], $linha['parcelamento']);
			    array_push($arrayPedidos, $pedido);
			}
			
			//Retorna o array de pedidos
			return $arrayPedidos;
		}
	} 

	//Cria o objeto repositório de pedidos. Esse objeto será acessado pelo restante da aplicação para receber 
	//e enviar objetos pedidos ao banco de dados.
	$repositorio = new RepositorioPedidos();
	
?>

