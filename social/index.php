<?php 
require 'functions/functions.php';
session_start();
if (isset($_SESSION['user_id'])) {
    header("location:home.php");
}
session_destroy();
session_start();
ob_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Social Network</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <style>
        * {
  padding: 0;
  margin: 0;
  color: #1a1f36;
  box-sizing: border-box;
  word-wrap: break-word;
  font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Ubuntu, sans-serif;
}

body {
  min-height: 100%;
  background-color: #ffffff;
}

h1 {
  letter-spacing: -1px;
  text-align: center;
  margin-top: 20px;
  font-size: 28px;
  color: #4267b2;
}

a {
  color: #5469d4;
  text-decoration: unset;
}

.container {
  margin: 40px auto;
  width: 400px;
}

.tab {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
}

.tablink {
  padding: 10px 20px;
  background-color: #e3e8ee;
  color: #5469d4;
  border: none;
  font-weight: bold;
  cursor: pointer;
}

.tablink.active {
  background-color: #5469d4;
  color: #ffffff;
}

.content {
  padding: 30px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 0 5px #4267b2;
}

label {
  display: block;
  font-weight: bold;
  color: #333;
  margin-top: 10px;
}

span {
  color: #ff4d4f;
}

input[type="text"],
input[type="password"],
select,
textarea {
  font-size: 16px;
  line-height: 28px;
  padding: 8px 16px;
  width: 100%;
  min-height: 44px;
  border: 1px solid #e3e8ee;
  border-radius: 4px;
  margin-top: 5px;
  outline-color: rgb(84 105 212 / 0.5);
  box-shadow: rgba(60, 66, 87, 0.16) 0px 1px 3px;
}

input[type="submit"] {
  width: 100%;
  background-color: #5469d4;
  border: none;
  color: #ffffff;
  font-weight: 600;
  cursor: pointer;
  padding: 12px;
  margin-top: 15px;
  border-radius: 4px;
  box-shadow: rgba(84, 105, 212, 0.5) 0px 2px 4px;
}

input[type="radio"],
input[type="checkbox"] {
  margin-right: 5px;
}

.tabcontent {
  display: none;
}

.tabcontent.active {
  display: block;
}

.required {
  font-size: 12px;
  color: #ff4d4f;
  margin-top: 5px;
}

textarea {
  width: 100%;
  padding: 8px 16px;
  min-height: 120px;
  border-radius: 4px;
  resize: vertical;
  font-size: 16px;
}

hr {
  border: 0;
  height: 1px;
  background: #e3e8ee;
  margin: 20px 0;
}

