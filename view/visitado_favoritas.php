<?php

include "../model/ReceitaOP.class.php";
$receitaop= new ReceitaOP();
$idvisitado=$_GET['visitado'];
$receitas_visitado=$receitaop-> getVisitadoFavoritas($idvisitado);
$linhas=sizeof($receitas_visitado);

?>



<html>
<head>
</head>
<body>

 <!-- conteudo-receitas-->
 <h3>Receitas Favoritas de <?=$obj_visitado['nomeusuario']?></h3>

 <?php
                  for($i=0;$i<$linhas;$i++)
                  {
 ?>
        <div class="container caixabranca col-sm-3 margin-t5" id="retorno">
         <a href="receita.php?idreceita=<?=$receitas_visitado[$i]['idreceita']?>">
          <figure>
           <img src="../imgs/receitas/<?=$receitas_visitado[$i]['imgreceita']?>" class="img-responsive" alt="<?=$receitas_visitado[$i]['nomereceita']?>">
       </figure>
       <h3 class="thumbnail-title"><?=$receitas_visitado[$i]['nomereceita']?></h3>
   </a>
</div>


<?php 
           }
?>

</body>
</html>