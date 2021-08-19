<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");
$userid=$_SESSION["userid"];
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
   
    <title>welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-transform: capitalize;
        }
        
        body {
            width: 100%;
            height: 100%;
        }
        /* navbar css {*/
        
        ul li {
            list-style: none;
        }
        
        a {
            text-decoration: none;
            color: unset;
        }
        
         ::-webkit-scrollbar {
            width: 4px;
        }
        
        #inpt::-webkit-scrollbar {
            width: 9px;
        }
        
        body::-webkit-scrollbar {
            width: 0px;
        }
        
        .boxl::-webkit-scrollbar-thumb,
        #inpt::-webkit-scrollbar-thumb {
            background-color: red;
        }
        
        .box0::-webkit-scrollbar-thumb {
            background-color: red;
        }
        /* main */
        
        main {
            width: 100%;
            margin: auto;
            display: grid;
            grid-template-columns:auto auto auto;
            justify-content: space-between;position: relative;
        }
        
       
        .boxl {
            padding: 5px;
            height: 93.3vh;
            overflow: auto;width: 255px;
        }
        
        .box0 {
            padding: 5px;
            height: 93.3vh;
            overflow: auto;
            position: relative;
            width:calc(100%-520px);
            border-top: none;
            border-bottom: none;
            margin: 10px;
        }
        
        @media screen and (max-width: 1050px) {
            main {
                display: block;
              
            }
           div.b1 {
                width:255px;margin: auto;
               
                float: left;
                height: 40vh;
                overflow: auto;
            }
            .b3{
                width:60%;margin: auto;
                 height: fit-content;
                overflow: auto;
            }
            .box0 {
                margin: auto;
                width:60%;
              max-height: 90%;
              height: fit-content;
                overflow: auto;
            }
        }
        
        @media screen and (max-width: 638px) {
            main {
                display: block;
            }
            .b1,.b3 {
                margin: auto;
              min-width: 95%;
                height: 40vh;
                overflow: auto;
            }
            .box0 {
                display: block;
                margin: auto;
                width: 95%;
                overflow: auto;
            }
        }
        
        header {
            width: fit-content;
            margin: auto;
            font-size: 20px;
            padding: 8px;
            border-bottom: 2px solid gray;
        }
        /* issue book */
        
        main .boxl .member .numofbk {
            margin: auto 8px;
            width: 20px;
            height: 20px;
            font-size: 20px;
            text-align: center;
            border-radius: 50%;
            color: white;
            background-color: rgba(72, 105, 39, 0.918);
        }
        
        main .boxl .member .bki,
        main .boxl .member .bki p {
            font-size: 15px;
            max-width: 100%;
            overflow: hidden;
            margin-bottom: 5px;
        }
        /* boxmiddl */
        
        .box0 p {  min-width:fit-content;
            margin: auto;
            font-size: 20px;
            padding: 8px;
        }
        
        .box0 .box02 {
            border-top: 2.5px dotted gray;
            border-bottom: 2.5px dotted gray;
        }
        /* pop up add book */
        
        button#adbkbtn {
            color: rgb(31, 107, 8);
            font-size: 20px;
            border: none;
            width: fit-content;
            outline: none;
            transform: translate();
            background-color: inherit;
            cursor: pointer;
        }
        
        #adbkbtn:hover {
            transform: translate(4%, -10%);
            font-size: 28px;
        }
        
        #popup {
            display: none;
        }
        
        #popup form#adbform {
            min-width: 200px;
            width: 80%;
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
        }
        
        #overley {
            position: fixed;
            top: 0;
            right: 0;
            background-color: rgba(131, 130, 130, 0.788);
            width: 100%;
            height: 100%;
            z-index: 10;
            cursor: pointer;
        }
        
        #clpopup {
            border: 1px solid rgb(252, 41, 41);
            background-color: rgba(131, 130, 130, 0.925);
            position: absolute;
            top: 0;
            right: 0;
            transform: translate(50%, -50%);
            cursor: pointer;
            width: fit-content;
            text-align: center;
            border-radius: 50%;
        }
        /* form */
        
        #adbform .inptbx #inptbxn {
            font-size: 25px;
            background-color: white;
            transform: translate(-10px, -20px);
            padding: 5px 15px;
            cursor: default;
        }
        
        #adbform .inptbx {
            font-size: 25px;
            margin-top: 15px;
            margin-bottom: 60px;
            min-height: 150px;
            border-radius: 20px;
            border: 1px solid gray;
        }
        
        #adbform .inptbx #inpt {
            font-size: 20px;
            width: 90%;
            min-height: 100px;
            height: 95%;
            outline: none;
            padding: 8px;
            border: none;
        }
        
        #adbktdb {
            color: white;
            width: 90%;
            height: 50px;
            margin: auto;
            display: block;
            font-size: 25px;
            background-color: rgb(9, 70, 11);
            border: 1x solid gray;
            border-radius: 20px;
            transform: translate(0, 60px);
        }
        /* memebership request */
        
        main .boxl .member {
            width: 100%;
            margin: 5px auto;
            display: grid;
            grid-template-columns: max-content auto;
                   border-left: 2.5px solid rgba(72, 105, 39, 0.918);
            border-bottom: 1.5px dotted rgba(72, 105, 39, 0.918);
        }
        
        main .boxl .member .icon img {
            margin: auto;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid rgba(196, 197, 195, 0.918);
        }
        
        main .boxl .member .status,
        main .boxl .member .name p {
            font-size: 20px;
            text-align: center;
        }
        
        main .boxl .member .status a {
            color: rgba(72, 105, 39, 0.918);
            border: 2px solid rgba(196, 197, 195, 0.918);
        }
        
    </style>
