/*Funções javascript*/

$(document).ready(function() {
    
    //ao clicar no indbotao irá mostrar o menu
    $('.indbotao').on('click', function() {
        $('nav li').toggle('indclose');

    })

    /*nossa classe ind-slide vai chamar a função cycle*/
    $(document).ready(function () {

        $('.ind-slide').cycle({
            fx: 'fade'
        })

    });

    /*ao clicar no nav li, pegaremos o atributo href do link e realizaremos o encaminhamento do usuário para aquela localização*/
      $('nav li').on('click', function() {
         var link = $(this).children('a').attr('href');
         window.location.href = link;
      });
});

