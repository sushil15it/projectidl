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
   
    <title>book issue</title>
    <style>
   
        /* pop up add book */
        
        
        #formbox {
            min-width: 200px;
            width: 80%;
            max-height: 90vh;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 11;
            border: 1px solid rgb(255, 0, 0);
            background-color: rgb(255, 255, 255);
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
        
         ::-webkit-scrollbar {
            width: 5px;
        }
        
        form {
            width: 100%;
            max-height: 90vh;
            overflow: auto;
        }
        
        #popup form header {
            width: fit-content;
            margin: auto;
            color: rgb(7, 114, 11);
            padding-bottom: 7px;
            border-bottom: 1px dotted red;
            margin-bottom: 11px;
        }
        
        #popup form .boxf1 {
            margin: auto;
            padding-bottom: 7px;
            border-bottom: 2px solid rgb(9, 124, 28);
            margin-bottom: 11px;
            width: 100%;
            display: flex;
        }
        
        #popup form .boxf1 .boxf11 {
            width: 48%;
        }
        
        #popup form .boxf1 .boxf12 {
            border-right: .1px solid rgb(2, 250, 23);
        }
        
        #popup form .boxf1 span,
        #popup form .boxf1 button {
            padding: 2px 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            display: inline-block;
        }
        
        #popup form .boxf1 button {
            display: inline-block;
        }#stdicon{display: block;margin: auto;
            max-width: 50px;
            max-height: 50px;
          
        }#stdicon img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
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
          
     </table> <div id="popup">
                <div id="formbox">
                    <p id="clpopup" onclick="location.href='bookisue.php'">x</p>
                    <form action="#">
                        <?php
                        $image;
    if(isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST"){
         $stduserid=$_POST["popuserid"];
         $popbookid=$_POST["popbookid"];
         $popbookn=$_POST["popbookn"];
         $popauthor=$_POST["popauthor"];
         $popavilable=$_POST["popavilable"];
         $popbkisueid=$_POST["popbkisueid"];
         $sqlstdni= "SELECT  image,stdname  FROM student WHERE libraryId='$libraryid' AND stdId='$stduserid'";
         $result1 = mysqli_query($conn, $sqlstdni);
         if(mysqli_num_rows($result1) >0){
         $rowstdni= mysqli_fetch_array($result1);
         $image= $rowstdni['image'];
         $stdname= $rowstdni['stdname'];
   }
  

        }else{
    header("location:/projectidl/librarian/bookisue.php");
      }

?>
                        <header>
                            <h1 id="userid">welcome to book issue to  </h1>
                        </header>
                        <div class="boxf1">
                <div class="boxf11 boxf12">
                                <?php
                                
                           $sqlbkisi= "SELECT IssueId, IsseStatus,	IssueDate   FROM bookisse WHERE  stdId='$stduserid'";
                           $resultbkisi = mysqli_query($conn, $sqlbkisi);
                            if(mysqli_num_rows($resultbkisi) >0){
       
                            while( $rowbkisi= mysqli_fetch_array($resultbkisi)){
                            if($rowbkisi['IsseStatus']>1){

      
   
                              ?> 
                                <div> <span>book isued id $ date</span><span><?php echo  $rowbkisi["IssueId"] ;?></span><span><?php echo  $rowbkisi["IssueDate"];?></span></div>

                              <?php
                                }}}
                              ?>
                 </div>

                 <div class="boxf11"><header id="stdicon"><?php echo'<img src="/projectidl/login/loginphp/image/'. $image.'   " alt="">'?></header>
                            <header>
                                    <h3><?php echo $stdname;?></h3>
                                </header>
                 </div>
            </div>
                        <div class="boxf1">
                            <div class="boxf11"><span>book id</span><button><?php echo $popbookid ?></button><br>
                                <span>book name</span><button><?php echo $popbookn ?></button>
                            </div>
                            <div class="boxf11"> <span>available</span><button><?php echo $popavilable ?></button><br>
                                <span>book author</span><button><?php echo $popauthor ?></button>
                            </div><div class="boxf11"> 
                            <?php
                              $date= date('Y-m-d');
                            $sqlupis= "UPDATE  bookisse SET IsseStatus='2',IssueDate='$date'  WHERE IsseStatus='1' AND IssueId='$popbkisueid' AND stdId='$stduserid'";
                            
                            if( mysqli_query($conn, $sqlupis)){
                              
                                $popavilable--;
                              
                                $sqlupbka= "UPDATE  $bkdb SET avilable='$popavilable'  WHERE  BookId='$popbookid'";
                            
                                if( mysqli_query($conn, $sqlupbka)){
                                    ?>
                                    <span>kindly note book issued id </span><br><button style="font-weight: bold;font-size:25px;padding: 5px;color:rgb(2, 250, 23);"><?php echo $popbkisueid ?></button>
                                    <?php
                                    }else{
                                        echo "error to update avilabe in bkdb" . mysqli_error($conn);
                                    }
                                }
                            ?>
                            </div>
                        </div>


            
                       
        </form>
                </div>
                <p id="overley" onclick="location.href='bookisue.php'"></p>
    </div>
        
       
           </div><br><br><br></main>
     <?php
     $_POST=null;
           require_once ("footer.php");
    ?>
</body></html>