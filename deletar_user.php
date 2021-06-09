<?php
            require 'connect.php';
            $login = $_POST['login'];
            $dir = "./assets/img/users"; 
            $imagem = $_FILES['foto']; 
            $nome = $_POST['nome'];
            $id = $_POST['id'];
            $url_imagem = $dir.'/'.$id.".png";
            $usuario = $_POST['user'];
            $senha = $_POST['pass'];
            $senha_temp = "***";
            $permissao = $_POST['permission'];
            $valida_imagem = $imagem['size'];
            $query = "DELETE FROM usuarios WHERE id_usuario = $id";
            $delete = $conn->query($query);  
              if(file_exists( $url_imagem )){unlink($url_imagem);             
                      header("Location:usuarios.php?login=$login&acao=deletado&id=$id");
                      } 
                     else{
  header("Location:usuarios.php?login=$login&acao=deletado&id=$id");
}
     
?>