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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Gerenciador de Patrimônio - Remover Usuários</title>
</head>

<body>
<?php
   $id = $_GET['id'];
   $login = $_GET['login'];
    if($login!=null){
    }else{
      header("Location:index.php");
    }
    require 'connect.php';
    $result = $conn->query("SELECT distinct u.id_usuario as 'id',u.nome as 'Nome', p.desc_permissao as 'Permissao', u.usuario as 'Usuario', u.foto as 'Foto', u.senha as 'Senha', u.email as 'Email'  FROM usuarios as u inner join permissoes as p on u.permissao = p.id_permissao where id_usuario=$id");
      $resposta = $result->fetch_array(MYSQLI_ASSOC);
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
            <a class="nav-link" aria-current="page" href=<?php echo"index2.php?logado=1&login=$login"?>><i class="fas fa-poll ico"></i>Resumo</a>
          </li>
          <li class="nav-item dropdown drop">
            <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <spam class="separa">|</spam><i class="fas fa-keyboard ico"></i>
              Cadastros
            </a>
            <ul class="dropdown-menu drop" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href=<?php echo "usuarios.php?login=$login"?>><i class="fas fa-user ico"></i>Usuário</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href=<?php echo "tipo.php?login=$login"?>><i class="fas fa-border-style ico"></i>Tipo de Item</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href=<?php echo "modelo.php?login=$login"?>><i class="fas fa-palette ico"></i>Modelo de Item</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href=<?php echo "tamanho.php?login=$login"?>><i class="fas fa-tape ico"></i>Tamanho de Item</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo "entrada.php?login=$login"?> tabindex="-1" aria-disabled="true">
              <spam class="separa">|</spam><i class="fas fa-sign-in-alt ico"></i>Entradas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo "saida.php?login=$login"?> tabindex="-1" aria-disabled="true">
              <spam class="separa">|</spam><i class="fas fa-sign-out-alt ico"></i>Saídas
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <main class="corpo">
  
    
    <div class="conteudo cont_add container-fluid">
      <h2 class="titulo_central">Remover Usuário</h2>
      <div class="formularios">
                  <div class="form1">
                  <form action="deletar_user.php" method="post" enctype="multipart/form-data">
                  <label for="nome">Nome:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" name="nome" id="nome" class="formu" value=<?echo '"'.$resposta['Nome'].'"'?> disabled>
                  <label for="email">Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" name="email" id="email" class="formu" value=<?echo '"'.$resposta['Email'].'"'?> disabled>
                  <label for="user">Usuário:&nbsp&nbsp&nbsp&nbsp</label><input type="text" name="user" id="user" class="formu" value=<?echo '"'.$resposta['Usuario'].'"'?>disabled >
                  <label for="pass">Senha:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="password" name="pass" id="pass" class="formu" value="***"disabled>
                  <label for="permission">Permissão:</label><input type="text" name="permissao" id="permissao" class="formu" value=<?echo '"'.utf8_encode($resposta['Permissao']).'"'?> disabled>
                 
                  </div>
                  <div class="foto">
                  <?php
                  echo '<div class="previa_foto" style="background-image:url('.$resposta['Foto'].'")>
                          
                    </div>';
                  
                  ?>
                  </div>
      </div>
      <div class="botoes">
      <input type="text" name="login" id="login" style="display:none;" value=<?php echo "$login"?>>
      <input type="text" name="id" id="id" style="display:none;" value=<?php echo "$id"?>>
      <input type="submit" value="Deletar" class="cancelar" style="margin-right:15px"></form><button class="salvar" onclick="volta_user()" id="volta_user"><i class="fas fa-arrow-circle-left ico"></i>Voltar</button>
      </div>
    </div>
    
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="./js/script.js" type="text/javascript"></script>
  
</body>

</html>