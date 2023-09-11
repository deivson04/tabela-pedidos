<?php
require '../model/loginModel.php';

$login = new Login(null,null, $_REQUEST['email'], $_REQUEST['senha']);
//echo "<pre>";
//var_dump($login);
//die;    
$retornoLogin = $repositorio->buscarLogin($login);
//echo "<pre>";
//var_dump($retornoLogin);
//die;    
if($retornoLogin->getEmail() == $login->getEmail() && $retornoLogin->getSenha() == $login->getSenha()) {
    session_start();
    $_SESSION["id"] = $retornoLogin->getId();
    $_SESSION["nome"] = $retornoLogin->getNome();
    $_SESSION["email"] = $retornoLogin->getEmail();
    $_SESSION["senha"] = $retornoLogin->getSenha();
    header('Location: ../index.php');
}
die(" Verifique se seu email ou senha está correto");