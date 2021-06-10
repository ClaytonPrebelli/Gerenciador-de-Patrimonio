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
  <title>Gerenciador de Patrimônio - Visualizar item</title>
</head>

<body>
<?php
   $id = $_GET['item'];
   $login = $_GET['login'];
    if($login!=null){
    }else{
      header("Location:index.php");
    }
    require 'connect.php';
    $result = $conn->query("SELECT DISTINCT e.id_patrimonio AS 'id', t.desc_tipo AS 'Tipo', m.desc_modelo AS 'Modelo', ta.desc_tamanho AS 'Tamanho', e.quantidade AS 'Quantidade', e.foto AS 'Foto'
    FROM estoque AS e 
    INNER JOIN tipo_pat AS t ON t.id_tipo = e.tipo
    INNER JOIN modelo_pat AS m ON m.id_modelo = e.modelo
    INNER JOIN tamanho_pat AS ta ON ta.id_tamanho = e.tamanho 
    WHERE id_patrimonio=$id
    ORDER BY desc_tipo ASC, desc_modelo ASC,desc_tamanho ASC;");
      $resposta = $result->fetch_array(MYSQLI_ASSOC);
      $tipo = $resposta['Tipo'];
      $modelo = $resposta['Modelo'];

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
              <<li><a class="dropdown-item" href=<?php echo "usuarios.php?login=$login"?>><i class="fas fa-user ico"></i>Usuário</a></li>
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
      <h2 class="titulo_central"><?php echo utf8_encode($tipo." ".$modelo);?></h2>
      <div class="formularios">
                  <div class="form1 lista_item_individual">
                  <form action="update_user.php" method="post" enctype="multipart/form-data">
                  <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Tamanho</th>
            <th scope="col">Quantidade</th>
          </tr>
        </thead>
        <tbody>
        <?php
          require 'connect.php';
          $result = mysqli_query($conn, "select distinct e.id_patrimonio as 'id', t.desc_tipo as 'Tipo', m.desc_modelo as 'Modelo', ta.desc_tamanho as 'Tamanho', e.quantidade as 'Quantidade', e.foto as 'Foto'
          from estoque as e 
          inner join tipo_pat as t on t.id_tipo = e.tipo
          inner join modelo_pat as m on m.id_modelo = e.modelo
          inner join tamanho_pat as ta on ta.id_tamanho = e.tamanho where t.desc_tipo = '$tipo' and m.desc_modelo = '$modelo'
          order by desc_tipo asc, desc_modelo asc,desc_tamanho asc;");
          if ($result) { // If $sql is True
            while ($exibe = mysqli_fetch_assoc($result)) {
              echo "<tr><th scope='row'>".$exibe['Tamanho']."</th><td>".$exibe['Quantidade']."</td></tr>";
            }
          }
          ?>
        </tbody>
      </table>

        </table>
                  </div>
                  <div class="foto foto_item">
                  <?php
                  echo '<div class="previa_foto" style="background-image:url('.$exibe['Foto'].'")>
                          
                    </div>';
                  
                  ?>
                  </div>
      </div>
      <div class="botoes">
      <input type="text" name="login" id="login" style="display:none;" value=<?php echo "$login"?>>
      <input type="text" name="id" id="id" style="display:none;" value=<?php echo "$id"?>>
     </form><button class="cancelar" onclick="volta_item()" id="volta_user"><i class="fas fa-arrow-circle-left ico"></i>Voltar</button>
      </div>
    </div>
    
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="./js/script.js" type="text/javascript"></script>
  
</body>

</html>