<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style2.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">

  <title>Gerenciador de Patrimônio - Adicionar Usuários</title>
</head>

<body>
<?php
    if($_COOKIE!=null){
    }else{
      header("Location:index.php");
    }
    ?>
  <nav class="navbar navbar-expand-lg top navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index2.php?logado=1" class="home">
        <img src="./assets/img/logo.png" alt="logo" width="70px" height="50px">
        Gerenciador de Patrimônio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index2.php?logado=1"><i class="fas fa-poll ico"></i>Resumo</a>
          </li>
          <li class="nav-item dropdown drop">
            <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <spam class="separa">|</spam><i class="fas fa-keyboard ico"></i>
              Cadastros
            </a>
            <ul class="dropdown-menu drop" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="usuarios.php"><i class="fas fa-user ico"></i>Usuário</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="patrimonio.php"><i class="fas fa-file-invoice-dollar ico"></i>Patrimonio</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
              <spam class="separa">|</spam><i class="fas fa-sign-in-alt ico"></i>Entradas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
              <spam class="separa">|</spam><i class="fas fa-sign-out-alt ico"></i>Saídas
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <main class="corpo">
  
    
    <div class="conteudo cont_add container-fluid">
      <h2 class="titulo_central">Adicionar Usuário</h2>
      <div class="formularios">
                  <div class="form1">
                  <form action="upload_foto.php" method="post">
                  <label for="nome">Nome:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" name="nome" id="nome" class="formu">
                  <label for="user">Usuário:&nbsp&nbsp&nbsp&nbsp</label><input type="text" name="user" id="user" class="formu">
                  <label for="pass">Senha:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="password" name="pass" id="pass" class="formu">
                  <label for="permission">Permissão:</label><select name="permission" id="permission" class="formu">
                    <option value="1">Administrador</option>
                    <option value="2">Usuário</option>
                  </select>
                  <form action="upload_foto.php" method="post">
                  <label for="foto">Foto Perfil:</label><input type="file" name="foto" id="foto" class="formu formu_foto">
                  </div>
                  <div class="foto">
                  <?php
                  $feito = $_GET['feito'];
                  $imagem_default = "/assets/img/users/default.png";
                  if($feito){echo 'feito';
                   }else{ echo  '<div class="previa_foto default_image">
                          
                    </div>';}
                  
                  ?>
                  </div>
      </div>
      <div class="botoes">
      <input type="submit" value="Salvar" class="salvar"><input type="reset" class="limpar" value="Limpar"><button class="cancelar" onclick="voltar()">Cancelar</button></form>
      </div>
    </div>
    
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="./js/script.js" type="text/javascript"></script>
  
</body>

</html>