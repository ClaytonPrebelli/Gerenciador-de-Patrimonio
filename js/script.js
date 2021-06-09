const urlParams = new URLSearchParams(window.location.search);
const erro = urlParams.get('erro');
const login = urlParams.get('login')
if (erro==1){
    swal({
        icon: 'error',
        title: 'Oops...',
        text: 'Usuário ou senha inválidos!',
        timer:10000
      })
}
  let adiciona_user = document.getElementById('adiciona_user')
  adiciona_user.onclick = function(){
    window.open(`add_user.php?login=${login}`,'_self')
  } 
  function volta_user(){
    window.open(`usuarios.php?login=${login}`,'_self')
  }

