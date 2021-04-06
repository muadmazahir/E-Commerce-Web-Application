<?php session_start(); ?>
<!doctype html>
<html>
<head>
 	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign in Page </title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sign-up.css">
    <link rel="stylesheet" href="css/footer.css">
	
</head>

<body>
	
    <header>
        <div id="top-bar">
			<img id="Dlogo" src="Dblaq images/logo1.jpg">
            <div class="wrapper">			
                <p><span>Contact :</span> 011-2233445</p>
                <p> <span> Opening Hours :</span> Office Time: Mon - Fri : 8.30am - 6.30pm </p>
                <p> <span> Opening Hours :</span> Online Time: 24/7 </p>
				
				 <ul>
                    <li>
                        <a href="" class="logo" id="fb-topbar"><img src="images/social/iconfinder_facebook_social_media_connect_4319498.png">  </a>
                        <a href="" class="logo" id="twitter-topbar"><img src="images/social/iconfinder_twitter_social_media_connect_4319508.png">  </a>                    
                        <a href="" class="logo" id="insta-topbar"><img src="images/social/iconfinder_online_social_media_instagram_4319509.png">  </a>             
                    </li>
                </ul>


                <div class="clearfix"></div>
            </div>
        </div>
        <nav>
            <div class="wrapper">

             
                <ul>
                    <li><a href="index.html"> Home  </a></li>
                    <li><a href="Accessories.php"> Products</a></li>
                    <li><a href="ContactUs.php"> Contact</a></li>
					<li><a href="Account.php"> Account </a></li>
                    <li><a href="#"  class="active"> Sign-in  </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
    </header>
	
	 <section class="wrapper sign-up-section">

            <h1 id="sign-text"> Sign in</h1>

            <div class="form">
                <form name="Signin" method="post" action="signin.php">
                    

                    <p class="contact"><label for="username">Email</label></p>
                    <input type="text" id="email" name="email" placeholder="email" required>

                    <p class="contact"><label for="password">password</label></p>
                    <input type="password" id="password" name="password" required>
	<p>				
<?php
				
					
	   if(isset($_POST['btnSubmit']))
	   {
	      $email=$_POST["email"];
	      $password=$_POST["password"];
		  $valid=false;
		  
		  $con = mysqli_connect("localhost","root","","DblaqCus");
		   if(!$con)
			{	
				die("Cannot connect to DB server");		
			}
			
			$sql="SELECT * FROM `Customer` WHERE `email`='".$email."' AND `password`='".$password."'";
			
			$result = mysqli_query($con,$sql);
		  
		  
		  if(mysqli_num_rows($result) > 0)
		   {
		  
			  $valid=true;
		   }
		  else
		  {
			  $valid=false;
		  }
		  
		  if($valid)
		  {
			  $_SESSION["username"] =$email;
			  header('Location: index.html');	
		
		  }
		  else
		  {
			  echo 'Please enter the correct username and password';
		  }
	   }				
?>
		
					</p>
					
					<input name="btnSubmit" type="submit" class="btnsubmit"id="btnsubmit"  value="Sign in!" >
					
					
					<a href="SignUp.php"><input type="button" class="btnsubmit" id="btnsubmit" value="Create new account"></a>
      
                </form>
            </div>
		 
		 	<div class="adminClass" >
				<form name="AdminSignin" method="post" action="signin.php" style="margin-left: 900px;">
					  <p class="AdminUname"><label for="adminusername">Admin Email</label></p>
                     <input type="text" id="AdminEmail" name="AdminEmail" placeholder="Admin email" required>
					
					 <p class="AdminPass"><label for="adminpassword">Admin password</label></p>
                     <input type="password" id="AdminPassword" name="AdminPassword" placeholder="Admin password" required>
					
					<?php
						 if(isset($_POST['btnAdminSubmit']))
						 {
							 $Adminemail=$_POST["AdminEmail"];
							 $Adminpassword=$_POST["AdminPassword"];
							 $valid=false;
		  
							 $con = mysqli_connect("localhost","root","","DblaqCus");
							 if(!$con)
							 {	
								 die("Cannot connect to DB server");		
							 }
			
							 $sql="SELECT * FROM `Customer` WHERE `email`='".$Adminemail."' AND `password`='".$Adminpassword."'";
			
							 $result = mysqli_query($con,$sql);
		  
		  
							 if(mysqli_num_rows($result) > 0)
							 {
		  
								 $valid=true;
							 }
							 else
							 {
								 $valid=false;
							 }
		  
							 if($valid)
							 {
								 $_SESSION["username"] =$email;
								 header('Location: Admin.php');	
		
							 }
							 else
							 {
								 echo 'Please enter the correct username and password';
		  					}
						 }	
					?>
					
					 <input name="btnAdminSubmit" type="submit" class="btnAdminSubmit" id="btnAdminSubmit"  value="Admin Sign in" >
				</form>
			 </div>

         
          <div class="clearfix"></div>



        </section>      

    
        <div class="clearfix"></div>


	
	

   <footer>

        <div id="footer-main">
            <div class="wrapper">
                <ul>
                    <h3>
						D-Blaq
                    </h3>
                    <li> <span>Address :</span> D-Blaq,<br> Souq 23, Alfred House Garden </li>
                    <li> Colombo 3 </li>
                    <li> <span>Telephone:</span> 011-2233445 </li>
                    <li> <span>Email :</span> DBlaq@gmail.com </li>
                </ul>
                <ul>
                    <h3> Services</h3>
                    <li> <a href=""> 24 Customer Service</a> </li>
                    <li> <a href="">  Home Delivery  </a></li>
                    <li> <a href="">  Online Order </a> </li>
                    <li> <a href="">  Wholesale Discount  </a></li>
                    <li> <a href="">  Terms &amp; Condition </a></li>
                </ul>
                <ul>
                    <h3> Useful Links </h3>
                    <li> <a href="">  Home </a> </li>
                    <li> <a href="">  Our speciality </a> </li>
                    <li> <a href="">  About us </a> </li>
                    <li> <a href="">  How it Works </a> </li>
                    <li> <a href="">  FAQ's </a> </li>
                </ul>
             
                <div class="clearfix"></div>
            </div>
        </div>
		
        <div id="copyright">
            <div class="wrapper">
                <ul>
                    <li class="social">
                        <a href="" id="fb"><img src="images/social/iconfinder_facebook_social_media_connect_4319498.png">  </a>
                        <a href="" id="twitter"><img src="images/social/iconfinder_twitter_social_media_connect_4319508.png"</a>
                        <a href="" id="insta"><img src="images/social/iconfinder_online_social_media_instagram_4319509.png">  </a>
                    </li>

                    <li>
                        <p>copyright &copy; 2019 - <span> MSN Solutions </span> </p>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </footer>
</body>
</html>