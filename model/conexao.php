<?php
/** 
* Esta é a classe ConexaoRepository, ela tem o objetivo de criar a connexão com o banco de dados.
* 
* @author Sergio Severino da Silva <elderseriogio.net@hotmail.com> 
* @version 0.1 
*/
class Conexao {

    /*private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "tabelapedidos";*/


	private $host = "localhost";
    private $user = "u577415805_deivson01";
    private $password = "Ma=!4[@;zJP1";
    private $database = "u577415805_tabelapedidos";

    public function abrirConexao() {
        try {
            return new PDO('mysql:dbname=' . $this->database . ';host=' . $this->host . ';charset=UTF8', $this->user, $this->password);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

}