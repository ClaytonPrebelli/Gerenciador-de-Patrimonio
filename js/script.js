const urlParams = new URLSearchParams(window.location.search);
const erro = urlParams.get('erro')
console.log(erro)
if (erro==1){
    swal({
        icon: 'error',
        title: 'Oops...',
        text: 'Usuário ou senha inválidos!',
        timer:10000
      })
}