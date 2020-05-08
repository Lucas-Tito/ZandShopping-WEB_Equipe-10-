<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lorem ipsum</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
                                  
                                  <!--Links do Template img-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">



</head>
<body>

	
                                  <!--IMG TEMPLATE-->
<!-- partial:index.partial.html -->
<div class="container">
    
    <h1 style="margin-right: 22px">Cadastro de Estabelecimento!
        <small>cadastra mesmo :0</small>
    </h1>
  
    <div class="avatar-upload">
        <div class="avatar-edit">
            <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" required name="imagem" />  
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(default.png);">
            </div>
        </div>
    </div>



</div>





 

                            <!--FORM TEMPLATE-->



			
			

				<div class="wrap-input1 validate-input">
				<center>	<input class="input1" type="text" name="name" placeholder="Nome do Estabelecimento" required style="width: 390px !important;">
				</center>
				</div>

				

				

				<div class="wrap-input1 validate-input">
				<center>
					<textarea class="input1" name="descricao" placeholder="Descrição" required style="width: 390px !important;"></textarea>
				</center>
				</div>

				<div class="container-contact1-form-btn">
					<button type="submit" name="button" class="contact1-form-btn">
						<span>
							Enviar
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				
				</div>
			</form>
		




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>









                       
<?php

if (isset($_POST['button'])) {                         
  
    include_once 'conexao.php';
    mysqli_select_db($conexao,"zshopping") or die ("Erro ao selecionar o Banco");
    


$nome = $_POST['name'];   
$descricao = $_POST['descricao'];


                                /*COMANDO DA IMAGEM*/


    $sqlEstab = "SELECT * FROM estabelecimento WHERE nome ='$nome'";
    $queryEstab = mysqli_query($conexao, $sqlEstab) or die ("Erro na consulta sql do Nome do Estabelecimento");
    $retornoEstab = mysqli_num_rows($queryEstab);   
    
    
    if ($retornoEstab != 0) {   
    
    echo "<script>
    alert('Nome de Estabelecimento já cadastrado!')
    window.location.href= 'index.php'
    </script>
    ";

    }else{                            


    if(isset($_FILES['imagem'])){            
 
        $extensao = substr($_FILES['imagem']['name'], -4);   /*o arquivo recebe um novo nome 
                                                                    (enquanto a extensao do arquivo é mantida)  */
        $novo_nome = md5(time()) .$extensao;
        $diretorio = $_SERVER['DOCUMENT_ROOT']."/Templates/resale/web/imgs_estabs/"; // Define o diretório de destino da imagem

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua upload para a pasta no servidor

        $sql = "INSERT INTO img_estab (arquivo, estab) VALUES ('$novo_nome', '$nome')";   /* Configurar coluna estab em img_estab e configurar 
                                                                          $sql para inserir nesta coluna*/
         if(mysqli_query($conexao, $sql)){

echo "<script>
    alert('Estabelecimento cadastrado com sucesso!')
    window.location.href= 'index.php'
    </script>
    ";

    }else{  //Informa o erro
        echo "<h3>Erro na inserção de imagem: </h3>".mysqli_error($conexao);
    }
      
    }
    
                           /*COMANDO STRINGS*/


    $sqlInserir = "INSERT INTO estabelecimento(nome, descricao)
                   VALUES('$nome', '$descricao')";


    if(mysqli_query($conexao, $sqlInserir)){


    }else{  
        echo "<h3>Erro na inserção: </h3>".mysqli_error($conexao);
    }
    


  mysqli_close($conexao);






}



}
    


    ?>
