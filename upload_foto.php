<?php
            require 'connect.php';
            $login = $_POST['login'];
            $dir = "./assets/img/users"; 
            $nome = $_POST['nome'];
            $usuario = $_POST['user'];
            $senha = md5($_POST['pass']);
            $permissao = $_POST['permission'];
            $email - $_POST['email'];
            $query = "INSERT INTO usuarios values (default,'$usuario','$senha','$nome,$permissao,'$url_imagem')";
            $file = $_FILES["foto"]; 
            $img_enviada = false;
            $inserir = $conn->query("INSERT INTO usuarios values (default,'$usuario','$senha','$nome',$permissao,'ENVIAR',$email);");
            $id = $conn->query("SELECT MAX(id_usuario) as maxId FROM usuarios;");
            $result = mysqli_fetch_assoc($id);
            $id_max = $result['maxId'];
            $url_imagem = $dir.'/'.$id_max.".png";
            $atualizar = $conn->query("UPDATE usuarios SET foto = '$url_imagem' WHERE id_usuario = $id_max ;");
      
if (move_uploaded_file($file["tmp_name"], "$dir/".$id_max.".png")) { 
    $img_enviada = true;
    header("Location:add_user.php?foto=$url_imagem&feito=1&login=$login&acao=inserido");
    if($inserir){

    }else{
      echo 'Erro: ao carregar imagem';
    }
} 
else { 
   $img_enviada = false;
}
          



?>