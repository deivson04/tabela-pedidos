<?php
require '../model/loginModel.php';

$login = new Login(null, $_REQUEST['email'], $_REQUEST['senha']);

$retornoLogin = $repositorio->buscarLogin($login);

if($retornoLogin->getEmail() == $login->getEmail() && $retornoLogin->getSenha() == $login->getSenha()) {
    session_start();
    $_SESSION["id"] = $retornoLogin->getId();
    $_SESSION["email"] = $retornoLogin->getEmail();
    $_SESSION["senha"] = $retornoLogin->getSenha();
    header('Location: ../index.php');
}
die("não pode logar");