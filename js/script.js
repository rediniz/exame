$(document).ready(function(){

    var contador_questoes = 0;

    $("#categoria_questao").on("change", function(){
        carregar_questoes_categoria();
    });

    $("#categoria_questao").trigger("change");

    function carregar_questoes_categoria(){
        $.ajax({
            url: "functions.php",
            data: {
                get_categorias: "",
                categoria: $("#categoria_questao").val()
            },
            type: 'POST',
            context: this,
            success: function (data) {
                $("#questoes").html(data);
            },
            error: function (data) {
                console.log("Erro: " + data.responseText);
            }
        });
    }

    $("#adicionar_questao").on("click", function(){
        var questao_id = $("#questoes").val();
        var enunciado = $("#questoes option:selected").text();

        carregar_alternativas_questao(questao_id, enunciado);
    });

    function carregar_alternativas_questao(questao_id, enunciado){

        $.ajax({
            url: "functions.php",
            data: {
                carregar_alternativas_questao: "",
                questao_id: questao_id
            },
            type: 'POST',
            context: this,
            success: function (alternativas) {
                contador_questoes ++;
                insere_questao_prova(enunciado,alternativas);
            },
            error: function (data) {
                console.log("Erro: " + data.responseText);
            }
        });
    }

    function insere_questao_prova(enunciado, alternativas){
        var html = "";
        html += "<div id='questao"+contador_questoes+"'>";
        html += "   <div class='card'>";
        html += "       <div class='card-body'>";
        html += "           <h5 class='card-title'>Questão "+contador_questoes+"</h5>";
        html += "           <p class='card-text'>"+enunciado+"</p>";
        html += "           <p class='card-text'>";
        html += "               "+alternativas+"";
        html += "           </p>";
        html += "       </div>";
        html += "       <div class='card-footer'>";
        html += "           <button class='btn btn-default btn-sm'>Remover</button>";
        html += "       </div>";
        html += "   </div>";
        html += "</div>";

        $("#div_questoes").append(html);
    }


});