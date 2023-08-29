<?php
    
    //Interface de repositorio para login. 
	interface ILoginModel{
		public function cadastrarLogin($login);
		public function buscarLogin($login);
		
	}
?>


