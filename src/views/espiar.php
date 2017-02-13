<?php
  require('public/common/header.php');
  $user->proteger();
?>
<div class="container card" style='margin-top:100px;'>
    <h4 class="text-center">Digite um nick para espiar o inventário</h4>
    <form id="espiar">
        <div class="form-group">
            <div class="input-group">
              <input type="text" placeholder="Nome do personagem" class="form-control">
              <span class="input-group-addon"><i class="fa fa-odnoklassniki"></i></span>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" href="#" class="btn btn-block btn-fill btn-info"><i class="fa fa-eye"></i>Espiar</button>
        </div>
    </form>
</div>
<div class="card" id="aqui">
       
</div>
<?php
  require('public/common/scripts.php');
?>