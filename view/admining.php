<?php
include "../model/ingredienteOP.class.php";
$ingredienteop = new IngredienteOP();
$objing = $ingredienteop->getAll();
$linhas = sizeof($objing);

?>


     <div class="row caixabranca">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ingredientes</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                </tr>
                <?php
                for ($i=0; $i < $linhas ; $i++) { 
                ?>
                <tr>
                  <td><?=$objing[$i]['idingrediente']?></td>
                  <td><?=$objing[$i]['nomeingrediente']?><input type="hidden" id="nome" value="<?=$objing[$i]['nomeingrediente']?>" /></td>
                  <td id="<?=$objing[$i]['nomeingrediente']?>" name="<?=$objing[$i]['idingrediente']?>"><button class="btn btn-default" id="editaring"><i class="icon-pencil"></i>Editar</button><button class="btn btn-default" id="deletaring"><i class="icon-cancel"></i>Deletar</button></td>
                </tr>
                <?php
                }
                ?>
                <td><button class="btn btn-default" id="ingadd"><i class="icon-plus"></i>Adicionar</button></td>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<script>
         $('.table').on("click","#deletaring",function(e) {
        e.preventDefault();

         var confirma=confirm('Tem certeza que deseja excluir o ingrediente '+$(this).parent('td').attr('id')+'?');
        if (confirma==true) {

        var deletar = $(this).parent('td').attr('name');
   
        $.post("../controller/ingrediente.php",
      {
          deletar: deletar
      }).done(function() {

      $("#retorno").load("admining.php")
      });
      }

      });

        $('.table').on("click","#editaring",function(e) {
      e.preventDefault();
     
      var editar = $(this).parent('td').attr('name');
      $.post("edita_ingrediente.php",
    {
        editar: editar

    }).done(function(data) {

    $("#retorno").html(data)
    });

    });

      $('.table').on("click","#ingadd",function(e) {
      e.preventDefault();
     
      $("#retorno").load("add_ingrediente.php")

    });
    </script>
