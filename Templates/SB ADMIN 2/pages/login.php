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

</head>













                          
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       


                                <!--Formulário-->
 

                        <form role="form" action="login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    

                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required autofocus>
                                </div>
                                <div class="form-group">
                                    

                                    <input class="form-control" placeholder="Password" name="senhaLogin" type="password" required value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                
                               


                                <button href="index.html" class="btn btn-lg btn-success btn-block"> Login</button>
    

                                      <!--Links-->

<br>
                        <a href="cadastro.php" style="float: left; font-size: 18px; font-family:helvetica, serif;text-decoration:none; color:gray;">Register</a>
    
                        <a href="ESenha.php" style="float: right; font-size: 18px; font-family:helvetica, serif;text-decoration:none; color:gray;">Forgot Password</a>
                              
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













                            <!--Validação do Usuário-->

       <?php   

  
    if(isset($_POST['email']))
   {
      session_start();
$_SESSION['email'] = $_POST['email'];


$email = $_SESSION['email'];
$senhaLogin = $_POST['senhaLogin'];


 include ('conexao.php');
mysqli_select_db($conexao, "zshopping") or die ("Erro ao selecionar o Banco");

$sql = "SELECT * FROM tb_login WHERE email ='$email' AND senha ='$senhaLogin'";
$queryLogin = mysqli_query($conexao, $sql) or die ("Erro na consulta sql");

$retorno = mysqli_num_rows($queryLogin);
if($retorno == 0){

echo "<script>
alert('Usuário ou senha inválidos')
window.location.href= 'login.php'
</script>
";

}
    
    else{

  // echo  "<script>alert('Teste: ok');</script>";

 header('location:index.html');

    }  
    
      }




   ?>




















</body>

</html>
