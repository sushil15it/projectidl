<?php
require_once ("../login/loginphp/conn.php");
require_once ("sessionver.php");
$userid=$_SESSION["useridstd"];
$libraryid= $_SESSION["libraryIdstd"];
$bkdb= $_SESSION["bkdbstd"];
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/projectidl/img/idi circle-LOGO.png">
   
    <title>welcome</title>
    <style>        /* } */
        
        ::-webkit-scrollbar {
           width: 4px;
       }
       
       body::-webkit-scrollbar {
           width: 0px;
       }
       
       .isued::-webkit-scrollbar-thumb {
           background-color: rgb(0, 230, 38);
       }
       
       .returnalert::-webkit-scrollbar-thumb {
           background-color: red;
       }
       
       .returnalert::-webkit-scrollbar-thumb {
           background-color: red;
       }
       
       main {
           width: 98.5%;
           margin: auto;
           display: grid;
           grid-template-columns: 20% 70%;
           justify-content: space-between;
       }
       
       .box0,
       main div.box1 {
           padding-left: 15px;
       }
       /* return book */
       
       header {
           width: fit-content;
           margin: auto;
           font-size: 25px;
           padding: 8px;
           border-bottom: 2px solid gray;
       }
       
       main .box1 .returnalert {
           height: 39vh;
           width: 99%;
           overflow: auto;
           border-bottom: 2px solid gray;
           border-bottom-right-radius: 5px;
       }
       
       main .box1 .isued {
           height: 52.5vh;
           width: 99%;
           overflow: auto;
       }
       
       main .box1 .returnalert header {
           color: rgb(250, 10, 10);
       }
       
       .isued header {
           color: rgb(39, 186, 17);
       }
       
       main .box1 .member {
           margin-bottom: 5px;
           border-left: 2.5px solid rgb(13, 85, 3);
           border-bottom: 2.5px dotted rgb(13, 85, 3);
       }
       
       main .box1 .returnalert .member {
           border-bottom: 3px dotted rgb(255, 0, 0);
       }
       
       main .box1 .member .bki {
           width: 85%;
           padding: 5px;
       }
       
       main .box1 .member .numofbk {
           transform: translate(-150%, 250%);
           float: right;
           width: 8px;
           border-radius: 50%;
           text-align: center;
           height: 8px;
           background-color: rgb(13, 85, 3);
       }
       
       main .box1 .returnalert .member .numofbk {
           background-color: rgb(248, 9, 9);
       }
       /* boxmiddl */
       
       .box0 p {
           width: fit-content;
           margin: auto;
           font-size: 20px;
           padding: 8px;
       }
       
       .box0 .box02 {
           border-top: 2.5px dotted gray;
           border-bottom: 2.5px dotted gray;
       }</style>
</head><body>
<?php require_once ("nav.php");          ?> 
<script>
    document.getElementById("home").classList.value="active";
</script>
<?php
$sqllib = "SELECT  *  FROM librarydetail WHERE libraryId='$libraryid'";
$result2 = mysqli_query($conn, $sqllib);
if(mysqli_num_rows($result2) ==1){
   //match email and password
    $rowlib= mysqli_fetch_array($result2);
    $_SESSION["libName"]=$rowlib["libName"];
    $discription=$rowlib["Descrition"];
    $about=$rowlib["About"];

} 
?>


