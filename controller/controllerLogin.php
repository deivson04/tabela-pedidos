<?php

require '../model/loginModel.php';
require 'classeLogin.php';

$login = new Login();

$login->setEmail($_POST["email"]);
$login->setSenha($_POST["senha"]);

$loginModel = new LoginModel();
$retornoLogin = $loginModel->buscarLogin($login);
if($retornoLogin->getEmail() == $login->getEmail() && $retornoLogin->getSenha() == $login->getSenha()) {
    session_start();
    $_SESSION["id"] = $retornoLogin->getId();
    $_SESSION["email"] = $retornoLogin->getEmail();
    $_SESSION["senha"] = $retornoLogin->getSenha();
    header('Location: ../index.php');
}
die("não pode logar");