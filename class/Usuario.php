<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){

		$this->idusuario = $value;

	}
	public function getDeslogin(){
		return $this->idusuario;
	}

	public function setDeslogin($value){

		$this->idusuario = $value;

	}
	public function getDessenha(){
		return $this->idusuario;
	}

	public function setDessenha($value){

		$this->idusuario = $value;

	}
	public function getDtcadastro(){
		return $this->idusuario;
	}

	public function setDtcadastro($value){

		$this->idusuario = $value;

	}

	public function loadById($id){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID ", array(

			":ID"=>$id

		));

		if (count($results) > 0) {

			
			$this->setData($results[0]);

		}

	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");


	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(

			':SEARCH'=>"%".$login.%

		));


	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}

	public function login($login, $password){

		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(

			":LOGIN"=>$login,
			":PASSWORD"=>$password

		));

		if (count($results) > 0) {

			

			$this->setData($results[0]);

		 

	} else {

		throw new Exception("Login e/ou senha inválidos.");
	} 


}

public function setData($data){

	$this->setIdusuario($data['idusuario']);
	$this->setDeslogin($data['deslogin']);
	$this->setDessenha($data['dessenha']);
	$this->setDtcadastro(new DateTime($row['dtcadastro']));	


}

public function insert(){

	$sql = new Sql();
	$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(

	':login'=>$this->getDeslogin(),
	':PASSWORD'=>$this->getDessenha()


	));

	if (count($results) > 0 ) {
		$this->setData($results[0]);
	}
}

public function update($login, $password){

	$this->setDeslogin($login);
	$this->setDessenha($password);

	$sql = new Sql();

	$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(

		':LOGIN'=>$this->getDeslogin(),
		':PASSWORD'=>$this->getDessenha(),
		':ID'=>$this->getIdusuario()

	));


}


public function __construct($Login= "", $password = ""){

	$this->setDeslogin($login);
	$this->setDessenha($password);

}

}  


?>