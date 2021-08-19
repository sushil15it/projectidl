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
   
    <title>issued book</title>
    <style>
      main {
            margin: auto;
            width: 90%;
            min-height: 88vh;
            padding: 10px;
        }
        
        .box1 table,
        .box1 th {
            font-size: 20px;
            padding: 5px;
            border-collapse: collapse;
            border: 2px solid rgb(8, 115, 17);
        }
        
        .box1 tr,
        .box1 td {
            padding: 3px;
            border-collapse: collapse;
            border: .2px solid rgb(8, 115, 17);
        }
        
        .box1 {
            margin: 20px 0px 5px 0px;
        }
        .box1 header{
            width: fit-content;display: block;margin: auto;font-size: 24px;font-weight: bold;margin-bottom: 10px;border-bottom: 2.5px solid gray;
        }
        .box1 table {
            width: 100%;
        }
        
        .box1 table tbody tr td button {
            
            font-size: 18px;
            padding: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: auto;
        }
        @media screen and (max-width:680px) {
             
             main {
              
              width: 98%;
             
          }.box1 table {
           margin: auto;
              width: 70%;
          }
          .box1 table,
           .box1 th {
               font-size: 16px;
               padding: 2px;
               border: 1px solid rgb(8, 115, 17);
           }.box1{
              width: 100%;overflow-y: auto;
            
           } div.adbk button#adbkbtn {
               font-size: 15px;
               padding: 6px;
           }
           
           #adbkbtn:hover {
               font-size: 18px;
             }.ov{
               background-color: white;
               min-width: fit-content;
             
               
           } .box1 header{
           font-size: 16px;
        }
           } @media screen and (max-width:760px) {
             .ov{
               background-color: white;
               min-width: 660px;
             
               
           }#clpopup {
               left: 0;
               transform: translate(-60%, -60%);
              
           }
           .box1 header{
           font-size: 18px;
        }
         }
</style>
    </head><body>
<?php require_once ("nav.php");          ?> 
<script>
    document.getElementById("isuehistory").classList.value="active";
