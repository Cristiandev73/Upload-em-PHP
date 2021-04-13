<html>
 <link rel="stylesheet" href="css.css">
<body>

<?php 
if (isset($_POST['enviar'])): 
 $formatosPermitidos = array("png" ,"jpg" ,"jpeg" );
 $quantidadeArquivos = count($_FILES['arquivo'] ['name']);  
$contador = 0;
 while ($contador < $quantidadeArquivos):
 

 $extensao = pathinfo($_FILES['arquivo'] ['name'] [$contador], PATHINFO_EXTENSION);

            if (in_array($extensao, $formatosPermitidos)): 
                $pasta = "arquivo/";
                $temporario = $_FILES['arquivo'] ['tmp_name'] [$contador];
                $novoNome = uniqid().".$extensao";

                      if (move_uploaded_file($temporario, $pasta.$novoNome)) :  

                           echo      "<h1>Upload feito!</h1>" ;
                 
                        else:
                              echo "<h1>Erro ao enviar</h1> $temporario";
             endif ;
                
                        else:
        
            echo"$extensao <h1> nao é permitida</h1> <br> ";
      endif;

      $contador++;
      endwhile;
endif; 


?>





<img src="basc.png" style="
top:16px;
    position: fixed;
    left: 31%;" >      
 <div class="textobase"> Aqui seu arquivo sera visto e revisado! <br> <f style="font-size: 16px;">Formatos perrmitidos: JPG, JPEG,PNG </f>

 </div>
<div class="botoes">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  enctype="multipart/form-data">
<input type="file" name="arquivo[]" multiple><br><BR>

<input type="submit" name="enviar">   
</form>
</div>

</body> 

</html>