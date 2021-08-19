
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
     if($stdve>8){
        $Id=$stdId."l".$libraryid;
        $stdicon=$rowstd["image"];
        $stdname=$rowstd["stdname"];
        $activebookno=$rowstd["activeBookNum"];
        ?>
         <div class="member">
         

         <div class="icon" id="icon<?php echo $Id;?>">
          <?php echo'<img src="/projectidl/login/loginphp/image/'. $stdicon.'" alt="">'?>
        </div>   <div class="dbox">

                <div class="status">

                <button style="border:none;background-color:white;" id="username<?php echo $Id;?>"><?php echo $stdname;?></button>
                <button style="color:red; float: right;" onclick="popupshow2(this.id)" id="reject<?php echo $Id;?>">remove</button>
             
                </div>
                <div class="name">
                    <p>
                        <?php echo $activebookno."  "; ?><span>book active</span> </p>
                </div>
            </div>
        </div>
                  <?php
              }}
      
            }
               ?>
