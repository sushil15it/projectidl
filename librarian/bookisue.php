<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");
$libraryid= $_SESSION["libraryId"];
$bkdb= $_SESSION["bkdb"];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/projectidl/img/idi circle-LOGO.png">
   
    <title>book isuue</title>
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
            background-color: rgb(8, 115, 17);
            color: white;
            font-size: 18px;
            padding: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: auto;
        }  @media screen and (max-width:680px) {
             
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
             
               
           }
           } @media screen and (max-width:760px) {
             .ov{
               background-color: white;
               min-width: 660px;
             
               
           }#clpopup {
               left: 0;
               transform: translate(-60%, -60%);
              
           }
         }
</style>
</head>
<body>
<?php require_once ("nav.php");          ?> 
      <script>
      document.getElementById("bookisue").classList.value="active";
    </script>
<main>  
     
 <div class="box1">
     <header>request to issue</header>
            <table>
                <thead>
                    <tr>
                        <th>book Id</th>
                        <th> book name</th>
                        <th>(Author)</th>
                        <th>publication</th>
                        <th>available book</th>
                        <th>isue book</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 $sqlbIsida= "SELECT  IssueId,stdId,BookId  FROM bookisse WHERE libraryId='$libraryid' AND IsseStatus='1'";
                 $result2 = mysqli_query($conn, $sqlbIsida);
                 if(mysqli_num_rows($result2) >0){
                     while($rowissue= mysqli_fetch_array($result2)){
                $bookid= $rowissue['BookId'];
              $bookissueid= $rowissue['IssueId'];
             ?>
              <tr> <td> 
                  <?php echo $bookid;?></td>
                        <?php  
               $sqlbookd = "SELECT  *  FROM $bkdb WHERE BookId='$bookid'";
               $result3 = mysqli_query($conn, $sqlbookd);
               if(mysqli_num_rows($result3)> 0){
             $rowbookde= mysqli_fetch_array($result3);
      }    ?>               <td><?php echo $rowbookde['bookName']; ?></td>
                        <td><?php echo $rowbookde['author']; ?></td>
                        <td><?php echo $rowbookde['publication']; ?></td>
                        <td><?php echo $rowbookde['avilable']; ?></td>
                        <form action="isue.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $rowissue['stdId']?>" name="popuserid">
                            <input type="hidden" value="<?php echo $bookid;?>" name="popbookid">
                            <input type="hidden" value="<?php echo $bookissueid;?>" name="popbkisueid">
                            <input type="hidden" value="<?php echo $rowbookde['bookName']; ?>" name="popbookn">
                            <input type="hidden" value="<?php echo $rowbookde['author']; ?>" name="popauthor">
                            <input type="hidden" value="<?php echo $rowbookde['avilable']; ?>" name="popavilable">
                        <td><button class="adbkbtn" type="submit">isue book</button></td>
                       </form>

                    </tr>
 
 <?php
 } }?>
                   
                </tbody>

</table>
           </div><br><br><br>
           <div class="box1">
     <header>issued book</header>
            <table>
                <thead>
                    <tr>
                        <th>book Id</th>
                        <th> book name</th>
                        <th>(Author)</th>
                        <th>publication</th>
                        <th>available book</th>
                        <th>no of days</th>
                        <th>collect book</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 $sqlbIsida= "SELECT  *  FROM bookisse WHERE libraryId='$libraryid' AND IsseStatus!='1'";
                 $result2 = mysqli_query($conn, $sqlbIsida);
                 if(mysqli_num_rows($result2) >0){
                     while($rowissue= mysqli_fetch_array($result2)){
                $bookid= $rowissue['BookId'];
              $bookissueid= $rowissue['IssueId'];
              $IsseStatus= $rowissue['IsseStatus'];
              $IssueDate= $rowissue['IssueDate']; 
              $currentdate= date('Y-m-d');
              $diff=strtotime($currentdate)-strtotime($IssueDate);
              $noofdays=abs(round($diff/86400));
             if($noofdays>12&&$IsseStatus<4){
                $sqlupis= "UPDATE  bookisse SET IsseStatus='4'  WHERE IsseStatus='3' AND IssueId='$bookissueid' ";
                            
                if( mysqli_query($conn, $sqlupis)){
                    $noofdays=(15-$noofdays)." days left";
                 ?><script>function reload1(){document.location.reload()}reload1()</script><?php
             }} else if($noofdays>15&&$IsseStatus<5){
                $sqlupis= "UPDATE  bookisse SET IsseStatus='5'  WHERE  IssueId='$bookissueid' ";
                            
                if( mysqli_query($conn, $sqlupis)){
                    $noofdays=($noofdays-15)." days late";
                 ?><script>function reload1(){document.location.reload()}reload1()</script><?php
             }}else if($IsseStatus==5){
                $noofdays=($noofdays-15)." days late";
             
            } 
             ?>
              <tr> <td> 
                  <?php echo $bookid;?></td>
                        <?php  
               $sqlbookd = "SELECT  *  FROM $bkdb WHERE BookId='$bookid'";
               $result3 = mysqli_query($conn, $sqlbookd);
               if(mysqli_num_rows($result3)> 0){
             $rowbookde= mysqli_fetch_array($result3);
      }    ?>               <td><?php echo $rowbookde['bookName']; ?></td>
                        <td><?php echo $rowbookde['author']; ?></td>
                        <td><?php echo $rowbookde['publication']; ?></td>
                        <td><?php echo $rowbookde['avilable']; ?></td>
                       <?php if($IsseStatus==2){
                         ?><td style="color:gray;"><?php echo $noofdays; ?></td><?php 
                        }else if($IsseStatus==3){
                            ?><td style="color: rgb(8, 115, 17),font-weight: bold;"><?php echo $noofdays; ?></td><?php 
                        }else if($IsseStatus==4){
                            ?><td style="color:rgb(255, 124, 1);font-style:italic;font-weight: bold;"><?php echo $noofdays; ?></td><?php 
                        }else if($IsseStatus==5){
                            ?><td style="color:red;font-style:italic;font-weight: bold;"><?php echo $noofdays; ?></td><?php 
                        }?>
                       
                        <form action="collectbook.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $rowbookde['avilable']; ?>" name="popavilable">
                            <input type="hidden" value="<?php echo $bookid?>" name="bookid">
                            <input type="hidden" value="<?php echo $bookissueid;?>" name="bookisueid">
                           <td><button class="adbkbtn" type="submit">collect book</button></td>
                       </form>

                    </tr>
 
 <?php
 } }?>
                   
                </tbody>

</table>
           </div><br><br><br>
        </main>
<?php
           require_once ("footer.php");
    ?>
</body></html>