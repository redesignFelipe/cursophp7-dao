<?php

require_once("config.php");


//Carrega um usuário
//$root = new Usuario();
//oot->loadbyId(3);
//echo $root;

/*$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

// Carrega uma lista de usuários

//$lista = Usuario::getList();

//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo login

//$search = Usuario::search("jo");

//echo json_encode($search);

// carrega um usuário usando o login e a senha

$usuario = new Usuario();
$usuario->login("root","garfao");  


echo $usuario;

?>