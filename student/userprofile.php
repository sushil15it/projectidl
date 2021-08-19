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
   
    <title>profile</title>
    <style>
          /*profile  */
        body{height: 100%;
            background-color: black;color: white;
        }
        main {
            min-height: 100vh;
            justify-content: center;
            background: linear-gradient(to left top, #65dfc9, #6cdbeb);
            display: flex;
            align-items: center;
        }
        
        .glass {
            margin-bottom: 20px;
            border-radius: 2rem;
            width: 60%;
            min-height: 80vh;
            background: linear-gradient(to right top, rgba(255, 255, 255, 0.966), rgba(255, 255, 255, 0.2));
        }
          main .box .profile .img img {
            width: 100%;
            margin: auto;
            z-index: 5;
        }
        
        main .box .profile .img {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            margin: auto;
            justify-content: center;
            display: flex;
            overflow: hidden;
        }
        table{
          max-width: 100%;
         
          border-collapse:separate ;
          table-layout: fixed;
          
           margin:auto;
         
      }
        main .box .profile table tr {     
            color: rgb(9,70,11);         
            font-size: 25px;
            height: 60px;
            margin:0px 30px;    
        }
        td{ 
            border-bottom: 1px solid  gray;
            padding: 10px;
        }
       
        main #button {
            width: 100%;display: flex;
            padding: 4px auto;
            margin: 10px 0;
        }main #button button{
            width: 80%;color: white;
            margin: auto;background-color: rgb(9,70,11);
            border: none;outline: none;font-size: 20px;
            padding: 5px ;border-radius:10px ;
            margin-bottom: 10px;cursor: pointer;
        }
        @media screen and (max-width:950px) {
            .glass {
          
            width: 80%;
             }
        } @media screen and (max-width:750px) {
            .glass {
          
          width: 90%;
           }
           table{
          max-width: 90%;        
          }
          main .box .profile table tr {     
                    
            font-size: 20px;
           
            margin:0px 20px;    
        }
        td{ 
            border-bottom: 1px solid  gray;
            padding: 5px;
        }
        }
        @media screen and (max-width:520px) {
            .glass {
          
          width: 95%;overflow: auto;
           }
           table{
          max-width: 90%;        
          }
          main .box .profile table tr {     
                    
            font-size: 14px;
           
            margin:0px 10px;    
        }
        td{ 
            border-bottom: 1px solid  gray;
            padding: 2px;
        }main .box .profile .img {
            width: 230px;
            height: 230px;
         
        }
        
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
            
      .box #error {
    background-color: rgb(92, 5, 5);
    color: rgb(240, 95, 95);
    padding: 2px;
    border-radius: 10px;
    font-size: 12px;
    text-align: center;
    width: 80%;
    height: fit-content;
    margin: 0 auto;
      }
        #adbform2  .headp {
            font-size: 15px;
            width: fit-content; 
            color: rgb(9,70,11);
            background-color: white;
           
            transform: translate(10px,8px);
           
            padding: 0px 15px;
            cursor: default;
        }
        #adbform2 .inptbx2 input {
            font-size: 18px;
            width: 90%;margin:
             auto;display: block;
           border: none;
           padding:5px 15px;
           padding-top: 12px;
           
        }
        
        #adbform2 .inptbx2 {
         
            margin-top: 0;
            margin-bottom: 0px;
           
            border-radius: 20px;
            border: 1px solid gray;
        } #imagePreview img {
    width: 100%;
    object-fit: cover;
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
            transform: translate(0, 0px);
        }</style>
</head><body>
<?php require_once ("nav.php");          ?> 
<script>
    document.getElementById("profile").classList.value="active";
    document.getElementById("dashboard").classList.value="active";
</script>
<main>
<?php  $iii=0;
$sqlbkid1= "SELECT  IsseStatus FROM bookisse WHERE stdId='$userid' AND  IsseStatus>1 ";
$resultbkid1 = mysqli_query($conn, $sqlbkid1);

if(mysqli_num_rows($resultbkid1) >0){
     while($rowbkid1= mysqli_fetch_array($resultbkid1)){
     $iii++;
    
     }
    
    }
     $sqluser= "UPDATE student SET activeBookNum='$iii'  WHERE stdId='$userid' ";
if(mysqli_query($conn,$sqluser)){
$iii=null;
 }
 
 $sqluser= "SELECT  *  FROM student WHERE stdId='$userid'";
    $result1 = mysqli_query($conn, $sqluser);
    if(mysqli_num_rows($result1) ==1){
       //match email and password
        $rowuser= mysqli_fetch_array($result1);
       $_SESSION["rowuser"]=$rowuser;
       $stdicon=$rowuser["image"];
      
    
    } ?>
