<?php
            require 'connect.php';
            $imagem = $_FILES['imagem']; 
            $query = mysqli_query($conn, "Insert into usuarios (id,foto) values (default, '$imagem')");
          mysqli_query($conn, "Insert into usuarios (id,foto) values (default, '$imagem')") or die("Algo deu errado ao inserir
            o registro. Tente novamente.");
echo 'Registro inserido com sucesso!';
 
          /*  <div class="previa_foto">

            </div>*/

            ?>