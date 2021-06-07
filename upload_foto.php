<?php
            require 'connect.php';
            $login = $_POST['login'];
            $dir = "./assets/img/users"; 
            $imagem = $_FILES['imagem']; 
            $nome = $_POST['nome'];
            $usuario = $_POST['user'];
            $senha = md5($_POST['pass']);
            $permissao = $_POST['permission'];
            $query = "INSERT INTO usuarios values (default,'$usuario','$senha','$nome,$permissao,'$url_imagem')";
            $id = $conn->query("SELECT MAX(id_usuario) as maxId FROM usuarios;");
            $result = mysqli_fetch_assoc($id);
            $id_max = $result['maxId']+1;
            $url_imagem = $dir.'/'.$id_max.".png";
            $file = $_FILES["foto"]; 
            $img_enviada = false;
            echo "nome: $nome, login: $usuario, permissão: $permissao, url: $url_imagem, senha: $senha";
      
if (move_uploaded_file($file["tmp_name"], "$dir/".$id_max.".png")) { 
    $img_enviada = true;
    $inserir = $conn->query("INSERT INTO usuarios values (default,'$usuario','$senha','$nome',$permissao,'$url_imagem');");
    setcookie("login",$login, time()+1600);
    header("Location:add_user.php?foto=$url_imagem&feito=1&login=$login");
    if($inserir){

    }else{
      echo 'Erro: ao carregar imagem';
    }
} 
else { 
   $img_enviada = false;
}
          



?>