<?php


/* (só por enquanto) if(!isset($E_email)){
    header('Location:ESenha.php');
} else{*/
    $alt_email = $_GET['email'];
    include 'conexao.php';
    mysqli_select_db($conexao,"zshopping")or die("Erro ao selecionar");
    $sql = "SELECT * FROM tb_login WHERE Email='$alt_email'";
    $res = mysqli_query($conexao,$sql)or die('Erro na consulta SQL') ;

//}
?>




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
                Confirmação da senha-->
            <script>
function validarSenha(){
    alt_senhaa = document.f1.alt_senhaa.value
    confSenha = document.f1.confSenha.value
 
    if (alt_senhaa == confSenha){
        
    document.getElementById("altera").disabled = false;


  }if (alt_senhaa != confSenha){
        alert("SENHAS DIFERENTES");
    
    document.getElementById("altera").disabled = true;
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
                        <h3 class="panel-title">Recover your account</h3>
                    </div>
                    <div class="panel-body">
                       


                                <!--Formulário-->
 

                        <form role="form" action="alt_senha.php" method="POST" name="f1">
                          <?php
            while ($resultado = mysqli_fetch_array($res)) { 
        ?>
                            <fieldset>
                               

                                <div class="form-group">
                                    

                                    <input class="form-control" placeholder="New Password" name="alt_senhaa" type="password" required autofocus>
                                </div>
                               
                                 <div class="form-group">
                                    

                                    <input class="form-control" placeholder="Confirm Password" name="confSenha" type="password" required autofocus onchange="validarSenha()">
                                </div>


                                <button href="index.html" class="btn btn-lg btn-success btn-block" name="E_enviar">Recover</button>
                               <br> <input type="reset" name="limpar" value="Clean" class='form-control btn' style="color:gray;">
                                 
                                   
       <?php
            }
        ?>
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




           <!--Validação-->
<?php 

if(isset($_POST['alt_senhaa'])){
    

        session_start();
    $senhaa = $_POST['alt_senhaa'];
    $email = $_SESSION['E_email'];
    


    if (isset($senhaa)) { 
        include 'conexao.php';
        mysqli_select_db($conexao,"zshopping")or die("Erro ao selecionar");
        $sqlSenha = "UPDATE tb_login
                        SET senha = '$senhaa'
                        WHERE email = '$email'";

        mysqli_query($conexao, $sqlSenha);
        echo "<script>
        alert('senha alterada com sucesso!')
        window.location.href= 'login.php'
        </script>";

        
    
    }
     }
?>


















<a href="login.php ">Back</a>

</body>

</html>
