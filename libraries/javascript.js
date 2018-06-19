/*Funções javascript*/

function validacao() {
    if(document.form.user.value == "") {
        alert("Preencha o campo nome");
        document.form.user.focus();
        return false;
    }

    if(document.form.passw.value.length > 8) {
        alert("A senha não pode conter mais que 8 carácteres");
        document.form.passw.focus();
        return false;
    }

    if(!document.form.passw.value) {
        alert("Preencha o campo senha");
        document.form.passw.focus();
        return false;
    }
}

$(document).ready(function() {

    //ao clicar no indbotao irá mostrar o menu
    $('.indbotao').on('click', function() {
        $('nav li').toggle('indclose');

    });

    /*nossa classe ind-slide vai chamar a função cycle*/
    $('.ind-slide').cycle({
        fx: 'fade'
    });

    /*ao clicar no nav li, pegaremos o atributo href do link e realizaremos o encaminhamento do usuário para aquela localização*/
    $('nav li').on('click', function() {
        var link = $(this).children('a').attr('href');
        window.location.href = link;
    });

});
