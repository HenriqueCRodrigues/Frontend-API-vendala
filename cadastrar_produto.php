<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Cadastrar Producto</title>

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
              <a class="nav-link" href="#">Cadastrar Produto</a>
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

      <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">Clique aqui para montar um KIT</a>

      <div class="form-group" id="imageDiv" style="margin-top:1em;">
        <label for="inputImages">Imagens</label>
        <input type="file" class="form-control " name="images" id="inputImages[]" placeholder="Imagens[]" onchange="readURL(this);" multiple>
      </div>
      
      <div id="preload">
      </div>
      <input type="submit" id="but_upload" class="btn btn-primary" value="Cadastrar Produto">
      </form>
    </main>

    <footer class="footer"  style="margin-top: 5rem!important;">
      <div class="container">
        <span class="text-muted">Desenvolvido por Henrique Rodrigues</span>
      </div>
    </footer>

    <div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Selecione os produto para o kit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <table id="tableKit">
            <tr>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="kit">
                  <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="kit">
                  <label class="form-check-label" for="defaultCheck1">
                    Other checkbox
                  </label>
                </div>
              </td>
            </tr>
          </table>
          <nav aria-label="Page navigation example" style="margin-top:2em;">
            <ul class="pagination justify-content-left" id="paginate">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
          </div>
        </div>
      </div>
    </div>

    
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
    var imagesArray = [];
    var token = '<?= $_COOKIE['token'];?>';
    var length = 10
    var start  = 0
    var draw   = 1
    var actualPage = 1
    var kit = []
    var arraysKits = [];
    var imagesKits = []
    $(document).ready( function (e) {
      $(function() {
        $("#page-selection .pagination.bootpag li a")
          .attr('data-toggle', 'modal')
          .attr('data-target', '#myModal');
      });

      
        $.ajax({
                url: app_url+'products/all',
                type: 'POST',
                dataType: 'json',
                headers: {'Authorization': 'Bearer '+token}, 
                data: ({length: length, start: start, draw: draw, order: {0: {column: 0, dir: 'asc'}}}),
                error: function() {
                    alert('Error');
                },
                success: function(data) {
                  let table = $('#tableKit > tbody:last-child')
                  let paginate = $('#paginate')
                  table.empty()
                  paginate.empty()
                  arraysKits = data.data
                  data.data.forEach(function (item, indice, array) {
                    table.append('<tr><td><div class="form-check"><input onchange="changeCheckbox(this)" class="form-check-input" type="checkbox" value="'+item.id+'" id="defaultCheck'+item.id+'" name="kit"><label class="form-check-label" for="defaultCheck'+item.id+'">'+item.name+'</label></div></td></tr>')
                    //html += "<option value='"+item.name+"'>"+item.name+"</option>"                              
                  });
                  draw = data.draw
                  
                  let page = parseInt(data.recordsTotal/length)
                  paginate.append('<li id="prev" class="page-item disabled"><a onclick="paginateModal('+(actualPage-1)+')" class="page-link" href="#" tabindex="-1">Previous</a></li>');
                  for(j=0; j < page; j++)
                  {
                    let active = (j+1) == 1 ? 'active' : '';
                    paginate.append('<li class="page-item '+active+'"><a onclick="paginateModal('+(j+1)+')" class="page-link" href="#">'+(j+1)+'</a>')
                  }
                  let disabled = ''
                  if (page == 0){
                    paginate.append('<li class="page-item active"><a onclick="paginateModal(1)" class="page-link" href="#">1</a>')
                    disabled = 'disabled'
                  }
                  paginate.append('<li class="page-item '+disabled+'"><a onclick="paginateModal('+(j)+')" class="page-link" href="#">Next</a></li>');
                }
              });
        //$( "#inputState" ).click(function(event)
        //{
            //event.preventDefault();
            //var state = $("#inputState").val();
            //if (state != '') {
              $.ajax({
                url: 'https://api.mercadolibre.com/categories/MLB114675',
                type: 'GET',
                dataType: 'jsonp',
                error: function() {
                    alert('Error');
                },
                success: function(data) {
                  $("select[name='category']").empty();
                  html = "<option value='' selected>Escolha uma Categoria</option>"
                  data[2].children_categories.forEach(function (item, indice, array) {
                    html += "<option value='"+item.name+"'>"+item.name+"</option>"                              
                  });
                  $(html).appendTo("select[name='category']");
                }
              });
            //}
        //});

        $("#formulario").on('submit',(function(g) {
          var favorite = [];
            $.each($("input[name='kit']:checked"), function(){            
                favorite.push($(this).val());
            });
        console.log(favorite)
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
        data.append('kit', kit);
        let token = '<?= $_COOKIE['token'];?>';
        
        let object = Object.keys(imagesKits)
        for(i=0; i < object.length; i++)
        {
          data.append('images['+aux+']',imagesKits[object[i]],imagesKits[object[i]].name)
          aux++;
        }
        if ((name != '' || kit.length > 0) && price != '' && description != '' && category != '' && aux != 0)
        {
          fetch(app_url+'products/insert',  {
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
              if (res[0] === 201) {
                swal("Sucesso", "Produto cadastrado com sucesso!", "success").then((value) => {
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
    
      reader.readAsDataURL(preload.files);
 
    }

    function readURL(input) {
      imagesArray = []
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

    function removeImageKit(index)
    {
      $('#'+index).remove()
      delete imagesKits[index]
    }

    function paginateModal(page)
    {
      page -= 1;
      $.ajax({
        url: app_url+'products/all',
        type: 'POST',
        dataType: 'json',
        headers: {'Authorization': 'Bearer '+token}, 
        data: ({length: length, start: page, draw: draw+1, order: {0: {column: 0, dir: 'asc'}}}),
        error: function() {
            alert('Error');
        },
        success: function(data) {
          let table = $('#tableKit > tbody:last-child')
          let paginate = $('#paginate')
          table.empty()
          paginate.empty()
          data.data.forEach(function (item, indice, array) {
            table.append('<tr><td><div class="form-check"><input onchange="changeCheckbox(this)" class="form-check-input" type="checkbox" value="'+item.id+'" id="defaultCheck'+item.id+'" name="kit"><label class="form-check-label" for="defaultCheck'+item.id+'">'+item.name+'</label></div></td></tr>')
          });
          draw = data.draw
          page += 1;
          let disable = page == 1 ? 'disabled' : '';
          paginate.append('<li id="prev" class="page-item '+disable+'"><a onclick="paginateModal('+(page-1)+')" class="page-link" href="#" tabindex="-1">Previous</a></li>');
          for(j=0; j < parseInt(data.recordsTotal/length); j++)
          {
            let active = (j+1) == page ? 'active' : '';
            paginate.append('<li class="page-item '+active+'"><a onclick="paginateModal('+(j+1)+')" class="page-link" href="#">'+(j+1)+'</a>')
          }
          disable = page == parseInt(data.recordsTotal/length) ? 'disabled' : '';
          if (page == 1 && parseInt(data.recordsTotal/length) == 0){
            paginate.append('<li class="page-item active"><a onclick="paginateModal(1)" class="page-link" href="#">1</a>')
            disable = 'disabled'
          }

          paginate.append('<li class="page-item '+disable+'"><a onclick="paginateModal('+(j)+')" class="page-link" href="#">Next</a></li>');
        }
      });
    }

    function changeCheckbox(e)
    {
      let index = Object.keys(arraysKits).find(key => arraysKits[key]['id'] == e.value)
      let input = parseFloat($('#inputPrice').val())
      let array = parseFloat(arraysKits[index]['price'])
      let images = JSON.parse(arraysKits[index].images)

      if (e.checked) {
        if (isNaN(input))
        {
          input = 0
        }

        for(i=0; i < images.length;i++)
        {
          preRenderImages(images[i], i+'_'+arraysKits[index]['id'])
        }

        $('#inputPrice').val(input+array)
        kit.push(e.value)
        $('#inputName').prop('disabled', e.checked)
      } else {
        let index = kit.indexOf(e.value)
        if (index > -1) {
          if (isNaN(input))
          {
            input = 0
          }

          for(i=0; i < images.length;i++)
          {
            removeImage(i+'_'+arraysKits[index]['id'])
          }
          $('#inputPrice').val(input-array)
          kit.splice(index, 1);
        }
      }

      if (kit.length == 0)
      {
        $('#inputName').prop('disabled', e.checked)
      }

    }

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
              $('#preload').append('<div id="'+i+'" style="display:inline-block;margin-right:3em;margin-bottom:3em;"><button type="button" class="close" aria-label="Close" onclick="removeImageKit(\''+i+'\')"><span aria-hidden="true">&times;</span></button><img src="'+e.target.result+'" width="200px" height="200px"/></div>');
            };
        })(i);   
        let data = res[1];
        let metadata = {
          type: data.type
        };
        let file = new File([data], i+'.'+data.type.replace('image/', ''), metadata);
        imagesKits[i] = file;
        reader.readAsDataURL(file);
      });
    }

  </script>
  </body>

</html>

