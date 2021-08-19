<style>     /* pop up add book */
        
       
        </style>
<?php
  require_once ("../login/loginphp/conn.php");
 
  $libraryid= $_SESSION["libraryId"];
  $stdId;
    $sqlstd = "SELECT  *  FROM student WHERE libraryId='$libraryid'";
    $result2 = mysqli_query($conn, $sqlstd);
    if(mysqli_num_rows($result2)> 0){
       //match email and password
    
 while($rowstd= mysqli_fetch_array($result2)){
      $stdId=$rowstd["stdId"];
    $stdve=mb_strlen($stdId);
     if($stdve==6){
         $Id=$stdId."l".$libraryid;
        $stdicon=$rowstd["image"];
        $stdname=$rowstd["stdname"];
        ?>
         <div class="member">
          <div class="icon" id="icon<?php echo $Id;?>">
          <?php echo'<img src="/projectidl/login/loginphp/image/'. $stdicon.'" alt="">'?>
        </div>
          <div class="dbox">
              <div class="name">
                 <p id="username<?php echo $Id;?>"><?php echo $stdname;?></p>
              </div>
              <div class="status">
              <button onclick="popupshow2(this.id)" id="confirm<?php echo $Id;?>">confirm</button>
              <button onclick="popupshow2(this.id)" id="reject<?php echo $Id;?>">decline</button>
              </div>
          </div>
         </div> 
                  <?php
              }}
      
            }
               ?>
