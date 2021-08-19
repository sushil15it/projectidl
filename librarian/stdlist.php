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
   
    <title>member list</title>
    <style>
          /* menu css */
        
          main .box {
            width: 90%;
            margin: 25px auto;
            overflow: hidden;
            border: 1px solid black;
        }
        
        main .box header {
            width: 100%;
            font-size: 35px;
            /* font-style: italic; */
            font-weight: bold;
            padding-bottom: 18px;
            text-align: center;
            color: rgb(35, 102, 4);
            overflow: hidden;
            border-bottom: 2px solid rgba(196, 197, 195, 0.918);
        }
        
        main .box .box2 {
            display: grid;
            grid-template-columns: 330px 330px 330px 330px;
            justify-content: space-around;
        }
        
        @media screen and (max-width:1477px) {
            main .box .box2 {
                grid-template-columns: 330px 330px 330px;
            }
        }
        
        @media screen and (max-width:1111px) {
            main .box .box2 {
                grid-template-columns: 330px 330px;
            }
        }
        
        @media screen and (max-width:738px) {
            main .box .box2 {
                grid-template-columns: 330px;
                justify-content: center;
            }
        }
        
        main .box .member {
            width: 330px;
            display: grid;
            grid-template-columns: max-content auto;
            border-bottom: .5px dotted rgba(196, 197, 195, 0.918);
            border-left: 2.5px solid rgba(72, 105, 39, 0.918);
        }
        
        @media screen and (max-width:400px) {
            main .box .box2 {
                grid-template-columns: 100%;
            }
            main .box .member {
                width: 100%;
            }
        }
        
        main .box .member .icon,
        main .box .member .dbox {
            margin: 10px;
            height: fit-content;
        }
        
        main .box .member .icon img {
            margin: auto;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid rgba(196, 197, 195, 0.918);
        }
        
        main .box .member .status,
        main .box .member .name p {
            font-size: 20px;
            text-align: center;
        }
        
      
        
        .active {
            font-style: italic;
            text-decoration: underline;
            font-weight: bold;
        }
        button#adbkbtn2 {  color: rgb(31, 107, 8);
            font-size: 20px;
            border: none;
            width: fit-content;
            outline: none;
            transform: translate();
            background-color: inherit;
            cursor: pointer;
        }
        
        #adbkbtn2:hover {
            transform: translate(4%, -10%);
            font-size: 28px;
        }
        
        #popup2 {
            display: none;
        }
        
        #popup2 #adbform2 {
            min-width: 200px;
            width:fit-content;
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
        
        #overley2 {
            position: fixed;
            top: 0;
            right: 0;
            background-color: rgba(131, 130, 130, 0.788);
            width: 100%;
            height: 100%;
            z-index: 10;
            cursor: pointer;
        }
        
        #clpopup2 {
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
        
        #adbform2 .inptbx2 #inptbxn2 {
            font-size: 25px;width: fit-content;
            background-color: white;
            transform: translate(10px, -20px);
            padding: 5px 15px;
            cursor: default;
        }
        
        #adbform2 .inptbx2 {
            font-size: 25px;
            margin-top: 15px;
            margin-bottom: 60px;
            min-height: 150px;
            border-radius: 20px;
            border: 1px solid gray;
        } 
        main .name #icon,
        #adbform2 .inptbx2  .name{
      margin: auto;
      width: fit-content; 
  
        }
        main .name #icon img {
            margin: auto;
            width: 150px;  border-radius: 10px;         
                } 
        #adbform2 .inptbx2 #name {
            font-size: 20px;
            width: fit-content;
         text-align: center;
            padding: 8px;
            border: 1x solid gray;
           
        }
        
        #adbktdb2 {
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
        main  .member .status button{
            display: inline;
            margin-left: 5px;
            padding: 3px 8px;
            border: 1px solid rgba(196, 197, 195, 0.918);border-radius: 5px;
        } main  .member .status button:hover{
            cursor: pointer;font-style: italic;
        }
    </style>
</head>
<body>
<?php require_once ("nav.php");          ?> 
<script>
    document.getElementById("member").classList.value="active";
</script>


<main>

<div class="box">
    <header>membership request</header>
    <div class="box2">
    <?php
           require_once ("reqstdlist.php");
           ?>
  
      <div class="member">

       
        </div>
    </div>
</div>


<div class="box">
    <header>member list</header>
    <div class="box2">
    <?php
           require_once ("regstdlist.php");
           ?>
  
      <div class="member">

       
        </div>
        
    </div>

</div>
  <div>
<div id="popup2">
                <div id="adbform2">    <p onclick="closepopup2()" id=clpopup2>x</p>

                    <div class="inptbx2">
                        <p id="inptbxn2"></p>
                        <div class="name">
                            <div id="icon"></div>
                            <p id="name"></p>
                        </div>
                        
                    <div>
                      <form id="accept"  action="/projectidl/librarian/userupdate.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="stdid2"name="stdid2">
                            <input type="submit" id="adbktdb2" value="add student">
                            </form>
                            <form id="reject"  action="/projectidl/librarian/userupdate.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="stdid21" name="stdid21">
                            <input type="submit" id="adbktdb2" value="remove student">
                            </form>
                    </div>
         </div>
              </div>
                <p onclick="closepopup2()" id="overley2"></p>
        </div>
<script>
         popup2 = document.getElementById("popup2");
      
 function popupshow2(a) {
  
   matches=a.match(/\d+/g);
  var userid=matches[0]; 
  var libId=matches[1]; 
 
  if(a.indexOf('c')===0){
     document.getElementById("accept").style.display="block";     
    document.getElementById("reject").style.display="none";
  document.getElementById("stdid2").value=userid;

  }
  else if(a.indexOf('c')===4){
       document.getElementById("accept").style.display="none";
       document.getElementById("reject").style.display="block";
       document.getElementById("stdid21").value=userid;
    }
             var iconid="icon"+userid+"l"+libId;
             var usernameid="username"+userid+"l"+libId;
            
                  document.getElementById('icon').innerHTML =document.getElementById(iconid).innerHTML;
                  document.getElementById('name').innerHTML="user name : "+ document.getElementById(usernameid).innerHTML;
         
    var stdve=userid;
   
     if(stdve.toString().length ==6){
        var userid2=libId + userid;
        document.getElementById('inptbxn2').innerHTML ="user login id  : "+ userid2;
                 
          }else{
            document.getElementById('inptbxn2').innerHTML ="user login id  : "+ userid;
   
          }
               popup2.style.display = 'block';
         
        }
        function closepopup2(){
            popup2.style.display = 'none';

        }
</script>
</div>
</main>

<?php
           require_once ("footer.php");
           ?>

</body>
</html>