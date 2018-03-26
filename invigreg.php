<?php
  include 'all.php';
?>

  <script type="text/javascript">
    var     head = document.getElementsByTagName('head')[0],
            link1 = document.createElement('link'),
            link2 = document.createElement('link');
    link1.href='assets/bootstrap/css/form-elements.css';
    link1.rel='stylesheet';
    link2.href='assets/bootstrap/css/style.css';
    link2.rel='stylesheet';
    head.appendChild(link1);
    head.appendChild(link2);
  </script>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-image:url('images/backgrounds/1.jpg');padding-bottom:2%;" >
      <div class="row" style="margin:0 3%;">
        <div class="modal fade bd-example-modal-lg error" id="error" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg1">
            <div class="modal-content" style="width:100%:">
              <div class="modal-header">
                <h3 class="modal-title" >Login Error</h3>
              </div>
              <div class="modal-body xsfonts" style="" id="folist2">
                Invalid Email ID or Password
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-lg error1" id="error1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg1">
            <div class="modal-content" style="width:100%:">
              <div class="modal-header">
                <h3 class="modal-title" >Login Error</h3>
              </div>
              <div class="modal-body xsfonts" style="" id="folist2">
                Invalid Details
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade bd-example-modal-lg error2" id="error2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg1">
            <div class="modal-content" style="width:100%:">
              <div class="modal-header">
                <h3 class="modal-title" >Login Error</h3>
              </div>
              <div class="modal-body xsfonts" style="" id="folist2">
               Enter Details
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <?php
          if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
          {
        ?>

        <div class="col-sm-offset-3 col-sm-5">
          <div class="form-box" >
            <div class="form-top">
              <div class="form-top-left">
                <?php 
                  if(isset($_GET['redirect']))
                  {
                    if($_GET['redirect']=='reg')
                    {
                      echo '<h3>You have Signed up</h3>
                      <p>Login to get instant access:</p>';
                    }
                  }
                  else
                  {
                    echo '<h3>Sign up now</h3>
                    <p>Register below to get instant access:</p>';
                  }
                ?>
              </div>
              <div class="form-top-right">
                <i class="fa fa-pencil"></i>
              </div>
            </div>
            <div class="form-bottom" style="display:<?php if(($_GET['redirect'])=='reg'){echo'none';}?>;">
                <form role="form" action="login_reg_scripts/proreg_iv.php" method="post" class="registration-form">
                  <div class="form-group">
                    <label class="sr-only" for="form-first-name">First name</label>
                      <input type="text" name="firstname1" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                  </div> 
                  <div class="form-group">
                    <label class="sr-only" for="form-last-name">Last name</label>
                      <input type="text" name="surname1" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-email">Email</label>
                    <input type="text" name="email1" placeholder="Email..." class="form-email form-control" id="form-email">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-email">Password</label>
                    <input type="password" name="password1" placeholder="Password..." class="form-email form-control" id="form-email">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="form-email">Confirm Password</label>
                    <input type="password" name="password2" placeholder="Confirm Password..." class="form-email form-control" id="form-email">
                  </div>
                  
                  <button type="submit" class="btn">Sign me up!</button>
                </form>
            </div>
          </div>

        </div>
        <?php
          }
          else
          {
            echo '<script type="text/javascript">';
            echo 'window.location.href="profile.php";';
            echo '</script>';
          }
        ?>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <?php
    include 'footer.php';
  ?>
  <script>
    //shortcut for $(document).ready
    var hash = window.location.hash;
    if (hash.substring(1) == 'error')
    {
        $(hash).modal('toggle');
    }
    if(hash.substring(1) == 'error1')
    {
        $(hash).modal('toggle');
    }
    if(hash.substring(1) == 'error2')
    {
        $(hash).modal('toggle');
    }
  </script>
