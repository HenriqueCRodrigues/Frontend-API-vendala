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
              <a class="nav-link" href="/cadastrar.php">Cadastrar-se</a>
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
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="****">
        </div>
        <button onclick="login();" class="btn btn-primary">Logar</button>
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
    var app_url = 'http://localhost:8000/'
    function login() {
      client_id = 2;
      client_secret = 'Xn9qnE8D0osgaHBaARzEYV6V9L8ljJTU9B5frSE6';

      let email = $('#exampleInputEmail1').val()
      let password = $('#exampleInputPassword1').val()
      fetch(app_url+'oauth/token',  {
            method: 'POST',
            headers: new Headers({'content-type': 'application/json'}), 
            mode: "cors",
            body: JSON.stringify({ grant_type: 'password', client_id: client_id, client_secret: client_secret, username: email, password: password, scope: '*' })
        })
        .then(response => {
            const statusCode = response.status;
            const data = response.json();
            return Promise.all([statusCode, data]);
        }).then(res => {
          console.log(res)
            if (res[0] === 200) {
              document.cookie="token="+res[1].access_token+";expires="+new Date().setTime(res[1].expires_in);
              window.location.href = 'index.php';
            } else if (res[0] == 401) {
              swal("Ops", "Email e/ou Senha incorreto!", "warning");
            } else {
              swal("Erro", res.statusText, "error");
            }
        });
    }
  </script>
</html>