<div class="box glass">
            <div class="profile">
                <div class="img"><img src="/projectidl/login/loginphp/image/<?php echo $stdicon;?>" alt=""></div>
                <div class="detail">

            <table>
                    <tr><td>
                         <p>library name :  </p>
                        </td><td> <span id="libNameT"><?php echo $_SESSION["libName"]; ?></span>
                        </td>        
                    </tr>
                    <tr><td>
                        <p>id: </p>
                        </td><td> <span id="libid"><?php echo $userid; ?></span>
                        </td>   
                    </tr>
                    <tr><td>
                        <p>user name: </p>
                        </td><td>    <span id="usernameT"><?php echo $_SESSION["rowuser"]["stdname"]; ?></span>
                        </td>    
                    </tr>
                    <tr><td>
                        <p>email: </p>
                        </td>
                        <td> <span id="emailT"><?php echo $_SESSION["rowuser"]["email"]; ?>
                        </span></td>
                        
                    </tr>
                    <tr><td>
                        <p>your contact no: </p>
                        </td>
                        <td> <span id="mobileT"><?php echo $_SESSION["rowuser"]["mobile"]; ?>
                        </span></td>
                        
                    </tr>
                    <tr><td>
                        <p>class/stream: </p>
                        </td>
                        <td> <span id="HiQT"><?php echo $_SESSION["rowuser"]["branch"]; ?>
                        </span></td>
                        
                    </tr>
                   
                    <tr><td>
                        <p>total active book no :  </p>
                        </td>
                        <td> <span id="BookNum"><?php echo $_SESSION["rowuser"]["activeBookNum"];?>
                                          </span></td>          
                    </tr>
                </table>
                    
                </div>
            </div>
            <div id="button">
                <button onclick="popupshow2()">edit</button>
            </div>
            <div id="popup2">
                <div id="adbform2">   
                     <p onclick="closepopup2()" id=clpopup2>x</p>

                      <form id="form"  action="/projectidl/student/stdprofileedit.php" method="POST" enctype="multipart/form-data">
                      <div class="error" id="error" style="display: none;">this is an error massage!</div>

                      <div style="display: flex;">
                         <div>
                     <div> <p class="headp">user name</p>
                          <div class="inptbx2">
                      <input type="text" id="username"name="username" required>
                          </div> </div>
                          <div> <p class="headp">email</p>
                          <div class="inptbx2">
                      <input type="email" id="email"name="email"  required>
                          </div> </div>
                         
                           <div> <p class="headp">mobile</p>
                          <div class="inptbx2">
                      <input type="tel" id="mobile"name="mobile"pattern="[0-9]{10}" required>
                          </div> </div>
                          <div> <p class="headp">class/steam</p>
                          <div class="inptbx2">
                      <input type="text" id="HiQ"name="HiQ" required>
                          </div> </div></div>
                         <div> 

                         <div> <p class="headp">password</p>
                          <div class="inptbx2">
                      <input type="password" id="password"name="password" onchange="ValPassword()"required>
                          </div> 
                          <input type="checkbox" id="cheakbox1" onclick="showpassword('password')"><label>show password</label>
                           </div>
                           <div> <p class="headp">cpassword</p>
                          <div class="inptbx2">
                      <input type="password" id="cpassword"name="cpassword" onchange="ValPassword()"required>
                          </div> 
                          <input type="checkbox" id="cheakbox2" onclick="showpassword('cpassword')"><label>show password</label>
                           </div>
                             <div> <p style="color: rgb(9,70,11);">image</p>
                         
                      <input type="file" id="img-f"name="image" onchange="return imgVal()" required>
                            <p style="color: blue;">only:- jpg/jpeg/png formate is accepted</p>
                                   
                          <p id="imgconfirm"></p>
                                    <div id="imagePreview" style="width: 150px;margin:26px auto;">

                                    </div>
                        </div></div>
                     </div>
                          <input type="submit" id="adbktdb2" value="submit">
                          
                     </form>
             
                </div>
                <p onclick="closepopup2()" id="overley2"></p>
            </div>
<script>
        var val1 = val2 = val3 = null;
        
 function showpassword(y) {
    var x = document.getElementById(y);

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";

    }

 }



function ValPassword() {
    var error = document.getElementById("error");

    var password1 = document.getElementById("password").value;
    var password2 = document.getElementById("cpassword").value;
    if (password1 != password2) {
        error.style.display = "block";
        error.innerHTML = "confirm password is different";
        val1 = 0;
        return false;

    } else if (password1 == password2) {
        error.style.display = "none";
        error.innerHTML = "";
        document.getElementById("PMtch").innerHTML = "password matched";
        val1 = 1;
        return true;
    }
}


function imgVal() {
    var error = document.getElementById("error");

    var fileInput = document.getElementById('img-f');
    var filePath = fileInput.value;

    // Allowing file type
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
        error.style.display = "block";
        error.innerHTML = "invalid file type";
        document.getElementById('imagePreview').style.color = "red";
        document.getElementById('imagePreview').innerHTML = "invalid file type";
        val2 = 0;
        fileInput.value = '';
        return false;
    } else {

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML =
                    '<img src="' + e.target.result + '"/>';
                document.getElementById('imgconfirm').innerHTML = "image preview";
                error.style.display = "none";
                error.innerHTML = "";

            };
            val2 = 1;
            reader.readAsDataURL(fileInput.files[0]);
            return true;
        }
    }
}

function FormVal() {


    if (val1 == 1 && val2 == 1 &&
        document.getElementById("error").innerHTML == "") {

        return true;
    } else return false;

}
            </SCRipt>
        <script>
           popup2 = document.getElementById("popup2");
      

           function frminpttxtinsrt() {
var username=document.getElementById("usernameT").innerText;
var email=document.getElementById("emailT").innerText;
var mobile=document.getElementById("mobileT").innerText;
var hiq=document.getElementById("HiQT").innerText;

document.getElementById("username").value = username;

document.getElementById("email").value = email;

document.getElementById("mobile").value = mobile;

document.getElementById("HiQ").value = hiq;
}
           function popupshow2() {
            frminpttxtinsrt();
               popup2.style.display = 'block';
         
            }
             function closepopup2(){
                 popup2.style.display = 'none';
            }
</script></div>
</main>
<?php
           require_once ("footer.php");
           ?>
</body></html>