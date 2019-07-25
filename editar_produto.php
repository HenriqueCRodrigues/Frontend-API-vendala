<?php
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  $id = $_GET['id'];
  if (!isset($_COOKIE['token']) && $_COOKIE['token'] !== 'undefined') {
    header('Location:login.php');
  }

  if ($id != true)
  {
    header('Location:index.php');
  }
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Atualizar Producto</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Venda.la</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Atualizar Produto</a>
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
      <form id="formulario" action="" enctype="multipart/form-data">
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputName">Nome</label>
          <input type="text" class="form-control" name="name" id="inputName" placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPrice">Preço</label>
          <input type="text" class="form-control" name="price" id="inputPrice" placeholder="22.88">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md">
          <label for="inputCategory">Categoria</label>
          <select id="inputCategory" name="category" class="form-control">
            <option value="" selected>Escolha uma Categoria</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputDescription">Descrição</label>
        <textarea rows="6" type="text" class="form-control " name="description" id="inputDescription" placeholder="Produto bacana"></textarea>
      </div>
      <div class="form-group" id="imageDiv">
        <label for="inputImages">Imagens</label>
        <input type="file" class="form-control " name="images" id="inputImages[]" placeholder="Imagens[]" onchange="readURL(this);" multiple>
      </div>
      
      <div id="preload">
      </div>
      <input type="submit" id="but_upload" class="btn btn-primary" value="Atualizar Produto">
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<script>
    var app_url = 'http://localhost:8000/api/'
    var app_url_storage = 'http://localhost:8000/storage/'
    let token = '<?= $_COOKIE['token'];?>';
    var imagesArray = [];
    var inputImages = [];
    var category = '';
    $(document).ready( function (e) {
      $.ajax({
          url: 'https://api.mercadolibre.com/categories/MLB114675',
          type: 'GET',
          dataType: 'jsonp',
          error: function() {
              alert('Error');
          },
          success: function(data) {
            $("select[name='category']").empty();
            html = "<option value=''>Escolha uma Categoria</option>"
            data[2].children_categories.forEach(function (item, indice, array) {
              let selected = ''
              if (category == item.name) selected = 'selected'
              html += "<option value='"+item.name+"' "+selected+">"+item.name+"</option>"                              
            });
            $(html).appendTo("select[name='category']");
          }
        });

        $.ajax({
            url: app_url+'products/'+<?= $id;?>,
            type: 'GET',
            headers: {'Authorization': 'Bearer '+token}, 
            mode: "cors",
            success: function(data) {
              $('#inputName').val(data.data.name);
              $('#inputPrice').val(data.data.price)
              $('#inputDescription').val(data.data.description)
              category = data.data.category
              inputImages = data.data.images
              if (data.data.isKit)
              {
                $('#inputName').attr('disabled', 'disabled');
              }
              for(i=0;i < inputImages.length; i++)
              {
                preRenderImages(inputImages[i], i)
              }
            }
        })
        

        function preRenderImages(inputImages, i)
        {
          fetch(app_url_storage+inputImages, {
            mode: "cors"
          })
          .then(response => {
            const statusCode = response.status;
            const data = response.blob();
            return Promise.all([statusCode, data]);
          })
          .then(res => {
            var reader = new FileReader();
            reader.onload = (function(i){
                return function(e){
                  $('#preload').append('<div id="'+i+'" style="display:inline-block;margin-right:3em;margin-bottom:3em;"><button type="button" class="close" aria-label="Close" onclick="removeImage('+i+')"><span aria-hidden="true">&times;</span></button><img src="'+e.target.result+'" width="200px" height="200px"/></div>');
                };
            })(i);   
            let data = res[1];
            let metadata = {
              type: data.type
            };
            let file = new File([data], i+data.type.replace('image/', ''), metadata);
            imagesArray.push(file);
            reader.readAsDataURL(file);
          });
        }

        $("#formulario").on('submit',(function(g) {
        g.preventDefault();
        let name = $('#inputName').val()
        let price = $('#inputPrice').val()
        let description = $('#inputDescription').val()
        let category = $('#inputCategory').val()
        let images = imagesArray
        let data = new FormData();

        
        let aux = 0
        imagesArray.forEach(function(file){
          data.append('images['+aux+']',file,file.name)
          aux++;
        });
        data.append('name', name);
        data.append('price', price);
        data.append('description', description);
        data.append('category', category);
        let token = '<?= $_COOKIE['token'];?>';
        
        if (name != '' && price != '' && description != '' && category != '' && aux != 0)
        {
          fetch(app_url+'products/'+<?= $id; ?>+'/update',  {
              method: 'POST',
              headers: new Headers({'Authorization': 'Bearer '+token}), 
              mode: "cors",
              body: data
          })
          .then(response => {
              const statusCode = response.status;
              const data = response.json();
              return Promise.all([statusCode, data]);
          }).then(res => {
            console.log(res)
              if (res[0] === 200) {
                swal("Sucesso", "Produto atualizado com sucesso!", "success").then((value) => {
                  window.location.href = 'index.php';
                });
              } else if (res[0] == 401) {
                swal("Ops", "Você deve estar logado para realizar a ação!", "warning");
              } else {
                swal("Erro", "Erro inesperado", "error");
              }
          }); 
        } else 
        {
          swal("Erro", "Todos os campos são obrigatorios!", "error");
        }

      }));

    });

    function preLoad(input)
    {
      preload = $('#preload')
      let images = document.querySelector('input[type="file"]');
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#preload').attr('src', e.target.result);
      }
    }

    function readURL(input) {
      imagesArray = [];
      if (input.files) {
        for(i=0; i < input.files.length; i++) {
          var reader = new FileReader();
          reader.onload = (function(i){
              return function(e){
                $('#preload').append('<div id="'+i+'" style="display:inline-block;margin-right:3em;margin-bottom:3em;"><button type="button" class="close" aria-label="Close" onclick="removeImage('+i+')"><span aria-hidden="true">&times;</span></button><img src="'+e.target.result+'" width="200px" height="200px"/></div>');
              };
          })(i);   
          imagesArray.push(input.files[i]);
          reader.readAsDataURL(input.files[i]);
        }
      }
      document.getElementById('imageDiv').innerHTML = document.getElementById('imageDiv').innerHTML;
    }

    function removeImage(index)
    {
      $('#'+index).remove()
      delete imagesArray[index]
    }
  </script>
  </body>
</html>

