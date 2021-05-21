<!DOCTYPE html>
<html>
	<head>
		<title>My Shop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="shortcut icon" type="image" href="../images/myshop.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<body>
		<div class="header">
			<h1>My Shop</h1>
			<p><b>Your best stationery partner</b></p>
		</div>
		<div class="navbar">
			<a href=" " class=" "></a>
		</div>
		<div class="main">
			<center>
				<img src="../images/myshop.png">
				<h1 class="xlarge-font"><b>Welcome to My Shop</b></h1>
				<p>We are always ready to serve you.</p>
			</center>
		</div>
		
		<center>
			<h1 class="xlarge-font"><b>Our Products</b></h1>
		</center>
		
		<div class="row">
		<?php
			$conn = mysqli_connect("localhost","root","") or die("Unable to connect");
			mysqli_select_db($conn,"myshopdb");
			
			$sql ="SELECT * FROM tbl_products";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
				?>
				
					<div class="column">
						<div class="card">
							<img src = "/myshop262530/images/<?php echo $row['primage'];?>" style="width:100%">
							<p class="category"> &nbsp&nbsp<?php echo $row['prname']; ?></p>
							<p class="category">Product type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
							<p class="category">Product price: &nbsp&nbsp<?php echo $row['prprice']; ?></p>
							<p class="category">Quantity: &nbsp&nbsp<?php echo $row['prqty']; ?></p>
						</div>
					</div>
				
				<?php
				}
			}
		?>
		</div>
		<br>
		<br>
		<br>
		<br>
		
		<a href="newproduct.php" class="float">
			<i class="fa fa-plus my-float"></i>
			<span class="tooltiptext">Click here to add new product</span>
		</a>
	</body>
</html>				