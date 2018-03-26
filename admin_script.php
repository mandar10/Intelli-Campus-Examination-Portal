<?php

              include'all.php';
              $day=array('2018-02-1','2018-02-8','2018-02-15','2018-02-22');
              foreach ($day as $iday) {
                $room=1;
                $room_cap=30;
                $program=array('IT','CO','ME','EX');
                foreach($program as $iprogram)
                { 
                  $query1="SELECT * FROM courses WHERE dept='".$iprogram."' AND doe='9999-12-31' LIMIT 1" ;
                  $query_run1=mysqli_query($con,$query1);
                  $row1=mysqli_fetch_assoc($query_run1);
                  $course=$row1['name'];
                  $query2="UPDATE courses SET doe='".$iday."' WHERE name='".$course."' ";
                  $query_run2=mysqli_query($con,$query2);
                  //echo $iday.' '.$iprogram.' '.$course.'<br>';
                  $query3="SELECT * FROM login WHERE dept='".$iprogram."' " ;
                  $query_run3=mysqli_query($con,$query3);
                  while($row3=mysqli_fetch_assoc($query_run3))
                  {
                    $tempc= explode(",",$row3['courses']);
                    if(in_array($course,$tempc))
                    {
                      //echo $_SESSION['sap'].' '.$course.' '.$iday.' '.$room.'<br>';
                      $query4="INSERT INTO allocation VALUES('','".$row3['sap']."','".$course."','".$iday."','','','".$room."')";
                       $query_run4=mysqli_query($con,$query4);
                       $room_cap--;
                       if($room_cap==0)
                       {
                          $room++;
                          $room_cap=30;
                       }
                    }
                  }

                } 

              }
              echo 'Allocation done successfully';
              echo '<script type="text/javascript">';
              echo 'window.location.href="admin.php?redirect=true";';
              echo '</script>';
            ?>