<?
  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = md5($_POST['senha']);
 
  require 'connect.php';
  if(isset($entrar)){
   $verifica =  mysqli_query($conn,"SELECT * FROM usuarios where usuario = '$login' and senha = '$senha'");
   $retorna = mysqli_num_rows($verifica);
    if ($retorna>0){
      setcookie("login",$login);
      header("Location: index2.php");
    }else{
      header("Location:index.html?erro=1");
    }
    }
    ?>
