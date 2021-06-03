<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap"
      rel="stylesheet"
    />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Gerenciador de Patrimônio</title>
  </head>

  <body>
  <?php
    if($_COOKIE!=null){
      $login = $_COOKIE['login'];
      header("Location:index2.php");
    }else{
    }
    ?>
    <div class="container-fluid login_box">
      <h1 class="titulo">Gerenciador de Patrimônio</h1>
      <div class="card">
        <img src="./assets/img/logo.png" id="logo_login" alt="Logo" />
        <h1>Login</h1>
        <div class="card-body">
          <form  method="post" action="valida_login.php">
            <input
              type="text"
              name="login"
              id="login"
              placeholder="Login"
              class="formu"
            />
            <input
              type="password"
              name="senha"
              id="senha"
              placeholder="Senha"
              class="formu"
            />
            <input type="submit" value="Logar" class="logar" name="entrar"/>
          </form>
          <a href="" class="esqueci">
            <p>Esqueci a senha</p>
          </a>
        </div>
      </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js" type="text/javascript"></script>
  </body>
</html>
