<?php
  require('public/common/header.php');
  $user->proteger();
?>
<div class="container" style='margin-top:100px; '>
    <div class="row card">
        <h3 class="text-center">Selecione uma das opções de log</h3>
       
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <select class="form-control text-center" id="options">
                    <option value="">Selecione uma opção abaixo</option>
                    <option value="levelup">Level Up</option>
                    <option value="boss">Chefes Mortos</option>
                    <option value="scrolls">Pergaminhos Usados</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3" id="levelup_box" hidden>
        
            <h3 class="text-center">Digite um nick para acompanhar como ele upou</h3>
            <form id="log_levelup">
                <div class="form-group">
                    <input class="form-control" placeholder="Nick do cidadão" type="text" name="nick">
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <input type="submit" href="#" class="btn btn-info btn-fill center-block" value="Pesquisar"></a>
                    </div>
                </div>
            </form>
        </div>
        
         <div class="col-md-6 col-md-offset-3" id="boss_box" hidden>
        
            <h3 class="text-center">Digite um nick para saber quais chefes ele matou</h3>
            <form id="log_boss">
                <div class="form-group">
                    <input class="form-control" placeholder="Nick do cidadão" type="text" name="nick">
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <input type="submit" href="#" class="btn btn-info btn-fill center-block" value="Pesquisar"></a>
                    </div>
                </div>
            </form>
        </div>
        
        
        
    </div>
    <div class="row card" id="aqui">
       
    </div>
</div>

<?php
  require('public/common/scripts.php');
?>
<script>
    $(document).ready(function(){
        $("#options").on("change",function(){
            var valor = $("#options").val()
            $("#levelup_box").hide()
            $("#boss_box").hide()
            if(valor === "levelup"){
                $("#levelup_box").show()
            }else if(valor === "boss"){
                $.post("src/controllers/casePost.php",{action: "mainLog_boss"},function(data){
                    $("#aqui").html(data)
                })
                $("#boss_box").show()
            }
        })
    })
</script>