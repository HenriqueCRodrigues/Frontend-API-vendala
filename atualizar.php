<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
var_dump($medico);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Atualizar Médico</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">GCB Medicine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Cadastrar Médico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Quem somos</a>
            </li>
          </ul>
          
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container" style="margin-top: 5rem!important;">
    	 <form action='/MedicoController/update/<?= $medico->id?>' method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputName">Nome</label>
      <input type="text" class="form-control" name="name" id="inputName" placeholder="Nome" value="<?= $medico ? $medico->name : '' ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCRM">CRM</label>
      <input type="text" class="form-control" name="crm" id="inputCRM" placeholder="CRM" value="<?= $medico ? $medico->crm : '' ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" name="email" id="inputEmail4" placeholder="exemplo@exemplo.com" value="<?= $medico ? $medico->email : '' ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEspecialidade">Especialidade</label>
      <input type="text" class="form-control" name="especialidade" id="inputEspecialidade" placeholder="Clinico Geral" value="<?= $medico ? $medico->especialidade : '' ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone">Telefone</label>
    <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="(XX) XXXXX-XXXX" value="<?= $medico ? $medico->phone : '' ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <select id="inputCity" name="city" class="form-control">
        <option value="" selected>Escolha uma Cidade</option>
        <?php foreach($cities as $city): 
                $selected = '';
                if($medico->city_id == $city->id)
                {
                  $selected = 'selected';
                }
                echo "<option value='$city->id' $selected >$city->name</option>";
              endforeach;
        ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Estado</label>
      <select id="inputState" name="state" class="form-control">
        <option value="" selected>Escolha um estado</option>
        <?php foreach($states as $state): 
                $selected = '';
                if($medico->state_id == $state->id)
                {
                  $selected = 'selected';
                }
                echo "<option value='$state->id' $selected>$state->name</option>";
              endforeach;
        ?>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="cep" id="inputZip" value="<?= $medico ? $medico->cep : '' ?>">
    </div>
  </div>
  <div class="form-group" <?php echo $error ? 'style="color: red;"' : '';  ?>>
      <label class="form-label">
        **Todos os campos são obrigatórios! 
      </label>
  </div>
  <button type="submit" class="btn btn-primary">Atualizar Médico</button>
</form>
    </main>

    <footer class="footer"  style="margin-top: 5rem!important;">
      <div class="container">
        <span class="text-muted">Desenvolvido por Henrique Rodrigues</span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  
<script>
    $(function(){
        $( "#inputState" ).click(function(event)
        {
            event.preventDefault();
            var state = $("#inputState").val();
            if (state != '') {
              $.ajax({
                url: '/CityController/getCityByStateIdAjax/'+state,
                type: 'GET',
                error: function() {
                    alert('Error');
                },
                success: function(data) {
                      if (data.length > 0) {
                        $("select[name='city']").empty();
                        html = "<option value='' selected>Escolha uma Cidade</option>"
                        JSON.parse(data).forEach(function (item, indice, array) {
                          html += "<option value='"+item.id+"'>"+item.name+"</option>"                              
                        });
                        $(html).appendTo("select[name='city']");

                      }  
                }
              });
            }
        });
    });
  </script>
  </body>

</html>

