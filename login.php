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



$query = "SELECT * FROM users WHERE user_name = '$user_name'  LIMIT 1" ;

$result = mysqli_query($con,$query);

if ($result) 
{

		if ($result && mysqli_num_rows($result) > 0)
		 {

			$user_data = mysqli_fetch_assoc($result);

			if ($user_data['password'] === $password) 
			{

				$_SESSION['user_id'] = $user_data['user_id'];
				header("location:index.php");
				die;
			}
			
		}
		
}

	echo "Wrong username/password";

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

<link rel="stylesheet"  href="goodstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="icon"  href="C:\Users\DELL\Downloads\iconmonstr-whats-hot-1.svg">


 	<title>Login</title>
 </head>
 <body>
 	

<div class="bgimg">
    <div class="bg-img">
      <div class="content">
      	<div class ="textdecor">
        <header>Login</header>
        </div>
        <div class = "tocontinue">
        <p>You need to Login or Signup to continue</p>
    </div>
        <form method="post">

          

          <div class="field">
            <span class="fa fa-user"></span>
            <input id="text" type="text" name="user_name" required placeholder="Username or Email">
          </div>
<div class="field space">
            <span class="fa fa-lock"></span>
            <input id="password" type="password" name="password" class="pass-key" required placeholder="Password">
            <span class="show">SHOW</span>
          </div>
<div class="pass">
            <a href="#">Forgot Password?</a>
          </div>
<div class="field">
         <input id="button" type="submit" value="LOGIN" name="login_user">

          </div> 
</form>

<form>
	<div class="remember">
            <input type="checkbox" id="remeber" name="remember" value="Remember Me">
            <label for = "remember">Remember me</label>
        </div>
          </form>

<div class="signup">
Don't have an account?
          <a href="http://localhost/ISHMAEL%20OSEI(10848023)/signup.php"><b>Signup Now</b></a>
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

</div>
 </body>
 </html>