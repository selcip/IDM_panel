<?php
  require('public/common/header.php');
?>
<div class='container' style='margin-top:100px; border: 1px solid black;'>
    <div class="row" id="profile-cards">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
          </div>
          <div class="content">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="http://167.114.26.111:8082/create.php?name=Batt" alt="...">
                <h4 class="title"><?php echo $_SESSION['name']; ?><br>
                  <small>Musician</small>
                </h4>
              </a>
            </div>
              <p class="description text-center">
                <?php
                  $user->cash();
                ?>
              </p>
          </div>
          <hr>
          <div class="text-center">
            <button href="#" class="btn btn-social btn-facebook btn-simple"><i class="fa fa-facebook-square"></i></button>
            <button href="#" class="btn btn-social btn-twitter btn-simple"><i class="fa fa-twitter"></i></button>
            <button href="#" class="btn btn-social btn-google btn-simple"><i class="fa fa-google-plus-square"></i></button>
          </div>
        </div> <!-- end card -->
      </div>
    </div>
</div>

<?php
  require_once 'public/common/scripts.php';
?>