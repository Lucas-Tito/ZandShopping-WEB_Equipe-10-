<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content="">
<meta name="author" content="">    
    
    

    <title>Zand Shopping</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




<!--JavaScript para a
                Confirmação sa senha-->
            <script>
function validarSenha(){
    CadSenha = document.f1.CadSenha.value
    ConfSenha = document.f1.ConfSenha.value
 
    if (CadSenha == ConfSenha){
        
    document.getElementById("entrar").disabled = false;


  }if (CadSenha != ConfSenha){
        alert("SENHAS DIFERENTES");
    
    document.getElementById("entrar").disabled = true;
}
 }
</script>



</head>













                          
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create a new account</h3>
                    </div>
                    <div class="panel-body">
                       


                                <!--Formulário-->
 

                        <form role="form" action="cadastro.php" method="POST" name="f1">
                            <fieldset>
                                 <div class="form-group">
                                    

                                    <input class="form-control" placeholder="Name" name="CadNome" type="text" required autofocus>
                                </div>

                                <div class="form-group">
                                    

                                    <input class="form-control" placeholder="E-mail" name="CadEmail" type="email" required autofocus>
                                </div>
                                <div class="form-group">
                                    

                                    <input class="form-control" placeholder="Password" name="CadSenha" type="password" required value="">
                                </div>
                                                                
                               
                               <div class="form-group">
                                    

                                    <input class="form-control" placeholder="Confirm Password" name="ConfSenha" type="password" required value="" onchange="validarSenha()">
                                </div>


                                <button type="submit" name="enviar" class="btn btn-lg btn-success btn-block" id="entrar">Register</button>
                               <br> <input type="reset" name="limpar" value="Clean" class='form-control btn' style="color:gray;">
                                 
                                   
                              
                            </form>  <br>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>








                     <!--MODIFICAR DADOS PARA O BANCO DO PROJETO ATUAL (LEMBRAR DE SALVAR BANCO NO PENDRIVE)-->




                         
<?php

if (isset($_POST['enviar'])) {
                            
                          /*Recebe os campos do form e armazena nas variáveis*/
$nome = $_POST['CadNome'];   
$email = $_POST['CadEmail'];
$senhaCad = $_POST['CadSenha'];

    

    include ('conexao.php');  
    mysqli_select_db($conexao, "zshopping") or die ("Erro ao selecionar o Banco");

    $sqlUsu = "SELECT * FROM tb_login WHERE nome ='$nome'";
    $queryUsu = mysqli_query($conexao, $sqlUsu) or die ("Erro na consulta sql do Nome de Usuário");
    $retornoUsu = mysqli_num_rows($queryUsu);


    $sqlEmail = "SELECT * FROM tb_login WHERE email ='$email'";
    $queryEmail = mysqli_query($conexao, $sqlEmail) or die ("Erro na consulta sql do Email");
    $retornoEmail = mysqli_num_rows($queryEmail);
    
    
    if ($retornoUsu != 0) {   /*Verifica se o Nome de Usuário já está cadastrado*/
    
    echo "<script>
    alert('Nome de Usuário já cadastrado!')
    window.location.href= 'cadastro.php'
    </script>
    ";

    }

    if($retornoEmail != 0){   /*Verifica se o email já está cadastrado*/

    echo "<script>
    alert('Email já cadastrado!')
    window.location.href= 'cadastro.php'
    </script>
    ";





}else{                            /*Se não, os dados são inseridos no banco*/
    include_once 'conexao.php';
    mysqli_select_db($conexao,"zshopping");

//Rotina SQL para inserir no banco

    $sqlInserir = "INSERT INTO tb_login(nome, email, senha)
                   VALUES('$nome', '$email', '$senhaCad')";

//Verifica se a função de inserção foi executada sem erro 

    if(mysqli_query($conexao, $sqlInserir)){

            echo "<script>
        alert('Usuário cadastrado com sucesso!')
    //  window.location.href= '/conexao (com Bootstrap)/Login/login.php'
        </script>
        ";
        
    





    }else{  //Informa o erro
        echo "<h3>Erro na inserção: </h3>".mysqli_error($conexao);
    }
        mysqli_close($conexao);
    }



}

    ?>


















<a href="login.php ">Back</a>

</body>

</html>
