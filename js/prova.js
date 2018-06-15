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
                get_questoes_categoria: "",
                categoria_id: $("#categoria_questao").val()
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
                insere_questao_prova(questao_id,enunciado,alternativas);
            },
            error: function (data) {
                console.log("Erro: " + data.responseText);
            }
        });
    }

    function insere_questao_prova(questao_id,enunciado, alternativas){
        var html = "";
        html += "<div id='questao"+questao_id+"' class='questao-selecionada'>";
        html += "   <div class='card mb-3'>";
        html += "<div class='card-header numero-questao'>Questão "+contador_questoes+"</div>";
        html += "       <div class='card-body'>";
        html += "           <h5 class='card-title'>"+enunciado+"</h5>";
        html += "           <p class='card-text'>";
        html += "               "+alternativas+"";
        html += "           </p>";
        html += "       </div>";
        html += "       <div class='card-footer'>";
        html += "           <button type='button' class='btn btn-default btn-sm remover' data-id="+questao_id+">Remover</button>";
        html += "       </div>";
        html += "   </div>";
        html += "<input type='hidden' name='questoes[questao"+questao_id+"][id]' value="+questao_id+">";
        html += "</div>";

        $("#div_questoes").append(html);
    }

    $(document).on("click", ".remover", function(){
        var id = $(this).data("id");
        $("#questao"+id).remove();
        contador_questoes--;
        var count = 0;
        $(".numero-questao").each(function(){
            count++;
            $(this).text("Questão " + count);
        });
    });

    $("#form_cadastro_prova").submit(function(e){
        e.preventDefault();
        var form = this;

        if(contador_questoes == 0){
            alert("Adicione pelo menos uma questão para a prova.");
            return false;
        }

        form.submit();
    });

});