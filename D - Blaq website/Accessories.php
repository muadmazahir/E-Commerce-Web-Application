<?php session_start();
	
	$products_ids=array();
	

	//check if Add to cart has been submitted
	if(isset($_POST['add_to_cart']))
	{
		if(isset($_SESSION['shopping_cart']))
		{
			//keep track of how many products are in the shopping cart
			$count= count($_SESSION['shopping_cart']);
			
			//create sequential array for matching array keys to product id's
			$products_ids= array_column($_SESSION['shopping_cart'],'id');
				
			if(!in_array($_GET['id'],$products_ids))
			{
				$_SESSION['shopping_cart'][$count]=array
				(
					'id' => $_GET['id'],
					'name' => $_POST['name'],
					'price' => $_POST['price'],
					'quantity' =>$_POST['quantity']
				);
			}
			else
			{	
				//product already exists, increase quantity
				//match array key to id of the product being added to the cart
				for($i=0; $i < count($products_ids);$i++)
				{
					if($products_ids[$i]==$_GET['id'])
					{	
						//add item quantity to the existing product in the array
						$_SESSION['shopping_cart'][$i]['quantity']+=$_POST['quantity'];
					}
				}
			}
			
		}
		else
		{	//if the shopping cart doesn't exist, create first product with array key 0
			//create array using submitted form data,start from key 0 and fill it with values
			$_SESSION['shopping_cart'][0]=array
			(
				'id' => $_GET['id'],
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'quantity' =>$_POST['quantity']
			);
					
			
		}
	}

if($_GET['action']=="delete")
{
	//loop through all products in the shopping cart untill it matches with GET id variable
	foreach($_SESSION['shopping_cart'] as $key => $product)
	{
		if($product['id'] == $_GET['id'])
		{
			//remove product from the shopping cart when it matches with the GET id
			unset($_SESSION['shopping_cart'][$key]);
		}
	}
	//reset session array keys so they match with $products_ids numeric array
	$_SESSION['shopping_cart']= array_values($_SESSION['shopping_cart']);
}

?>
<!DOCTYPE html>
<html lang="">

<head>
	<style>
		.products 
		{	
			padding: 20px 0;
    		text-align: center;
			
		}
		.products img
		{
			   
   			width: 100%;
    		padding: 4px;
    		background-color: #fff;
    		box-shadow: 0px 0px 2px black;
    		border-radius: 3px;
    		height: 250px;
    		object-fit: cover;

			
		}
		.table
		{
			margin: 0px auto;
			float: none;
		}
		.row
		{
			margin: 0px auto;
			float: none;
		}
		.centered
		{
			margin: 0 auto;
			float: none;
		}
		#checkout
		{
			width: 100%;
			background: #6394f8;
			color: white;
			text-align: center;
			padding: 12px;
			display:block;
			border-radius: 3px;
			font-size: 16px;
			margin: 25px 0 15px 0;
		}
		#checkout:visited 
		{

			color: white;
		}
		#checkout:hover
		{
			background: #7fa9ff;
			color: white;
		}
		#checkout:active
		{
			
			color: white;
		}
		.btn-danger
		{
			font-size: 12px;
			padding: 3px;
			
		}
		h3
		{
			margin-top: 
		}
	</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/product.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	

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
                    <li><a href="#"  class="active"> Products</a></li>
                    <li><a href="ContactUs.php"> Contact</a></li>
					<li><a href="Account.php"> Account </a></li>
                    <li><a href="signin.php"> Sign-in  </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </nav>
    </header>




    <div class="container">
		
		<?php
		
			 $con = mysqli_connect("localhost","root","","DblaqCus");
			 $sql ="SELECT * FROM `products` ORDER BY id ASC";	
					
			 $result = mysqli_query($con,$sql);
		
				if($result)
				{
					if(mysqli_num_rows($result)> 0)
					{
						while($product = mysqli_fetch_assoc($result))
						{	
							
							?>
							  <div class="col-sm-4" "col-md-3">	
								<form name="imgForm" method="post" action="Accessories.php?action=add&id=<?php echo $product['id']; ?>">
									<div class="products">
										<img src="<?php echo $product['image']; ?>" class="img-responsive"/>
										<h4 class="text-info"><?php echo $product['name'];?></h4>
										<h4>LKR <?php echo $product['price']; ?></h4>
										<input type="text" name="quantity" class="form-control" value="1">
										<input type="hidden" name="name" value="<?php echo $product['name'];?>" />
										<input type="hidden" name="price" value="<?php echo $product['price'];?>" />
										<input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-info" value="Add to cart" />
									</div>
								</form>
							 </div>
							<?php
						}
					}
					
				}
		
		?>
		
		<form name="detailsForm" method="post" action="Accessories.php">
		<div style="clear: both"></div>
		<br>
		<div class="table-responsive">
			<table class="table">
				<tr><th colspan="5"><h3>Order Details</h3></th></tr>
				
				<tr>
					<th width="40%">Product Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
				</tr>
				<?php
					if(!empty($_SESSION['shopping_cart']))
					{
						$total=0;
						
						foreach($_SESSION['shopping_cart'] as $key => $product)
						{
				?>			
							<tr>
								<td><?php echo $product['name']; ?></td>
								<td><?php echo $product['quantity']; ?></td>
								<td>LKR<?php echo $product['price']; ?></td>
								<td>LKR<?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
								<td>
									<a href="Accessories.php?action=delete&id=<?php echo $product['id']; ?>">
										<div class="btn-danger">Remove</div>
									</a>
								</td>
							</tr>
							<?php
									$total=$total + ($product['quantity'] * $product['price']);
						}
							?>
							<tr>
									<td colspan="3" align="right">Total</td>
									<td align="right">LKR <?php echo number_format($total, 2); ?></td>
									
								
							</tr>
							<tr>
								<!-- show chckout button only if the shopping cart is not empty -->
								<td colspan="5">
									
									
									
								<?php
									if(isset($_SESSION['shopping_cart']))
									{
										if(count($_SESSION['shopping_cart']) > 0)
										{
								?>
									<?php
										if(isset($_POST["checkout"]))
										{
											
				
											$con = mysqli_connect("localhost","root","","DblaqCus");
											if(!$con)
											{	
												die("Cannot upload the file, Please choose another file");		
											}
				
											$sql="INSERT INTO `orders`(`email`, `totalPrice`, `status`) VALUES ('".$_SESSION["username"]."','".$total."','processing');";
			   
											if(mysqli_query($con,$sql))
											{
												echo "File uploaded Successfully";
											}
											else
											{
												echo "Opps something is wrong, Please select the file again";
											}
										}
	
									?>
											<a href="#" class="button"><input type="submit" name="checkout" id="checkout" value="Checkout"></a>
								<?php
										}
									}
								?>
								</td>	
							</tr>
				<?php
					}
				?>
			</table>
		</div>
			
		</form>
		
       
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
