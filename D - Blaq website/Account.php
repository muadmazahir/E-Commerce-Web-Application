<?php session_start();

if(!isset($_SESSION["username"]))
{
	header('Location:login.php');
}
?>
<!doctype html>
<html>
<head>
	<style>
		table
		{  
			margin-left: 300px;
			margin-top: 100px;
			margin-bottom: 100px;
    		color: #333; 
    		font-family: Helvetica, Arial, sans-serif; 
    		width: 640px; 
    		border-collapse:collapse; 
    		border-spacing: 0; 
		}

		td, th 
		{ border: 1px solid #CCC; 
		  height: 30px; 
		} 

		th 
		{  
   			 background: #F3F3F3; 
   			 font-weight: bold; 
		}	

		td 
		{  
    		background: #FAFAFA; 
    		text-align: center; 
		}
	</style>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
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
					<li><a href="#" class="active"> Account </a></li>
                    <li><a href="signin.php"> Sign-in  </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
    </header>
	<?php
		 $con = mysqli_connect("localhost","root","","DblaqCus");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM `orders` WHERE `email`='".$_SESSION["username"]."';";	
					
		$result = mysqli_query($con,$sql);
	
		if(mysqli_num_rows($result)> 0)
		{
			$row = mysqli_fetch_assoc($result);
			$total=$row["totalPrice"];
			$status=$row["status"];
		}
		else
		{
			$total=0;
			$status="no orders";
		}
	
		
	?>
	
	
	<section>
			<table>
				<tr>
					<td>Email</td>
					<td><?php echo $_SESSION["username"] ?></td>
				</tr>
				<tr>
					<td>Total Cost</td>
					<td><?php echo $total ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo $status ?></td>
				</tr>
			</table>
	</section>
	
	
	
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
