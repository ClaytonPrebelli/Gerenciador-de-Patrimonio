<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style2.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">

  <title>Gerenciador de Patrimonio</title>
</head>

<body class="corpo_lista">
    <?php
    $login = $_GET['login'];
    $logado = $_GET['logado'];
   if($login!=null||$logado=0){
      
      if($logado>0){}else{
      echo '<script>swal("Bem vindo '.ucfirst($login).'")</script>';}
    }else{
      header("Location:index.php");
    }
    ?>
  <nav class="navbar navbar-expand-lg top navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" class="home">
        <img src="./assets/img/logo.png" alt="logo" width="70px" height="50px">
        Gerenciador de Patrimônio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-poll ico"></i>Resumo</a>
          </li>
          <li class="nav-item dropdown drop">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <button class="adiciona" id="adiciona_user" style="visibility:hidden;"><i class="fas fa-user-plus ico"></i>Adicionar Usuário</button>
    <div class="conteudo lista_item container-fluid">
      <h2 class="titulo_central">Resumo do Estoque</h2>
      <table class="table table-estoque table-striped">
        <thead>
          <tr>
            <th scope="col" width="50%">Item</th>
            <th scope="col" width="10%">Tam.</th>
            <th scope="col" width="10%">Qtd.</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require 'connect.php';
          $result = mysqli_query($conn, "select distinct e.id_patrimonio as 'id', t.desc_tipo as 'Tipo', m.desc_modelo as 'Modelo', ta.desc_tamanho as 'Tamanho', e.quantidade as 'Quantidade', m.url as 'Imagem'
          from estoque as e 
          inner join tipo_pat as t on t.id_tipo = e.tipo
          inner join modelo_pat as m on m.id_modelo = e.modelo
          inner join tamanho_pat as ta on ta.id_tamanho = e.tamanho
          order by desc_tipo asc, desc_modelo asc,desc_tamanho asc;");
          
          if ($result) { // If $sql is True
            while ($exibe = mysqli_fetch_assoc($result)) {
              $id = $exibe['id'];
              $tipo = utf8_encode($exibe['Tipo']);
              if (strstr($tipo,' ')){
                $nome =  substr($tipo, 0, strpos($tipo, " "));
                                }else{
                                  $nome=$tipo;
                  }
                
              $modelo = " ".utf8_encode($exibe['Modelo']);
              echo "<tr><th scope='row'>" . "<a href='item.php?login=$login&item=$id' class='link_lista link'>".$nome .$modelo. "</a></th><td>" . utf8_encode($exibe['Tamanho']) . "</td><td>".$exibe['Quantidade']."</td></tr>";
            }
          }
          ?>
        </tbody>
      </table>


    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="./js/script.js" type="text/javascript"></script>
</body>

</html>