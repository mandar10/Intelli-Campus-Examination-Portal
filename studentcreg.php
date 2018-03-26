<?php
  include'all.php';
?>

<style>
  .bg-title{
    background: rgba(221,75,57,1);
    background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(59%, rgba(221,75,57,1)), color-stop(97%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
    background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
    background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
    background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
    background: linear-gradient(to right, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dd4b39', endColorstr='#f16f5c', GradientType=1 );
  }

  .bg-title2{
    background: rgba(221,75,57,1);
    background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(27%, rgba(221,75,57,1)), color-stop(90%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
    background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
    background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
    background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
  }

  @media only screen and (max-width: 990px) {
    .pm, .pro-box{
      border-bottom:solid 1px silver;
      padding-bottom: 10px;
    }

    .boxzol{
      margin-bottom:20px;
    }

    .forum{
      margin-left:5px;
      margin-right:5px;
    }

    .forum2{
      margin-left:5px;
      margin-right:5px;
    }

    .topinfo{
      margin-left:2px;
      margin-right:2px;
    }
  }
  @media only screen and (min-width: 990px) {
    .pm{
      border-right:solid 1px silver;
      border-left:solid 1px silver;
    }

    .boxzol{
      margin-bottom:10px;
    }

    .topinfo{
      margin-left:10px;
      margin-right:10px;

    }

    .forum2{
      padding-left: 0px;
    }
  }
</style>

<!-- Content Wrapper. Contains page content -->
<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
      $user_id=$_GET['id'];
      $query="SELECT * FROM login WHERE id='".$user_id."'";
      $query_run=mysqli_query($con,$query);
      $rows=mysqli_fetch_assoc($query_run);
    }
?>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg1">
      <div class="modal-content" style="width:100%:">
        <div class="modal-header">
          <h3 class="modal-title" >People following <?php echo $rows["firstname"].' '.$surname;?></h3>
        </div>
        <div class="modal-body xsfonts" style="" id="folist"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg1">
      <div class="modal-content" style="width:100%:">
        <div class="modal-header">
          <h3 class="modal-title" >Poeple Followed by <?php echo $rows["firstname"].' '.$surname;?>'s </h3>
        </div>
        <div class="modal-body xsfonts" style="" id="folist2"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function modalfunc(type)
    {
      var divlist;
      if(type==1)
      {
        divlist = document.getElementById('folist');
      }
      else {
        divlist = document.getElementById('folist2');
      }
      while (divlist.firstChild) {
        divlist.removeChild(divlist.firstChild);
      }
      var xmlhttp=new XMLHttpRequest();
      if(type==1)
      {
        xmlhttp.open("GET","followlist.php?id="+<?php echo $user_id; ?>,false);
      }
      else {
        xmlhttp.open("GET","followinglist.php?id="+<?php echo $user_id; ?>,false);
      }
      xmlhttp.send(null);
      var userdata=xmlhttp.responseText;
      var userarr = userdata.split("/");
      for(i=0;i<userarr.length-1;i++)
      {
        var a = document.createElement('div'),
        img = document.createElement('img'),
        span =document.createElement('span'),
        button =document.createElement('button');
        a.class="row";
        a.style="padding:10px;"
        var subuser=userarr[i].split("~");
        span.innerHTML=subuser[1];
        span.style="margin-left:10px;";
        var uid=subuser[0];
        if(subuser[0].substring(0,7)=="default")
        {
          uid=subuser[0].substring(7);
          subuser[0]="default";
        }
        img.src='images/users/'+subuser[0]+'.jpg';
        img.height="50";
        img.width="50";
        button.id="button"+uid;
        button.type="button";
        button.style="background:green;color:white;float:right;margin-top:10px;"
        button.class="btn btn-success";
        button.innerHTML=subuser[2];
        var currbutton= document.getElementById("button"+uid);
        button.addEventListener("click", function(){followinc(this.id);}, false);
        a.appendChild(img);
        a.appendChild(span);
        if(subuser[2]!="")
          a.appendChild(button);
        divlist.appendChild(a);
      }
    }

    function followinc(id)
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.open("GET","followajax.php?id="+id.substring(6),false);
      xmlhttp.send(null);
      var userdata=xmlhttp.responseText;
      if(userdata=="pass")
      {
        var currbutton=document.getElementById(id);
        currbutton.innerHTML="Following";
      }

    }
  </script>
  
  <div class="content-wrapper">
    <div class="row" style="background-color:#ecf0f5;height:5px;"></div>
    <div class="row topinfo">
      <div class="col-md-12" style="padding-left:10px;padding-right:10px;">
        <div class="box boxzol" style="">
          <div class="box-header with-border bg-title2" style="">
            <h2 class="box-title" style="font-size:22px;color:white;">Admin Panel</h2>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
                             <?php
                    $db_host = "localhost";
                  $db_username = "root";
                  $db_password = "";
                  $db_name = "college";

                  $conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
                    //echo "connected successfully";
                    $Dept = 'IT';
                     $query = "SELECT name from courses WHERE dept = '$Dept' ";
                     $result1=mysqli_query($conn,$query);
                    
                  if($_GET['redirect']=='false')
                  {
                    ?>
                <div class="container">
                  <h2>Course Reg Form</h2>  
                  <form method="get" action="db_payment.php">
                          <?php 
                              $i=0;
                              while($row1=mysqli_fetch_array($result1))
                              {?>
                                 <input type="checkbox" name="courses<?php echo $i;?>" value="<?php echo $row1[0] ?>"> <?php echo $row1[0] ?> <br>
                                <?php
                                $i++;
                              }
                               ?> 
                           <input type="submit" class="btn" name="submit">    
                  </form>
                </div>
                <?php
                  }
                  else
                  {
                    echo "<center><h2>reg done</h2></center>";
                  }
                ?>
          </div>
          <!-- ./box-body -->
          <div class="box-footer">
            
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
}else
{
  echo '<script type="text/javascript">';
  echo 'window.location.href="login.php";';
  echo '</script>';
}
?>
<?php
include'footer.php';

?>
