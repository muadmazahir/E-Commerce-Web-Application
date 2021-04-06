<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign up Page </title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sign-up.css">
    <link rel="stylesheet" href="css/footer.css">
<script type="text/javascript">
		function validateFullName()
		{	
			var fname=document.getElementById("name").value;
			if(fname=="" || fname==null)
			{
				alert(" Please enter full name");
				return false;	
			}
			return true;	
		}
		function validateEmail()
		{	
			var email=document.getElementById("email").value;
			var at=email.indexOf("@");
			var dt= email.lastIndexOf(".");
			var len=email.length;
	
			if((at < 2) || (dt-at < 2) || (len-dt < 2))
			{
				alert("Please enter a valid email address");
				return false;	
			}	
			return true;		
		}
		function validatePassword()
		{
			var pwd=document.getElementById("password").value;	
			var cpwd=document.getElementById("repassword").value;
			if((pwd.length<8) || (pwd !=cpwd) )
			{
				alert("Please enter a correct password and enter the same for confirm password ");
				return false	
			}
			return true;
		}
		function validateContactNo()
		{
			var telNo=document.getElementById("phone").value;
			if((isNaN(telNo) || telNo.length!=10))
			{
				alert("Enter a valid phone number");
				return false;	
			}
			return true;	
		}
		function validate()
		{
			if(validateFullName() && validateEmail() && validatePassword()  && validateContactNo())
			{
				alert("Account has been created");	
				window.open("http://localhost/final/D%20-%20Blaq%20website/signin.php")
			}
			else
			{
				event.preventDefault();	
			}	
			
		}

		
		

	</script>

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
                    <li><a href="signin.php"> Sign-in  </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
    </header>



    
        <section class="wrapper sign-up-section">

            <h1 id="sign-text"> Sign Up to be Updated</h1>

            <div class="form">
                <form name="Sign up" action="SignUp.php" method="post">
                    <p class="contact"><label for="name">Name</label></p>
                    <input type="text" id="name" name="name" placeholder="First and last name" required>

                    <p class="contact"><label for="email">Email</label></p>
                    <input type="email" id="email" name="email" placeholder="example@domain.com" required >

                   

                    <p class="contact"><label for="password">Create a password</label></p>
                    <input type="password" id="password" name="password" required>
                    <p class="contact"><label for="repassword">Confirm your password</label></p>
                    <input type="password" id="repassword" name="repassword" required>

                   

                    <p class="contact"><label for="phone">Mobile phone</label></p>
                    <input id="phone" name="phone" placeholder="phone number" required type="text"> <br>
                     
				<?php
	
					if(isset($_POST['btnsubmit']))
			
					{
						$email=$_POST["email"];
						$name=$_POST["name"];
						$password=$_POST["password"];
						$contact=$_POST["phone"];
			
			
						$con = mysqli_connect("localhost","root","","DblaqCus");
						if(!$con)
						{
							die("Cannot connect to DB server");
						}
						$sql = "INSERT INTO `Customer`(`name`, `email`, `password`, `contactno`) VALUES ('".$name."','".$email."','".$password."','".$contact."');";
			
						mysqli_query($con,$sql);
			
						
			
					}
			
		
				?>
					
                    <input  name="btnsubmit" type="submit" class="btnsubmit"id="btnsubmit"  value="Sign up!" onClick="validate()" >
               
                   
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