<main>
        <div class="box1">
            <div class="returnalert">
                <header>return alert</header>
                <div>
                <?php
 $sqlbkid1= "SELECT  * FROM bookisse WHERE stdId='$userid' AND IsseStatus>3";
 $resultbkid1 = mysqli_query($conn, $sqlbkid1);
 if(mysqli_num_rows($resultbkid1) >0){
   
   
    while($rowbkid1= mysqli_fetch_array($resultbkid1)){
      
             $IssueDate= $rowbkid1['IssueDate']; 
             $IsseStatus= $rowbkid1['IsseStatus']; 
              $currentdate= date('Y-m-d');
              $diff=strtotime($currentdate)-strtotime($IssueDate);
              $noofdays=abs(round($diff/86400));
              $bookid= $rowbkid1['BookId'];
              if($IsseStatus==4){
                    $noofdays=(15-$noofdays)." days left";
      
             } else if($IsseStatus==5){
                $noofdays=($noofdays-15)." days late";
                        } 
 

     $sqlbkd2 = "SELECT  bookName FROM $bkdb WHERE BookId='$bookid'";
     $resultbkd2 = mysqli_query($conn, $sqlbkd2);
     if(mysqli_num_rows($resultbkd2)> 0){
         $rowbkde2= mysqli_fetch_array($resultbkd2);
       
     } 
    
    ?>
            <div class="member">
                        <div class="numofbk"></div>
                        <div class="bki">
                            <div id="bkid">
                          <?php  if($IsseStatus==4){
                            ?><span style="color:rgb(255, 124, 1);font-style:italic;font-weight: bold;"><?php echo $noofdays; ?></span><?php 
                        }else if($IsseStatus==5){
                            ?><span style="color:red;font-style:italic;font-weight: bold;"><?php echo $noofdays; ?></span><?php 
                        }?>
                                <p><?php echo $bookid; ?></p>
                            </div>
                            <div id="bkname">
                                <p><?php echo $rowbkde2['bookName']; ?></p>
                            </div>
                        </div>
                    </div>
    <?php
    
    
    }
   
    }
    ?>
                   
                   
                </div>
            </div>
            <div class="isued">
                <header>active book</header>

                <div>

                <?php
 $sqlbkid1= "SELECT  * FROM bookisse WHERE stdId='$userid' AND IsseStatus<4 AND IsseStatus>1 ";
 $resultbkid1 = mysqli_query($conn, $sqlbkid1);
 if(mysqli_num_rows($resultbkid1) >0){
   
   
    while($rowbkid1= mysqli_fetch_array($resultbkid1)){
        $Issueid= $rowbkid1['IssueId']; 
             $IssueDate= $rowbkid1['IssueDate']; 
             $IsseStatus= $rowbkid1['IsseStatus']; 
              $currentdate= date('Y-m-d');
              $diff=strtotime($currentdate)-strtotime($IssueDate);
              $noofdays=abs(round($diff/86400));
              $bookid= $rowbkid1['BookId'];
              if($IsseStatus==3){
                    $noofdays=(15-$noofdays)." days left";
      
             } 
 

     $sqlbkd2 = "SELECT  bookName FROM $bkdb WHERE BookId='$bookid'";
     $resultbkd2 = mysqli_query($conn, $sqlbkd2);
     if(mysqli_num_rows($resultbkd2)> 0){
         $rowbkde2= mysqli_fetch_array($resultbkd2);
       
     } 
    
    ?>
            <div class="member">
                        <div class="numofbk"></div>
                        <div class="bki">
                            <div id="bkid">
                          <?php  if($IsseStatus==3){
                            ?><button style="color:rgb(13, 85, 3);font-style:italic;font-weight: bold;"><?php echo $noofdays; ?></button><?php 
                        }else if($IsseStatus==2){
                            ?><form action="recivebook.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $Issueid;?>" name="bookissueid">
                            <button type="submit" style="color:red;font-style:italic;font-weight: bold;"><?php echo "recive book"; ?></button></form><?php 
                        }?>
                                <p><?php echo $bookid; ?></p>
                            </div>
                            <div id="bkname">
                                <p><?php echo $rowbkde2['bookName']; ?></p>
                            </div>
                        </div>
                    </div>
    <?php
    
    
    }
   
    }
    ?>
                 
                </div>
            </div>
        </div>
        <div class="box0">
            <div class="box01">
                <header id="hder1">discription</header>
                <p id="inrtxt1"><?php echo $discription;?>   </p>
            </div><br><br><br><br>
            <div class="box02">
                <header id="hder2">about you</header>
                <p id="inrtxt2"><?php echo $about; ?>    </p>
            </div>


        </div>


    </main>
<?php
           require_once ("footer.php");
           ?>
</body></html>