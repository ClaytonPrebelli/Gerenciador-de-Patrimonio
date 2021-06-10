const urlParams = new URLSearchParams(window.location.search);
const erro = urlParams.get('erro');
const login = urlParams.get('login')
const acao = urlParams.get('acao')
if (erro==1){
    swal({
        icon: 'error',
        title: 'Oops...',
        text: 'Usuário ou senha inválidos!',
        timer:10000
      })
}
if(acao!=null){
switch(acao){
  case "atualizado":
    swal("Usuário atualizado com êxito!")
    break;
    case "inserido" :
      swal ("Usuário inserido com êxito!")
      break;
    case "deletado" :
      swal("Usuário deletado com êxito!")
      break;
      default:
        break;
}}
  let adiciona_user = document.getElementById('adiciona_user')
 if(adiciona_user!=null){adiciona_user.onclick = function(){
    window.open(`add_user.php?login=${login}`,'_self')
  } }
  function volta_user(){
    window.open(`usuarios.php?login=${login}`,'_self')
  }
  function volta_item(){
    window.open(`index2.php?login=${login}&logado=1`,'_self')
  }
    
