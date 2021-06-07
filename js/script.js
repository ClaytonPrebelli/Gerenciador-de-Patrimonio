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
function redireciona(valor){
  window.open(valor+".php?login="+login,'_self')
}
function voltar(){
  window.history.back()
}
