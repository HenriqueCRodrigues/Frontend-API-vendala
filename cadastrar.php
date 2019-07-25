<?php
if (isset($_COOKIE['token'])) {
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
            <li class="nav-item">
              <a class="nav-link" href="/login.php">Logar-se</a>
            </li>
          </ul>
        </div>
    </header>

      </nav>
    <!-- Begin page content -->
    <main role="main" class="container" style="margin-top: 5rem!important;">
      
      <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@example.com">
        </div>
        <div class="form-group">
          <label for="exampleInputName">Nome</label>
          <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Henrique Rodrigues">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="****">
        </div>
        <button onclick="register();" class="btn btn-primary">Cadastrar</button>
      
    </main>

    <footer class="footer" style="margin-top: 20rem!important;">
      <div class="container">
        <span class="text-muted">Desenvolvido por Henrique Rodrigues</span>
      </div>
    </footer>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  
  <script>
    var app_url = 'http://localhost:8000/api/'
    function register(form) {
      let name = $('#exampleInputName').val()
      let email = $('#exampleInputEmail1').val()
      let password = $('#exampleInputPassword1').val()
      if (name != '' && email != '' && password != '') {
        fetch(app_url+'register',  {
            method: 'POST',
            headers: new Headers({'content-type': 'application/json'}), 
            mode: "cors",
            body: JSON.stringify({ name: name, email: email, password: password })
        })
        .then(response => {
            const statusCode = response.status;
            const data = response.json();
            return Promise.all([statusCode, data]);
        }).then(res => {
            if (res[0] === 201) {
              swal("Sucesso", "Usuario cadastrado com sucesso!", "success").then((value) => {
                window.location.href = 'login.php';
              });
            } else {
              swal("Erro", data.statusText, "error");
            }
        });
    }
    }
  </script>
</html>
