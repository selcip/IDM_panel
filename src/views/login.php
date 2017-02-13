<?php
if ($_SESSION['check']) {
    header('Location: /');
}

?>
<div class='container flex-container'>
    <div class='login_box'>
        <h4>IDMStory - GM PANEL</h4>
        <form id='login_form'>
            <div class='input-group'>
                <input type='text' placeholder='Login' require class='form-control' name='login'>
                <span class='input-group-addon'><i class='fa fa-user'></i></span>
            </div>
            <div class='input-group'>
                <input type='password' placeholder='Senha' required class='form-control' name='senha'>
                <span class='input-group-addon'><i class='fa fa-key'></i></span>
            </div>
            <button class="btn btn-info btn-block btn-fill" id="login_btn">Login</button>
        </form>
    </div>
</div>