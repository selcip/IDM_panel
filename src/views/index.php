<?php
if (!$_SESSION['check']) {
    header('Location: /login');
}
require_once 'public/common/header.php';
?>
<div class='container' style='margin-top:100px; '>
    <div class="row">
        <div class="col-md-4 card">
            <?php
            
            ?>
        </div>
        <div class="col-md-4 card">
            
        </div>
    </div>
</div>
<?php
  require_once 'public/common/scripts.php';
?>