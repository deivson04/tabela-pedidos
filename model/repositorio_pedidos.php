<?php
    require 'conexao.php';
	include $_SERVER["DOCUMENT_ROOT"] . '/tabela-pedidos/controller/pedido.php';
	
	//Classe de repositório de pedidos que implementa IRepositorioPedidos
	class RepositorioPedidos {
		
		//Objeto conexão que guardará a conexão com o banco
		private $conexao;
		
		//Construtor do repositório de pratos
		public function __construct()
		{			
			//Conecta ao banco de dados
			$this->conexao = (new Conexao())->abrirConexao();

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
			$login_id = $pedido->getLoginId();
			
			$sql = "INSERT INTO pedido (nomeDoCliente, 
										nomeDaLoja, 
										dataDoPedido, 
										bairroDaLoja, 
										descricaoDoPedido, 
										metodoDePagamento, 
										parcelamento, 
										login_id) 
										VALUES
										(:nomeDoCliente, 
										:nomeDaLoja, 
										:dataDoPedido, 
										:bairroDaLoja, 
										:descricaoDoPedido, 
										:metodoDePagamento, 
										:parcelamento, 
										:login_id)";
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindParam(":nomeDoCliente", $nomeDoCliente);
			$stmt->bindParam(":nomeDaLoja", $nomeDaLoja);
			$stmt->bindParam(":dataDoPedido", $dataDoPedido);
			$stmt->bindParam(":bairroDaLoja", $bairroDaLoja);
			$stmt->bindParam(":descricaoDoPedido", $descricaoDoPedido);
			$stmt->bindParam(":metodoDePagamento", $metodoDePagamento);
			$stmt->bindParam(":parcelamento", $parcelamento);
			$stmt->bindParam(":login_id", $login_id);
			$stmt->execute();
		}
		
		//Remove um pedido do banco de dados
		public function removerPedido($codigo)
		{
			$sql = "DELETE FROM pedido WHERE codigo = :codigo";
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindParam(":codigo", $codigo);
			$stmt->execute();
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
			
			$sql = "UPDATE pedido 
						SET nomeDoCliente = :nomeDoCliente, 
							nomeDaLoja = :nomeDaLoja, 
							dataDoPedido = :dataDoPedido, 
							bairroDaLoja = :bairroDaLoja, 
							descricaoDoPedido = :descricaoDoPedido, 
							metodoDePagamento = :metodoDePagamento, 
							parcelamento =:parcelamento
					WHERE codigo = :codigo";
			 
			 $stmt = $this->conexao->prepare($sql);
			 $stmt->bindParam(":codigo", $codigo);
			 $stmt->bindParam(":nomeDoCliente", $nomeDoCliente);
			 $stmt->bindParam(":nomeDaLoja", $nomeDaLoja);
			 $stmt->bindParam(":dataDoPedido", $dataDoPedido);
			 $stmt->bindParam(":bairroDaLoja", $bairroDaLoja);
			 $stmt->bindParam(":descricaoDoPedido", $descricaoDoPedido);
			 $stmt->bindParam(":metodoDePagamento", $metodoDePagamento);
			 $stmt->bindParam(":parcelamento", $parcelamento);
			 $stmt->execute();
		   
		}
		
		//Busca um novo pedido a partir de seu código. 
		//Observe que um novo objeto pedido é criado baseado com o que é retornado do banco.
		public function buscarPedido($codigo)
		{
			//Obtem o primeiro registro do select abaixo
			$sql = "SELECT 
						* 
					FROM pedido 
					WHERE codigo = :codigo";
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindParam(":codigo", $codigo);
			$stmt->execute();
			$linha = $stmt->fetch(PDO::FETCH_ASSOC);
			 //Cria um novo objeto pedido baseado na busca acima
			$pedido = new Pedido();
			$pedido->setCodigo($linha['codigo']);
			$pedido->setNomeDoCliente($linha['nomeDoCliente']);
			$pedido->setNomeDaLoja($linha['nomeDaLoja']);
			$pedido->setDataDoPedido($linha['dataDoPedido']);
			$pedido->setBairroDaLoja($linha['bairroDaLoja']);
			$pedido->setDescricaoDoPedido($linha['descricaoDoPedido']);
			$pedido->setMetodoDePagamento($linha['metodoDePagamento']);
			$pedido->setParcelamento($linha['parcelamento']);
			$pedido->setLoginId($linha['login_id']);
			 return $pedido;
		}
		
		public function getListaPedido($id_usuario)
		{
			$sql = "SELECT 
						login.id as login_id, 
						login.email, 
						pedido.codigo,
						pedido.nomeDoCliente, 
						pedido.nomeDaLoja, 
						pedido.dataDoPedido, 
						pedido.bairroDaLoja, 
						pedido.descricaoDoPedido, 
						pedido.metodoDePagamento, 
						pedido.parcelamento 
	 				FROM login INNER JOIN pedido 
	 					ON login.id = pedido.login_id
					WHERE pedido.login_id = :id_usuario";
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindParam(":id_usuario", $id_usuario);
			$stmt->execute();		
			//Obtem a lista de todos os pedidos cadastrados
			$listagem = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$arrayPedidos = [];
			//Varre a lista de entradas da tabela pedidos e cria um novo objeto pedido para cada entrada da tabela
			if ($listagem) {  
				 
				foreach($listagem as $linha) {
					$pedido = new Pedido();
					$pedido->setCodigo($linha['codigo']);
					$pedido->setNomeDoCliente($linha['nomeDoCliente']);
					$pedido->setNomeDaLoja($linha['nomeDaLoja']);
					$pedido->setDataDoPedido($linha['dataDoPedido']);
					$pedido->setBairroDaLoja($linha['bairroDaLoja']);
					$pedido->setDescricaoDoPedido($linha['descricaoDoPedido']);
					$pedido->setMetodoDePagamento($linha['metodoDePagamento']);
					$pedido->setParcelamento($linha['parcelamento']);
					$pedido->setLoginId($linha['login_id']);
					$arrayPedidos[] = $pedido;
				}
			} 
			return $arrayPedidos;

		}
	} 

	//Cria o objeto repositório de pedidos. Esse objeto será acessado pelo restante da aplicação para receber 
	//e enviar objetos pedidos ao banco de dados.
	$repositorio = new RepositorioPedidos();
	
?>

