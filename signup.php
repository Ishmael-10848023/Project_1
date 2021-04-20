<?php 

session_start();

include("connections.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	
$user_name = $_POST['user_name'] ;
$password = $_POST['password'] ;

if (!empty($user_name) && !empty($password) && !is_numeric($user_name))
{


$user_id = random_num(20); //not saved oooo
$query = "INSERT INTO users (user_id,user_name,password) VALUES ('$user_id','$user_name','$password')";

mysqli_query($con,$query);

header("location: login.php");
die;

}
else
{

	echo "Please enter a valid information!";
}

}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Sign Up</title>

<link rel="stylesheet" href="goodstyle2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="icon"  href="C:\Users\DELL\Downloads\iconmonstr-whats-hot-1.svg">


 </head>
 <body style="background-image: url(C:/xampp/htdocs/new login project/pix/ITStaffingDataCenter.jpg);">


<div class="bg-img">
      <div class="content">
      	<div class ="textdecor">
        <header>Signup Form</header>
        </div>
        <form method="POST">

        

          <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" id="text" name = "user_name" required placeholder="Username" maxlength="40" autocomplete="off">
          </div>
          <br>
              <div class="field">
            <span class="fa fa-envelope"></span>
            <input type="email" id="email" name="email" required placeholder="Email Address" autocomplete="off">
          </div>
<div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" id="text"  name= "password" class="pass-key" required placeholder="Password">
            <span class="show">SHOW</span>
          </div>
          <br>

          <div class="field ">
            <span class="fa fa-lock"></span>
            <input type="password" id="password"  name= "password_confirm" class="pass-key" required placeholder="Confirm Password">
            <span class="show">SHOW</span>
          </div>
          <br>
              <div class="field">
            <span class="fa fa-phone"></span>
            <input type="phone" id = "phone" name="phone" placeholder="Phone" autocomplete="off">
          </div>
          <br>




<div class="field">
         <input type="submit" id="button" name="register_user" value="SIGNUP">
              </div> 
</form>



<div class="signup">
Already have an account?
          <a href="http://localhost/ISHMAEL%20OSEI(10848023)/login.php"> <b>Login</b> </a>
        </div>
</div>
</div>
<script>
      const pass_field = document.querySelector('.pass-key');
      const showBtn = document.querySelector('.show');
      showBtn.addEventListener('click', function(){
       if(pass_field.type === "password"){
         pass_field.type = "text";
         showBtn.textContent = "HIDE";
         showBtn.style.color = "#3498db";
       }else{
         pass_field.type = "password";
         showBtn.textContent = "SHOW";
         showBtn.style.color = "#222";
       }
      });
    </script>


 </body>
 </html>