h2 {
  font-size: 20px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

@media (max-width: 500px) {
  .container {
    width: 90%;
  }
}

    </style>
</head>
<body>


    <h1>Welcome to PostFusion</h1>
    <div class="container">
        <div class="tab">
            <button class="tablink active" onclick="openTab(event,'signin')" id="link1">Login</button>
            <button class="tablink" onclick="openTab(event,'signup')" id="link2">Sign Up</button>
        </div>
        <div class="content">
            <div class="tabcontent" id="signin">
                <form method="post" onsubmit="return validateLogin()">
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="loginuseremail">
                    <div class="required"></div>
                    <br>
                    <label>Password<span>*</span></label><br>
                    <input type="password" name="userpass" id="loginuserpass">
                    <div class="required"></div>
                    <br><br>
                    <input type="submit" value="Login" name="login">
                </form>
            </div>
            <div class="tabcontent" id="signup">
                <form method="post" onsubmit="return validateRegister()">
                    <!--Package One-->
                    <h2>Highly Required Information</h2>
                    <hr>
                    <!--First Name-->
                    <label>First Name<span>*</span></label><br>
                    <input type="text" name="userfirstname" id="userfirstname">
                    <div class="required"></div>
                    <br>
                    <!--Last Name-->
                    <label>Last Name<span>*</span></label><br>
                    <input type="text" name="userlastname" id="userlastname">
                    <div class="required"></div>
                    <br>
                    <!--Nickname-->
                    <label>Nickname</label><br>
                    <input type="text" name="usernickname" id="usernickname">
                    <div class="required"></div>
                    <br>
                    <!--Password-->
                    <label>Password<span>*</span></label><br>
                    <input type="password" name="userpass" id="userpass">
                    <div class="required"></div>
                    <br>
                    <!--Confirm Password-->
                    <label>Confirm Password<span>*</span></label><br>
                    <input type="password" name="userpassconfirm" id="userpassconfirm">
                    <div class="required"></div>
                    <br>
                    <!--Email-->
                    <label>Email<span>*</span></label><br>
                    <input type="text" name="useremail" id="useremail">
                    <div class="required"></div>
                    <br>
                    <!--Birth Date-->
                    Birth Date<span>*</span><br>
                    <select name="selectday">
                    <?php
                    for($i=1; $i<=31; $i++){
                        echo '<option value="'. $i .'">'. $i .'</option>';
                    }
                    ?>
                    </select>
                    <select name="selectmonth">
                    <?php
                    echo '<option value="1">January</option>';
                    echo '<option value="2">February</option>';
                    echo '<option value="3">March</option>';
                    echo '<option value="4">April</option>';
                    echo '<option value="5">May</option>';
                    echo '<option value="6">June</option>';
                    echo '<option value="7">July</option>';
                    echo '<option value="8">August</option>';
                    echo '<option value="9">September</option>';
                    echo '<option value="10">October</option>';
                    echo '<option value="11">Novemeber</option>';
                    echo '<option value="12">December</option>';
                    ?>
                    </select>
                    <select name="selectyear">
                    <?php
                    for($i=2017; $i>=1900; $i--){
                        if($i == 1996){
                            echo '<option value="'. $i .'" selected>'. $i .'</option>';
                        }
                        echo '<option value="'. $i .'">'. $i .'</option>';
                    }
                    ?>
                    </select>
                    <br><br>
                    <!--Gender-->
                    <input type="radio" name="usergender" value="M" id="malegender" class="usergender">
                    <label>Male</label>
                    <input type="radio" name="usergender" value="F" id="femalegender" class="usergender">
                    <label>Female</label>
                    <div class="required"></div>
                    <br>
                    <!--Hometown-->
                    <label>Hometown</label><br>
                    <input type="text" name="userhometown" id="userhometown">
                    <br>
                    <!--Package Two-->
                    <h2>Additional Information</h2>
                    <hr>
                    <!--Marital Status-->
                    <input type="radio" name="userstatus" value="S" id="singlestatus">
                    <label>Single</label>
                    <input type="radio" name="userstatus" value="E" id="engagedstatus">
                    <label>Engaged</label>
                    <input type="radio" name="userstatus" value="M" id="marriedstatus">
                    <label>Married</label>
                    <br><br>
                    <!--About Me-->
                    <label>About Me</label><br>
                    <textarea rows="12" name="userabout" id="userabout"></textarea>
                    <br><br>
                    <input type="submit" value="Create Account" name="register">
                </form>
            </div>
        </div>
    </div>
    <script src="resources/js/main.js"></script>
</body>
</html>

<?php
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
    if (isset($_POST['login'])) { // Login process
        $useremail = $_POST['useremail'];
        $userpass = md5($_POST['userpass']);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$useremail' AND user_password = '$userpass'");
        if($query){
            if(mysqli_num_rows($query) == 1) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_firstname'] . " " . $row['user_lastname'];
                header("location:home.php");
            }
            else {
                ?> <script>
                    document.getElementsByClassName("required")[0].innerHTML = "Invalid Login Credentials.";
                    document.getElementsByClassName("required")[1].innerHTML = "Invalid Login Credentials.";
                </script> <?php
            }
        } else{
            echo mysqli_error($conn);
        }
    }
    if (isset($_POST['register'])) { // Register process
        // Retrieve Data
        $userfirstname = $_POST['userfirstname'];
        $userlastname = $_POST['userlastname'];
        $usernickname = $_POST['usernickname'];
        $userpassword = md5($_POST['userpass']);
        $useremail = $_POST['useremail'];
        $userbirthdate = $_POST['selectyear'] . '-' . $_POST['selectmonth'] . '-' . $_POST['selectday'];
        $usergender = $_POST['usergender'];
        $userhometown = $_POST['userhometown'];
        $userabout = $_POST['userabout'];
        if (isset($_POST['userstatus'])){
            $userstatus = $_POST['userstatus'];
        }
        else{
            $userstatus = NULL;
        }
        // Check for Some Unique Constraints
        $query = mysqli_query($conn, "SELECT user_nickname, user_email FROM users WHERE user_nickname = '$usernickname' OR user_email = '$useremail'");
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            if($usernickname == $row['user_nickname'] && !empty($usernickname)){
                ?> <script>
                document.getElementsByClassName("required")[4].innerHTML = "This Nickname already exists.";
                </script> <?php
            }
            if($useremail == $row['user_email']){
                ?> <script>
                document.getElementsByClassName("required")[7].innerHTML = "This Email already exists.";
                </script> <?php
            }
        }
        // Insert Data
        $sql = "INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status, user_about, user_hometown)
                VALUES ('$userfirstname', '$userlastname', '$usernickname', '$userpassword', '$useremail', '$usergender', '$userbirthdate', '$userstatus', '$userabout', '$userhometown')";
        $query = mysqli_query($conn, $sql);
        if($query){
            $query = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$useremail'");
            $row = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $row['user_id'];
            header("location:home.php");
        }
    }
}
?>

