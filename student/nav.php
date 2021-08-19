<!DOCTYPE html>
<html lang="en">

<head>
<style>
    * {
    margin: 0;
    padding: 0;
    outline: none;
    box-sizing: border-box;
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

  #buller {
    display: none;
    position: fixed;
    z-index: 9;
    width: 100%;
    height: 100%;
   }

  nav {
    max-height: 40px;
    background-color: rgb(9, 70, 11);
    width: 100%;
    color: white;
    display: flex;
    justify-content: space-between;
    overflow: hidden;
  }

  nav .navbar,
  nav .login {
    display: flex;
    align-items: center;
    min-height: 40px;
  }

  nav .navbar button,
  #menubar {
    display: none;
 } #menubar {
    border: 1px solid rgb(252, 41, 41);
            background-color: rgba(131, 130, 130, 0.925);
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(-30%, -80%);
            cursor: pointer;
            width:25px;height: 25px;
           
            border-radius: 50%;
 }

 nav .navbar button .icon-bar {
    padding: .5px;
    margin: 3px;
    width: 19px;
    min-height: .7px;
    z-index: -1;
    display: flex;
    border: 1px solid black;
   }

  nav .login a,
   nav .menu ul li {
    text-decoration: none;
    color: white;
    border-left: 1px solid black;
  }

  nav .login a,
  nav .menu ul li a {
    transition-property: all;
    transition-duration: 1.5s;
    line-height: 40px;
    font-size: 18px;
    padding-right: 15px;
    padding-left: 5px;
  }

   nav .login a:hover,
   nav .menu ul li a:hover {
    font-style: italic;
    text-decoration: underline;
   
    color: rgb(145, 154, 161);
  }

  .active {
    font-weight: bold;
    background-color: rgb(31, 190, 31);
    font-style: italic;
    border: 1px sold black;
    border-radius: 5px;
  }

     @media screen and (min-width:902px) {
         nav .menu ul li {
          display: inline-block;
        }
     }

    @media screen and (max-width:902px) {
        nav .navbar button,
    #menubar {
        display: block;
    }
    nav .menu ul li {
        border: none;
        border-bottom: .7px dotted red;
        height: fit-content;
    }
    nav .menu ul li a {
        transition-property: all;
        transition-duration: 1.5s;
        line-height: 40px;
        font-size: 18px;
        padding: 9px 15px;
    }
    nav .menu {
        transition-property: all;
        transition-duration: 1.7s;
        background-color: rgb(9, 70, 11);
        position: fixed;
        right: -100%;
        top: 40px;
        z-index: 10;
        width: fit-content;
        padding: 10px;
    } 
    }
     /* dropdown */
        
     .dropdown .dropbtn {
            height: 40px;
            margin: auto;
            border: none;
            outline: none;
            cursor: pointer;
            background-color: inherit;
            padding: 0px 20px 0px 5px;
        }
        
        .dropdown-content {
            line-height: 40px;
            display: none;
            top: 38px;
            position: absolute;
            background-color: #0f3801e3;
            min-width: 160px;
            z-index: 1;
        }
        
        .dropdown-content a {
            padding: 0px 10px;
            text-decoration: none;
            display: block;
            font-size: 15px;
            text-align: left;
        }
        
        @media screen and (max-width: 950px) {
            .dropdown-content a {
                padding: 0px 10px;
            }
            .dropdown .dropbtn {
                border: none;
            }
        }
        
        nav .login a {
            transition-property: all;
            transition-duration: .3s;
            line-height: 30px;
            font-size: 12px;
            padding-left: 10px;
        }
        
        .dropdown .dropbtn:hover,
        nav .login a:hover {
            font-size: 15px;
            font-style: italic;
            font-weight: bold;
            text-decoration: underline;
            color: rgb(145, 154, 161);
            background-color: #2c813d;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* } */
        
        nav .dropdown img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        /* } */

</style>
   
</head>
<body onresize="updnav()">
<?php
    $sqluser= "SELECT  image FROM student WHERE stdId='$userid'";
    $result1 = mysqli_query($conn, $sqluser);
    if(mysqli_num_rows($result1) ==1){
       //match email and password
        $rowuser= mysqli_fetch_array($result1);
      
       $stdicon=$rowuser["image"];
      
    
    } ?>
<nav>
        <div id="buller" onclick="menuBr(0)"></div>

        <div class="logo">
            <img src="/projectidl/img/idm-l-h.png" alt="">

        </div>
        <div class="navbar">

            <button id="s1" onclick="menuBr(1)">
                <span id="s11" class="icon-bar"></span>
                <span id="s12" class="icon-bar"></span>
                <span id="s13" class="icon-bar"></span>
            </button>
        </div>
        <div class="menu" id="s2">
            <ul>
                <li id="menubar" onclick="menuBr(0)" style="padding-left:5px ;">X
              
              
                </li>
                <li id="home" class="">
                    <a href="index.php">home</a>
                </li>
                <li id="bookstore">
                    <a href="bookstore.php">book database</a>
                </li>
                <li id="isuehistory">
                    <a href="bookisuehistory.php">book issued</a>
                </li>

                <li id="dashboard">
                    <a href="userprofile.php">dashboard</a>
                </li>

            </ul>

        </div>

        <div class="dropdown login">
           
            <button class="dropbtn"><?php echo'<img src="/projectidl/login/loginphp/image/'. $stdicon.'   " alt="">'?> <i class="fa fa-caret-down"></i>
                </button>
            <div class="dropdown-content" style="margin-left: -60px;">
                <a id="profile" href="userprofile.php">View Profile</a>

                <a href="/projectidl/login/loginphp/log_out.php">log-out</a>
            </div>

        </div>

</nav>

<script>
    function updnav(){
        S1 = document.getElementById("s1");
 if(  S1.style.display =="block"){
       var width= window.innerWidth;
     if(width>902){
        S1.style.display = "none";
     }
     
    }    }
  function menuBr(i) {
    S1 = document.getElementById("s1");

    buller = document.getElementById("buller");
    S2 = document.getElementById("s2");

    if (i == 1) {

        S2.style.right = 0 + "px";
        buller.style.display = "block";
        S1.style.display = "none";

    } else if (i == 0) {
        S2.style.right = -100 + "%";
        buller.style.display = "none";
        S1.style.display = "block";
    }
  }
</script>

</body>
</html>