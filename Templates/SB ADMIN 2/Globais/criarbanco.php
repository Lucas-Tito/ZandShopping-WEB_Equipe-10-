<?php
include_once 'conexao.php';

/*$sql_criaBanco = "CREATE DATABASE Pessoa";
mysqli_query($conexao, $sql_criaBanco) or die("Erro na consulta".mysqli_connect_error()); */
 
 						//COMENTÁRIO
 //Cria o Banco de Dados (está comentado pois após criado, não poderá ser executado novamente, já que o banco só vai ser criado uma vez [quando dá erro o código para, não executando o restante das linhas por culpa do "or die" no msqli_query])

mysqli_select_db($conexao, "Pessoa") or die("Erro na hora de selecionar o Banco".mysqli_connect_error());

//mysqli_select_db é a função que seleciona o Banco de Dados

 /*$sql_criaTabela = "CREATE TABLE tb_Pessoa(
id  INT (10) PRIMARY KEY AUTO_INCREMENT,
Nome  VARCHAR(15),
Sobrenome VARCHAR(15),
Idade INT(3)
)";

// $sql_criaTabela é a variável que armazena o código sql

mysqli_query($conexao, $sql_criaTabela) or die ("Erro na consulta".mysqli_connect_error());*/

//mysqli_query é a função que executa as linhas de código sql

						//COMENTÁRIO
//Cria a Tabela (tá comentado por conta do mesmo esquema do primeiro comentário)

$sql ="INSERT INTO tb_Pessoa(id, Nome, Sobrenome, Idade) VALUES('1', 'Patrício', 'Vazaria', '12')";


mysqli_query($conexao,$sql) or die("Erro na hora de inserir dados na tabela".mysqli_connect_error());

						//COMENTÁRIO
//Insere dados na tabela (sujeito a ficar comentado) 
//(ficar comentado é transforma linhas doos códigos em comentários, para que assim eles não sejam executados) 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Banco Pessoa</title>
</head>
<body bgcolor="gray">

<a href="front.php">Voltar ao Menu</a>
</body>
</html>