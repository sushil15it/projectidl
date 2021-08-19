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
   
    <title>book store</title>
    <style>
            *{
              margin: 0;padding: 0;
            }
            body{
              width: 100%;
              height: 100%;
            }
            main {
            margin: auto;
            width: 90%;
           
            padding: 10px;
        }
        /* pop up add book */
        
        div.adbk {
            width: fit-content;
            height: 60px;
        }
        
        div.adbk {
            width: fit-content;
            height: 60px;
        }
        main .box1 table tbody tr td button.upbutton{
         
            border:1px  solid rgb(31, 107, 8);
            color: rgb(8, 115, 17);
            font-size: 18px;
            padding: 6px;
            border-radius: 8px;
            cursor: pointer;float: right;
        }
        div.adbk button#adbkbtn {
            margin: auto;
            background-color: rgb(31, 107, 8);
            color: white;
            font-size: 20px;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
        }
        main .box1 table tbody tr td button.upbutton:hover,
        #adbkbtn:hover {
            transform: translate(-8%, 0%);
            font-weight: bold;
            font-style: italic;
        }
        
        #popup {
            display: none;
        }
        
        #popup #adbform,
        #popup #upbform {
            width: fit-content;
            max-width: 80%;
            height: fit-content;
            border: 1px solid red;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 11;
            background-color: white;
            border-radius: 10px;
            padding: 10px;
            display: none;        
        }
        
        #overley {
            position: absolute;
            top: 0;
            right: 0;
            background-color: rgba(131, 130, 130, 0.788);
            width: 100%;
            height: 100vh;
            z-index: 10;
            cursor: pointer;
        }
        
        #clpopup {
            border: 1px solid rgb(252, 41, 41);
            background-color: rgba(131, 130, 130, 0.925);
            position: absolute;
            top: 0;
            right: 0;
            transform: translate(60%, -60%);
            cursor: pointer;
            width: 15px;
            text-align: center;
            border-radius: 50%;
        }
        /* form */
        
        form .inptbx {
            width: fit-content;
            margin: 10px 5px;
        }
        
        form header {
            font-size: 29px;
            font-weight: bold;
            width: fit-content;
            margin: auto;
            background-color: white;
            padding: 1px 8px;
            color: rgb(31, 107, 8);
        }
        
        form .inptbx p {
            font-size: 21px;
            width: fit-content;
            position: relative;
            top: 0px;
            margin: 5px;
            padding: 1px 8px;
            transform: translate(0px, 10px);
            background-color: white;
        }
        
        form .inptbx .inpt {
            outline: none;
            padding: 10px 5px 7px 10px;
            font-size: 21px;
            width: fit-content;
            border-radius: 10px;
            background-color: white;
            border: 1px solid rgb(148, 145, 145);
        }
        
        #adbktdb {
            background-color: rgb(31, 107, 8);
            color: white;
            font-size: 20px;
            width: 90%;
            margin: auto;
            display: block;
            outline: none;
            padding: 10px;
            border-radius: 15px;
            cursor: pointer;
        }
        
        #adbktdb:hover {
            width: 95%;
            font-size: 23px;
            font-weight: bold;
            font-style: italic;
        }
        /* } */
        
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
</head><body>
<?php require_once ("nav.php");          ?> 
<script>
    document.getElementById("bookstore").classList.value="active";
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
<div class="adbk">
           
            <div id="popup">
                
               
                <form id="upbform" action="/projectidl/student/reqbooki.php" method="POST" enctype="multipart/form-data">
                    <p id="clpopup" onclick=" closepopup()">x</p>
               <div  style="width: 100%;  overflow-y: auto;"><div class="ov"> <header>request to issue book </header>
                   <div style="display: flex;">
                     <div> <div class="inptbx">
                      <p>id:</p>
                        <span class="inpt" id="bookid" >1234</span>
                        <input  type="hidden" id="hbookid"  name="bookid" required>
                       
                    </div>
                    <div class="inptbx">
                      <p>author:</p>
                        <span class="inpt" id="author" >author</span>
                    </div></div>
                    <div><div class="inptbx">
                      <p>book name:</p>
                        <span class="inpt" id="bookname" >Book name</span>
                    </div><div class="inptbx">
                      <p>publication:</p>
                        <span class="inpt" id="publication" >publication</span>
                    </div></div>
                   </div>
                   
                   
                    </div>  <div>
                        <button type="submit" id="adbktdb"> send request</button>
                      </div> </div>  
                </form>
                
                <p id="overley" onclick=" closepopup()"></p>
            </div>

        </div>
<div class="box1">
    <header>book store</header>
            <table>
                <thead>
                    <tr>
                        <th>book Id  </th>
                        <th> book name</th>
                        <th>Author</th>
                        <th>publication</th>
                       
                        <th>available book</th>
                    </tr>
                </thead>
                <tbody>
                   
                   
               
<?php
  $bkdb=  $_SESSION["bkdbstd"];
  
    $sqlbook = "SELECT  *  FROM $bkdb ";
    $result1 = mysqli_query($conn, $sqlbook);
    if(mysqli_num_rows($result1)> 0){
      
   
 while($rowbook1= mysqli_fetch_array($result1)){
    $bookIdcp=$rowbook1["BookId"];
    $sqlbIsire= "SELECT 	BookId FROM bookisse WHERE stdId='$userid' AND BookId='$bookIdcp' ";
    $result1re = mysqli_query($conn, $sqlbIsire);
    if(mysqli_num_rows($result1re) <1){
     $row1re= mysqli_fetch_array($result1re);
    
    
  
      $bookId=$rowbook1["BookId"];
      $bookName=$rowbook1["bookName"];
      $author=$rowbook1["author"];
      $publication=$rowbook1["publication"];
     
      $avilable=$rowbook1["avilable"];
     
      ?>
      <tr>
        <td id="bookid<?php echo $bookId;?>"><?php echo $bookId;?></td>
        <td id="bookname<?php echo $bookId;?>"><?php echo $bookName;?></td>
        <td id="author<?php echo $bookId;?>"><?php echo $author;?></td>
        <td id="pub<?php echo $bookId;?>"><?php echo $publication;?></td>
        <td ><span id="tc<?php echo $bookId;?>"><?php echo $avilable;?></span>  <button class="upbutton" id="<?php echo $bookId ;?>" onclick="popupshow(this.id)"> request issue</button></td>
        
        
      </tr>
      <?php
              }}
           
            }
      
            
               ?>                

                </tbody>
            </table>
        </div><br><br><br>
        <p id="fx"></p>
        <script>
        popup = document.getElementById("popup");
        
       adbform=document.getElementById("adbform");
        function popupshow(a) {          
          popup.style.display = 'block';
          upbform.style.display= 'block';
            upfrminptinsrt(a);
           
         
        
        }function closepopup(){
            popup.style.display = 'none';

        }
        function upfrminptinsrt(a) {
var bookid=document.getElementById("bookid"+a).innerText;
var bookname=document.getElementById("bookname"+a).innerText;
var author=document.getElementById("author"+a).innerText;
var pub=document.getElementById("pub"+a).innerText;
document.getElementById("bookid").innerText = bookid;

document.getElementById("hbookid").value = bookid;

document.getElementById("bookname").innerText = bookname;

document.getElementById("author").innerText =author;

document.getElementById("publication").innerText = pub;

}
    </script>
    </main>
<?php
           require_once ("footer.php");
           ?>
</body></html>