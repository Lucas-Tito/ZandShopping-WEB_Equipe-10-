<?php
$con;
function setConexao($servidor, $usuario, $senha,$database){
	global $con;
	$con = new mysqli($servidor,$usuario, $senha, $database);
	if(mysqli_connect_errno()){
		echo "Erro na conexão: " .mysqli_connect_error();
		echo "<br>";
	}
}

function consultarSQL($sql){//select
	global $con;
	$resultado = $con->query($sql);
	$linhas = array();
	while($dados = $resultado->fetch_array()){
		$linhas[] = $dados;
	}
	return $linhas;
}

function executarSQL($sql){//update, delete ou insert
	global $con;
	$resultado = $con->query($sql);
	return $resultado;
}
?>






