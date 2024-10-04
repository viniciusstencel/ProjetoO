
function filtrar() {
    var input,
        ul,
        li,
        a,
        span,
        i,
        textValue,
        count = 0

    // Pegar elementos HTML
    input = document.getElementById('inputBusca');
    ul = document.getElementById("listaProdutos");

    // Filter
    filter = input.value.toUpperCase();

    // Pegar todas as li's da lista
    li = ul.getElementsByTagName("li");

    // Percorrer todos os li's
    for (i = 0; i < li.length; i++) {
        // Pegar a tag a do elemento percorrido
        a = li[i].getElementsByTagName("a")[0];
        // Pegar o texto dentro da tag A
        textValue = a.textContent || a.innerText;
        // Verificar se o que o usuário digitou bate
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            // Valor bateu
            li[i].style.display = "";
            // Incrementar o contador
            count++
            // Pegar a tag span do item
            span = li[i].querySelector(".item-name");
            // Se existir
            if (span) {
                span.innerHTML = textValue.replace(new RegExp(filter, "gi"), (match) => {
                    return "<strong>" + match + "</strong>";
                })
            }
        } else {
            // Não mostrar o item da lista
            li[i].style.display = "none";
        }
    }
    if(count == 0 ){
      ul.style.display = "none";
    }else{
      ul.style.display = "block";
    }
}
// Selecionar o elemento da lista de produtos sugeridos
var listaProdutos = document.getElementById("listaProdutos");

// Adicionar um event listener para o evento mouseleave
listaProdutos.addEventListener("mouseleave", function() {
    listaProdutos.style.display = "none";
});




