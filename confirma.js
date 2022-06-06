const links = document.querySelectorAll('.excluir');

for( let i = 0; i < links.length; i++ ){
links[i].addEventListener("click", function(event){
    event.preventDefault();

let resposta = confirm("Deseja realmente Excluir");
if(resposta) location.href = links[i].getAttribute('href');

});

}