</head>

<body>
    <?php
    $sqluser= "SELECT  *  FROM librarian WHERE email='$userid'";
    $result1 = mysqli_query($conn, $sqluser);
    if(mysqli_num_rows($result1) ==1){
       //match email and password
        $rowuser= mysqli_fetch_array($result1);
       $_SESSION["rowuser"]=$rowuser;
      
    
    } 
    $sqllib = "SELECT  *  FROM librarydetail WHERE libraryId='$libraryid'";
    $result2 = mysqli_query($conn, $sqllib);
    if(mysqli_num_rows($result2) ==1){
       //match email and password
        $rowlib= mysqli_fetch_array($result2);
        $_SESSION["libName"]=$rowlib["libName"];
      
        $_SESSION["BookNum"]=$rowlib["BookNum"];
      
        $_SESSION["OrgName"]=$rowlib["OrgName"];
    
    } 
    ?>
   <?php require_once ("nav.php");          ?> 
<script>
    document.getElementById("home").classList.value="active";
</script>
    <main>
        <div class="boxl b1">
        <header> request to issue </header>
            <div>
        <?php
 $sqlbkid1= "SELECT  BookId,IssueId   FROM bookisse WHERE libraryId='$libraryid' AND IsseStatus='1'";
 $resultbkid1 = mysqli_query($conn, $sqlbkid1);
 if(mysqli_num_rows($resultbkid1) >0){
    $bookid=null;
    $bookidp=array();
    $ii=1;
   
    while($rowbkid1= mysqli_fetch_array($resultbkid1)){
        $bookid= $rowbkid1['BookId'];
        $numbook1=0;
        
        if( array_search( $bookid,$bookidp )){
            continue;
        }
     
     $bookidp[$ii]= $bookid;
     $ii++;
     $IssueId = $rowbkid1['IssueId'];
 ?>    <?php
 $sqlbkid2= "SELECT  BookId  FROM bookisse WHERE libraryId='$libraryid' AND IsseStatus='1' AND BookId='$bookid'";
 $resultbkid2 = mysqli_query($conn, $sqlbkid2);
 if(mysqli_num_rows($resultbkid2) >0){
     
    while($rowbkid2= mysqli_fetch_array($resultbkid2)){
$numbook1++;
     }

     $sqlbkd1 = "SELECT  bookName FROM $bkdb WHERE BookId='$bookid'";
     $resultbkd1 = mysqli_query($conn, $sqlbkd1);
     if(mysqli_num_rows($resultbkd1)> 0){
         $rowbkde= mysqli_fetch_array($resultbkd1);
 
     } 
    
    }?>
                <div class="member" onclick="location.href='bookisue.php'">
                    <div class="numofbk"><?php echo $numbook1; ?></div>
                    <div class="bki">
                        <div id="bkid">
                            <p><?php echo $bookid;  ?></p>
                        </div>
                        <div id="bkname">
                            <p><?php echo $rowbkde['bookName']; ?></p>
                        </div>
                    </div>
                </div>
    <?php 
    }}?>
    
   



           

               
              

            </div>
        </div>
        <div class="box0 b2">
            <div class="box01">
                <header id="hder1">discription</header>
                <?php
            $discription=$rowlib["Descrition"];
            
            ?>
                <p id="inrtxt1">  <?php echo $discription;?>   
                 </p> <button id="adbkbtn" onclick="popupshow(1)">...edit..</button>


            </div>
            <div class="box02">
            <?php
            $about=$rowlib["About"];
            
            ?>
                <header id="hder2">about</header>
                <p id="inrtxt2"><?php echo $about;?>            </p> <button id="adbkbtn" onclick="popupshow(2)">...edit..</button>
            </div>
            <div id="popup">
                <form id="adbform" action="/projectidl/librarian/aboutDes.php" method="POST" enctype="multipart/form-data">
                    <p id=clpopup>x</p>

                    <div class="inptbx">
                        <p id="inptbxn">discription</p>
                        <textarea id="inpt" name="message"> The cat was playing in the garden.</textarea>
                    
                        <br><br>

                        <div>
                            <input type="submit" id="adbktdb">
                        </div>
                    </div>
                </form>
                <p onclick="closepopup()" id="overley"></p>
            </div>

        </div>
        <div class="boxl b3">
            <header>membership request</header>
            <div class="box2">
           <?php
           require_once ("reqstdlist.php");
           ?>
            </div>
        </div>


    </main>
 
    <script>
       popup = document.getElementById("popup");
        clpopup = document.getElementById("clpopup");
        overley = document.getElementById("overley");
       

        function frminpttxtinsrt(i) {

            hdr = document.getElementById('hder' + i).innerHTML;
            document.getElementById("inptbxn").innerHTML = hdr;
           
           document.getElementById("inpt").name=hdr;
            inpttxt = document.getElementById('inrtxt' + i).innerText;
            document.getElementById("inpt").value = inpttxt;

        }

        function popupshow(a) {
            popup.style.display = 'block';
            frminpttxtinsrt(a)
        }function closepopup(){
            popup.style.display = 'none';

        }
    </script>
      
<?php
           require_once ("footer.php");
           ?>
</body>


</html>