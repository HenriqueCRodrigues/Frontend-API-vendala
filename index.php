<?php
if (!isset($_COOKIE['token']) && $_COOKIE['token'] !== 'undefined') {
  header('Location:login.php');
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

    <title>Venda.la</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!--link href="css/sticky-footer-navbar.css" rel="stylesheet"!-->
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
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastrar_produto.php">Cadastrar Produto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Quem somos</a>
            </li>
          </ul>
          
        </div>
    </header>

      </nav>
    <!-- Begin page content -->
    <main role="main" class="container-fluid" style="margin-top: 5rem!important;">
    	 <table id="table_id" class="">
	    <thead>
		<tr>
      <th>Nome</th>
      <th>Preço</th>
      <th>Categoria</th>
      <th>Descrição</th>
      <th>Criado em</th>
      <th>Ação</th>
		</tr>
	    </thead>
	</table>
    </main>

    <footer class="footer">
      <div class="container-fluid" style="margin-top: 5rem!important;">
        <span class="text-muted">Desenvolvido por Henrique Rodrigues</span>
      </div>
    </footer>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  
  <script>
    var app_url = 'http://localhost:8000/api/';
    let token = '<?= $_COOKIE['token'];?>';

    $(document).ready( function () {
      $('#table_id').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": app_url+'products/all',
          "dataType": "json",
          "type": "POST",
          "headers": {'Authorization': 'Bearer '+token}, 
        },
        "columns": [
          {'data': 'name'},
          {'data': 'price'},
          {'data': 'category'},
          {'data': 'description'},
          {'data': 'created_at'},
          {'data': 'action', 'searchable': false, 'orderable': false}
        ]
      });
    });

    function editProduct(id)
    {
      window.location.href = '/editar_produto.php?id='+id;
    }

    function deleteProduct(id)
    {
      fetch(app_url+'products/'+id+'/delete',  {
          method: 'DELETE',
          headers: new Headers({'Authorization': 'Bearer '+token}), 
          mode: "cors"
      })
      .then(response => {
          const statusCode = response.status;
          const data = response.json();
          return Promise.all([statusCode, data]);
      }).then(res => {
          if (res[0] === 200) {
            swal("Sucesso", "Produto excluido com sucesso!", "success").then((value) => {
              window.location.href = 'index.php';
            });
          } else if (res[0] == 401) {
            swal("Ops", "Você deve estar logado para realizar a ação!", "warning");
          } else {
            swal("Erro", "Erro inesperado", "error");
          }
      }); 
    }
  </script>
</html>