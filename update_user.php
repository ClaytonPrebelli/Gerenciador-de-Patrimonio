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
            $email = $_POST['email'];
            if($valida_imagem>0){
              echo "tem imagem";
            }else{
              echo 'fudeu';
            }
           if ($senha==$senha_temp){
              if($imagem['size']>0){
              $query = "UPDATE usuarios set nome = '$nome', usuario = '$usuario', foto = '$url_imagem', permissao = $permissao, email = '$email' where id_usuario = $id;";}
              else{$query = "UPDATE usuarios set nome = '$nome', usuario = '$usuario', permissao = $permissao, email = '$email' where id_usuario = $id;";}
            }else{
              if($imagem['size']>0){
              $query = "UPDATE usuarios set nome = '$nome', senha = md5('$senha'), usuario = '$usuario', foto = '$url_imagem', permissao = $permissao, email = '$email' where id_usuario = $id;";}
              else{$query = "UPDATE usuarios set nome = '$nome', senha = md5('$senha'), usuario = '$usuario', permissao = $permissao, email = '$email' where id_usuario = $id;";}
            }
            
            $update = $conn->query($query); 
            $img_enviada = false;
            if($imagem['size']>0){   
              if(file_exists( $url_imagem )){unlink($url_imagem);}              
                      if (move_uploaded_file($imagem["tmp_name"], "$dir/".$id.".png")) { 
                          $img_enviada = true;
                          header("Location:usuarios.php?login=$login&acao=atualizado&id=$id");
                      } 
                      else { 
                        echo 'deu ruim';
                        $img_enviada = false;}
                            }else{
  header("Location:usuarios.php?login=$login&acao=atualizado&id=$id");
}
     
?>