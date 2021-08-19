<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/projectidl/img/idi circle-LOGO.png">
   
    <title>bookbank</title>
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
            position: fixed;
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
</head>
<body>
    <?php require_once ("nav.php");          ?> 
      <script>
      document.getElementById("bookbank").classList.value="active";
    </script>

   
<main>
        <div class="adbk">
            <button id="adbkbtn" onclick="popupshow('adbform',0)">add book</button>
            <div id="popup">
                
                <form id="adbform" action="/projectidl/librarian/bookUpAdd.php" method="POST" enctype="multipart/form-data">
                    <p id="clpopup" onclick=" closepopup()">x</p>
                <div style="width: 100%;  overflow-y: auto;"><div class="ov"> <header>add book</header>
                    <div class="inptbx">
                        <p>id</p>
                        <input class="inpt" type="text" placeholder="id" name="bookid" required>
                    </div>
                    <div class="inptbx">
                        <p>book name</p>
                        <input class="inpt" type="text" placeholder="book name $ edition" name="bookName" required>
                    </div>
                    <div class="inptbx">
                        <p>author</p>
                        <input class="inpt" type="text" placeholder="book writer" name="author" required>
                    </div><div class="inptbx">
                        <p>publication</p>
                        <input class="inpt" type="text" placeholder="publication" name="publication" required>
                    </div>
                    <div class="inptbx">
                        <p>quantity</p>
                        <input class="inpt" type="number" placeholder="100" name="quantity" required>
                    </div>
                    </div> <div><button type="submit" id="adbktdb">add</button></div>
                </div> 
                         </form>
                <form id="upbform" action="/projectidl/librarian/bookUpAdd.php" method="POST" enctype="multipart/form-data">
                    <p id="clpopup" onclick=" closepopup()">x</p>
               <div  style="width: 100%;  overflow-y: auto;"><div class="ov"> <header>update book copy number</header>
                   <div style="display: flex;">
                     <div> <div class="inptbx">
                      <p>id:</p>
                        <span class="inpt" id="bookid" >1234</span>
                        <input  type="hidden" id="hbookid" placeholder="id" name="bookid" required>
                        <input  type="hidden" id="quantityh" placeholder="id" name="oldquantity" required>
                        <input  type="hidden" id="avilable" placeholder="id" name="avilable" required>
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
                    <div class="inptbx">
                        <p>quantity</p>
                        <input class="inpt" id="quantity" type="number" placeholder="100" name="quantity" required>
                    </div>
                   
                    </div>  <div>
                        <button type="submit" id="adbktdb">update</button>
                      </div> </div>  
                </form>
                
                <p id="overley" onclick=" closepopup()"></p>
            </div>

        </div>
        <div class="box1">
            <table>
                <thead>
                    <tr>
                        <th>book Id  </th>
                        <th> book name</th>
                        <th>Author</th>
                        <th>publication</th>
                        <th>tootal no of book</th>
                       
                        <th>available book</th> <th>in use</th>
                    </tr>
                </thead>
                <tbody>
                   
                   
               
<?php
  $bkdb=  $_SESSION["bkdb"];
 
    $sqlbook = "SELECT  *  FROM $bkdb ";
    $result1 = mysqli_query($conn, $sqlbook);
    if(mysqli_num_rows($result1)> 0){
      
    $bknum=0;
 while($rowbook= mysqli_fetch_array($result1)){
   $bknum++;
      $bookId=$rowbook["BookId"];
      $bookName=$rowbook["bookName"];
      $author=$rowbook["author"];
      $publication=$rowbook["publication"];
      $totalcopy=$rowbook["totalcopy"];
      $avilable=$rowbook["avilable"];
      $inuse=$rowbook["totalcopy"] - $rowbook["avilable"];
      ?>
      <tr>
        <td id="bookid<?php echo $bookId;?>"><?php echo $bookId;?></td>
        <td id="bookname<?php echo $bookId;?>"><?php echo $bookName;?></td>
        <td id="author<?php echo $bookId;?>"><?php echo $author;?></td>
        <td id="pub<?php echo $bookId;?>"><?php echo $publication;?></td>
        <td ><span id="tc<?php echo $bookId;?>"><?php echo $totalcopy;?></span>  <button class="upbutton" id="<?php echo $bookId ;?>" onclick="popupshow('upbform',this.id)">  update</button></td>
        <td id="avilable<?php echo $bookId; ?>"><?php echo $avilable;?></td>
        <td><?php echo $inuse;?></td>
      </tr>
      <?php
              }
              $_SESSION["BookNum"]=$bknum;
            }
      
            
               ?>                

                </tbody>
            </table>
        </div><br><br><br>
        <p id="fx"></p>
    </main>
    <script>
        popup = document.getElementById("popup");
        clpopup = document.getElementById("clpopup");
        overley = document.getElementById("overley");
       adbform=document.getElementById("adbform");
        function popupshow(a,b) {          
          popup.style.display = 'block';
          if(a=="adbform"){
            adbform.style.display= 'block';
            upbform.style.display= 'none';
           
          }else{
            upfrminptinsrt(b);
            upbform.style.display= 'block';
            adbform.style.display= 'none';
           
          }
        }function closepopup(){
            popup.style.display = 'none';

        }
        function upfrminptinsrt(b) {
var bookid=document.getElementById("bookid"+b).innerText;
var bookname=document.getElementById("bookname"+b).innerText;
var author=document.getElementById("author"+b).innerText;
var pub=document.getElementById("pub"+b).innerText;
var tc=document.getElementById("tc"+b).innerText;
var avilable=document.getElementById("avilable"+b).innerText;

document.getElementById("quantityh").value = tc;
document.getElementById("bookid").innerText = bookid;
document.getElementById("avilable").value = avilable;

document.getElementById("hbookid").value = bookid;

document.getElementById("bookname").innerText = bookname;

document.getElementById("author").innerText =author;

document.getElementById("publication").innerText = pub;

document.getElementById("quantity").value = tc;
}
    </script>
    <?php
           require_once ("footer.php");
    ?>
</body>
</html>