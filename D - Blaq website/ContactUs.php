<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact us Page </title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/contact-us.css">
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
                    <li><a href="#"  class="active"> Contact</a></li>
					<li><a href="Account.php"> Account </a></li>
                    <li><a href="signin.php"> Sign-in  </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
    </header>



<div class="main-container">
       <h1>CONTACT US</h1>

   
      <form name="Contact us" action="ContactUs.php" method="post">
          <div class="input-group">
              <label for="">Name</label>
              <input type="text" name="name" placeholder="Enter Your Full Name" required>
          </div>
          
          <div class="input-group">
              <label for="">Email</label>
              <input type="email" name="email" placeholder="dblaq@gmail.com" required>
          </div>
          
        
          <div class="input-group">
              <label for=""> Inquiry  type</label>
              
              <select name="" id="">
                  <option value="">About your products</option>
                  <option value="">About your Features</option>
                  <option value="">About your Services</option>
                  <option value="">About your Future Business roles</option>
                  <option value=""> Appreciations</option>
                  <option value=""> Complaint</option>
              </select>
          </div>
          
              <div class="input-group">
              <label for="" id="message-label">Your Message</label>
              <textarea name="message" id="" placeholder="Mention your message concisely so that we can respond to you quickly" required></textarea>
          </div>
          
		  <?php
	
		if(isset($_POST['btnsubmit']))	
		{
			$email = $_POST["email"];
			$name = $_POST["name"];
			$message= $_POST["message"];
			
			
			
			
			$con = mysqli_connect("localhost","root","","DblaqCus");
					if(!$con)
					{
						die("Cannot connect to DB server");
					}
			$sql = "INSERT INTO `Inquiry`(`email`, `name`, `message`) VALUES ('".$email."','".$name."','".$message."');";
			
			mysqli_query($con,$sql);
			
			
			
		}
			
		
	?>	
		  
          <button type="reset" class="btnreset"> Cancel </button>
          <button type="submit" name="btnsubmit" class="btnsubmit"> Send</button>
      </form>
      
      
      
        
   <div class="clearfix"></div>

   
   </div>
    

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