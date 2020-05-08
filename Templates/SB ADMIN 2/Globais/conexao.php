<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "zshopping";
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_errno($conexao)){
	echo "Erro na conexão com o banco";
	mysqli_connect_error();
}else{
	
} ?>

<!DOCTYPE html>
<html>
<head>
	<title>Banco Pessoa</title>
<meta charset="utf-8">

</head>

<body bgcolor="gray">

</body>
</html>