</script>
<main>
<div class="box1">
    <header>requsest too issue</header>
            <table>
                <thead>
                    <tr>
                        <th>issue Id  </th>
                        <th>book Id  </th>
                        <th> book name</th>
                        <th>Author</th>
                        <th>publication</th>
                       
                    </tr>
                </thead>
                <tbody>
                   
                   
               
                <?php
 $sqlbkid1= "SELECT  * FROM bookisse WHERE stdId='$userid' AND  IsseStatus=1 ";
 $resultbkid1 = mysqli_query($conn, $sqlbkid1);
 if(mysqli_num_rows($resultbkid1) >0){
   
   
    while($rowbkid1= mysqli_fetch_array($resultbkid1)){
        $Issueid= $rowbkid1['IssueId']; 
        $IsseStatus= $rowbkid1['IsseStatus'];
        $bookid= $rowbkid1['BookId'];
             $sqlbkd2 = "SELECT bookName,author,publication FROM $bkdb WHERE BookId='$bookid'";
     $resultbkd2 = mysqli_query($conn, $sqlbkd2);
     if(mysqli_num_rows($resultbkd2)> 0){
         $rowbkde2= mysqli_fetch_array($resultbkd2);
       
     } 
    
    ?>
      <tr><td><?php echo $Issueid;?></td>
        <td><?php echo $bookid;?></td>
        <td><?php echo $rowbkde2['bookName'];?></td>
        <td><?php echo $rowbkde2['author'];?></td>
        <td><?php echo $rowbkde2['publication']?></td>

        
        
        
      </tr>
      <?php   
    
}

}
?>               

                </tbody>
            </table>
        </div><br><br><br>
        <div class="box1">
    <header>book wait for recive (this book is issued for 15days)</header>
            <table>
                <thead>
                    <tr>
                        <th>issue Id  </th>
                        <th>book Id  </th>
                        <th> book name</th>
                        <th>Author</th>
                        <th>publication</th>
                       
                        <th>recive book</th>
                    </tr>
                </thead>
                <tbody>
                   
                   
               
                <?php
 $sqlbkid1= "SELECT  * FROM bookisse WHERE stdId='$userid' AND  IsseStatus=2 ";
 $resultbkid1 = mysqli_query($conn, $sqlbkid1);
 if(mysqli_num_rows($resultbkid1) >0){
   
   
    while($rowbkid1= mysqli_fetch_array($resultbkid1)){
        $Issueid= $rowbkid1['IssueId']; 
        $IsseStatus= $rowbkid1['IsseStatus'];
        $bookid= $rowbkid1['BookId'];
             $sqlbkd2 = "SELECT bookName,author,publication FROM $bkdb WHERE BookId='$bookid'";
     $resultbkd2 = mysqli_query($conn, $sqlbkd2);
     if(mysqli_num_rows($resultbkd2)> 0){
         $rowbkde2= mysqli_fetch_array($resultbkd2);
       
     } 
    
    ?>
      <tr><td><?php echo $Issueid;?></td>
        <td><?php echo $bookid;?></td>
        <td><?php echo $rowbkde2['bookName'];?></td>
        <td><?php echo $rowbkde2['author'];?></td>
        <td><?php echo $rowbkde2['publication']?></td>

        <td><form action="recivebook.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $Issueid;?>" name="bookissueid">
                            <button type="submit" style="color:red;font-style:italic;font-weight: bold;"><?php echo "recive book"; ?></button></form>
                        </td>
        
        
      </tr>
      <?php   
    
}

}
?>               

                </tbody>
            </table>
        </div><br><br><br><div class="box1">
    <header>your active book</header>
            <table>
                <thead>
                    <tr>
                        <th>issue Id  </th>
                        <th>book Id  </th>
                        <th> book name</th>
                        <th>Author</th>
                        <th>publication</th>
                       
                        <th>no of days left</th>
                    </tr>
                </thead>
                <tbody>
                   
                   
               
                <?php
 $sqlbkid1= "SELECT  * FROM bookisse WHERE stdId='$userid' AND  IsseStatus=3 ";
 $resultbkid1 = mysqli_query($conn, $sqlbkid1);
 if(mysqli_num_rows($resultbkid1) >0){
   
   
    while($rowbkid1= mysqli_fetch_array($resultbkid1)){
        $Issueid= $rowbkid1['IssueId']; 
        $IsseStatus= $rowbkid1['IsseStatus'];
        $bookid= $rowbkid1['BookId'];
        $IssueDate= $rowbkid1['IssueDate']; 
        $currentdate= date('Y-m-d');
        $diff=strtotime($currentdate)-strtotime($IssueDate);
        $noofdays=abs(round($diff/86400));
       
        if($IsseStatus==3){
              $noofdays=(15-$noofdays)." days left";

       } 
             $sqlbkd2 = "SELECT bookName,author,publication FROM $bkdb WHERE BookId='$bookid'";
     $resultbkd2 = mysqli_query($conn, $sqlbkd2);
     if(mysqli_num_rows($resultbkd2)> 0){
         $rowbkde2= mysqli_fetch_array($resultbkd2);
       
     } 
    
    ?>
      <tr><td><?php echo $Issueid;?></td>
        <td><?php echo $bookid;?></td>
        <td><?php echo $rowbkde2['bookName'];?></td>
        <td><?php echo $rowbkde2['author'];?></td>
        <td><?php echo $rowbkde2['publication']?></td>

        <td><button style="color:rgb(13, 85, 3);font-style:italic;font-weight: bold;"><?php echo $noofdays;?></button></td>
        
        
      </tr>
      <?php   
    
}

}
?>               

                </tbody>
            </table>
        </div><br><br><br><div class="box1">
    <header>bounced return date (this book is issued for only  15days)</header>
            <table>
                <thead>
                    <tr>
                        <th>issue Id  </th>
                        <th>book Id  </th>
                        <th> book name</th>
                        <th>Author</th>
                        <th>publication</th>
                       
                        <th style="color:red;font-style:italic;font-weight: bold;">no of days exced</th>
                    </tr>
                </thead>
                <tbody>
                   
                   
               
                <?php
 $sqlbkid1= "SELECT  * FROM bookisse WHERE stdId='$userid' AND  IsseStatus=5 ";
 $resultbkid1 = mysqli_query($conn, $sqlbkid1);
 if(mysqli_num_rows($resultbkid1) >0){
   
   
    while($rowbkid1= mysqli_fetch_array($resultbkid1)){
        $Issueid= $rowbkid1['IssueId']; 
        $IsseStatus= $rowbkid1['IsseStatus'];
        $bookid= $rowbkid1['BookId'];
        $IssueDate= $rowbkid1['IssueDate']; 
        $currentdate= date('Y-m-d');
        $diff=strtotime($currentdate)-strtotime($IssueDate);
        $noofdays=abs(round($diff/86400));
       
        if($IsseStatus==5){
              $noofdays=($noofdays-15)." days exced";

       } 
             $sqlbkd2 = "SELECT bookName,author,publication FROM $bkdb WHERE BookId='$bookid'";
     $resultbkd2 = mysqli_query($conn, $sqlbkd2);
     if(mysqli_num_rows($resultbkd2)> 0){
         $rowbkde2= mysqli_fetch_array($resultbkd2);
       
     } 
    
    ?>
      <tr><td><?php echo $Issueid;?></td>
        <td><?php echo $bookid;?></td>
        <td><?php echo $rowbkde2['bookName'];?></td>
        <td><?php echo $rowbkde2['author'];?></td>
        <td><?php echo $rowbkde2['publication']?></td>
        <td><button style="color:red;font-style:italic;font-weight: bold;"><?php echo $noofdays;?></button></td>
       
        
        
      </tr>
      <?php   
    
}

}
?>               

                </tbody>
            </table>
        </div><br><br><br>

</main>
<?php
           require_once ("footer.php");
           ?>
</body></html>