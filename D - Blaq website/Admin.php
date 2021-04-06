<!doctype html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Page </title>
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
					<li><a href="Account.php"> Account </a></li>
                    <li><a href="#"  class="active"> Sign-in  </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
    </header>
	
	<section class="bodyAdmin" style="padding-left: 60px; ">
		<form name="AddProducts" method="post" action="Admin.php" >
			 	<label for="ProductName">Name of product: </label>
                <input type="text" id="ProductName" name="ProductName" placeholder="ProductName" required><br>
			
				<label for="ProductPath">Path of product: </label>
                <input type="text" id="ProductPath" name="ProductPath" placeholder="ProductPath" required><br>
			
				<label for="ProductPrice">Price of product: </label>
                <input type="text" id="ProductPrice" name="ProductPrice" placeholder="ProductPrice" required><br>
			
			
		  <?php
		   if(isset($_POST["btnAdd"]))
		   {
			   $Pname=$_POST["ProductName"];
			   $image=$_POST["ProductPath"];
			   $price=$_POST["ProductPrice"];
			   
		   
		   
		   $con = mysqli_connect("localhost","root","","DblaqCus");
			if(!$con)
			{	
				die("Cannot upload the file, Please choose another file");		
			}
			   
			   $sql="INSERT INTO `products`( `name`, `image`, `price`) VALUES ('".$Pname."','".$image."','".$price."');";
			   
			   	if(  mysqli_query($con,$sql))
				{
						echo "File uploaded Successfully";
				}
				else
				{
					echo "Opps something is wrong, Please select the file again";
				}
			   
		   }
		   
		   ?>
			
			
		  <?php
		   if(isset($_POST["btnUpdate"]))
		   {	
			   
			   $Pname=$_POST["ProductName"];
			   $image=$_POST["ProductPath"];
			   $price=$_POST["ProductPrice"];
			   
		   

		   $con = mysqli_connect("localhost","root","","DblaqCus");
			if(!$con)
			{	
				die("Cannot update the file, Please choose another file");		
			}
			   
			  
			   
			   $sql="UPDATE `products` SET `image`='".$image."',`price`='".$price."' WHERE `name` = '".$Pname."';";
			   
			   	if(  mysqli_query($con,$sql))
				{
						echo "File updated Successfully";
				}
				else
				{
					echo "Opps something is wrong, Please select the file again";
				}
			   
		   }
		   ?>
			
			<?php
			if(isset($_POST["btnDelete"]))
			{	
			   
			   $Pname=$_POST["ProductName"];
			  
			   
		   

		   $con = mysqli_connect("localhost","root","","DblaqCus");
			if(!$con)
			{	
				die("Cannot connect");		
			}
			   
			  
			   
			   $sql="DELETE FROM `products` WHERE `name` = '".$Pname."';";
			   
			   	if(  mysqli_query($con,$sql))
				{
						echo "File deleted Successfully";
				}
				else
				{
					echo "Opps something is wrong, Please select the file again";
				}
			   
		   }
		   ?>
				
				<input name="btnAdd" type="submit" class="btnAdd"id="btnAdd"  value="Add Product!" >
				<input name="btnUpdate" type="submit" class="btnUpdate"id="btnUpdate"  value="Update Product!" >
				<input name="btnDelete" type="submit" class="btnDelete" id="btnDelete"  value="Delete Product!" >
				<input name="resetproduct" type="reset" class="resetproduct" id="resetproduct" value="reset">
		</form>
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