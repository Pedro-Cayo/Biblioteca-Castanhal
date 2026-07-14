function validaForm(){

    const livroInput = document.getElementById("nomeLivro"); // Pega a "tag/elemento (inserido pelo usuário)" e guarda na variável 
    const livro = livroInput.value.trim(); // Pega o elemento, limpa espaços em branco no começo e no fim e guarda na variável correspondente 
    if(livro === ""){  // Checa se o usuário preencehu o formulário com pelo menos 1 caractere 
        alert("Preencha o campo 'Nome do livro' corretamente!"); // Se o valor for vazio exibe uma mensagem de erro
        livroInput.focus();
        return false; // Impede o envio do formulário e para a função 
    }

    const autorInput = document.getElementById("nomeAutor");
    const autor = autorInput.value.trim();
    if(autor === ""){
        alert("Preencha o campo 'Autor(a)' corretamente!")
        autorInput.focus();
        return false;
    }

    const generoInput = document.getElementById("generoLivro");
    const genero = generoInput.value.trim();
   if(genero === ""){
        alert("Preencha o campo 'Gênero' corretamente!")
        generoInput.focus();
        return false;
    }

    const editoraInput = document.getElementById("editoraLivro");
    const editora = editoraInput.value.trim();
   if(editora === ""){
        alert("Preencha o campo 'Editora' corretamente!")
        editoraInput.focus();
        return false;
    }

    const anoInput = document.getElementById("anoLivro");
    const ano = anoInput.value.trim();
   if(ano === ""){
        alert("Preencha o campo 'Ano de Lançamento' corretamente!")
        anoInput.focus();
        return false;
    }

    const paginaInput = document.getElementById("pagLivro");
    const pagina = paginaInput.value.trim();
   if(pagina === ""){
        alert("Preencha o campo 'Número de páginas' corretamente!")
        paginaInput.focus();
        return false;
    }

    /* Devolve o valor "limpo" e validado para dentro de suas respectivas variáveis: */
    livroInput.value = livro; 
    autorInput.value = autor;
    generoInput.value = genero;
    editoraInput.value = editora;
    anoInput.value = ano;
    paginaInput.value = pagina;

    return true; // Permite o envio do formulário e encerra a função
}   