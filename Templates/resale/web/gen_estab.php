                     <!--VER VÍDEO DO DESCHAMPS SOBRE OS &&s NO IF-->


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<h4>---Página para gerar estabelecimento no sistema</h4>
    <p>---Tá assim só por enquanto os testes rolam</p>
 

<center><form action="gen_estab.php" method="POST" enctype="multipart/form-data">
	

<input type="text" name="name" placeholder="Nome do Estabelecimento" required>
<input type="text" name="descricao" placeholder="Descrição" required><br>






<label>Imagem: </label><input type="file" required name="imagem" ><br><br> 



<button type="submit" name="button" required>Enviar</button>


</form></center>



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
    window.location.href= 'gen_estab.php'
    </script>
    ";

    }else{                            


    if(isset($_FILES['imagem'])){            
 
        $extensao = substr($_FILES['imagem']['name'], -4);   /*o arquivo recebe um novo nome 
                                                                    (enquanto a extensao do arquivo é mantida)  */
        $novo_nome = md5(time()) .$extensao;
        $diretorio = "imgs_estabs/"; // Define o diretório de destinado da imagem

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua upload para a pasta no servidor

        $sql = "INSERT INTO img_estab (arquivo, estab) VALUES ('$novo_nome', '$nome')";   /* Configurar coluna estab em img_estab e configurar 
                                                                          $sql para inserir nesta coluna*/
         if(mysqli_query($conexao, $sql)){

echo "<script>
    alert('Estabelecimento cadastrado com sucesso!')
    window.location.href= 'gen_estab.php'
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
