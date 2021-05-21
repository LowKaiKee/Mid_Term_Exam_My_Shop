<?php
    include_once("dbconnect.php");
    if(isset($_POST['submit'])){
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        $folder = '/xampp/htdocs/myshop262530/images/';
        //$image=$_FILES['primage']['name'];
        $prname = $_POST['prname'];
        $prtype = $_POST['prtype'];
        $prprice = $_POST['prprice'];
        $prqty = $_POST['prqty'];
		
        move_uploaded_file($filetmpname,$folder.$filename);
		$sqlinsert = "INSERT INTO tbl_products(primage,prname,prtype,prprice,prqty) VALUES('$filename','$prname','$prtype','$prprice','$prqty')";
		try{
			$conn->exec($sqlinsert);
			echo "<script> alert('Add Success.')</script>";
			echo "<script> window.location.replace('../php/index.php')</script>";
			}catch(PDOException $e){
			echo "<script> alert('Add failed')</script>";
			echo "<script> window.location.replace('../php/newproduct.php')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>Add Product</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../js/validate.js"></script>
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
			<a href="index.php" class="right">Go back previous page</a>
		</div>
		<div class="main">
			<center><img src="../images/myshop.png"></center>
			<div class="container">
				<form name="addNew" action="../php/newproduct.php" onsubmit="return validateAddNew()" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="row">
							<div class="col-25">
								<i class="fa fa-camera-retro"></i>
								<label for="primage">Product Image</label>
							</div>
							<div class="col-75">
								<input type="file" name="uploadfile" id="idimage"><br>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<i class="fa fa-pencil-square-o"></i>
								<label for="prname">Product Name</label>
							</div>
							<div class="col-75">
								<input type="text" id="idname" name="prname" placeholder="Please key in the product name">
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<i class="fa fa-suitcase"></i>
								<label for="prtype">Product Type</label>
							</div>
						</div>
						<div class="col-75">
							<select name="prtype" id="idtype">
								<option value="noselection">Please select the product type</option>
								<option value="Stationery">Stationery</option>
								<option value="Book">Book</option>
								<option value="Accessories">Accessories</option>
							</select>
						</div>
						<div class="row">
							<div class="col-25">
								<i class="fa fa-money"></i>
								<label for="prprice">Product Price</label>
							</div>
							<div class="col-75">
								<input type="text" id="idprice" name="prprice" placeholder="Please key in the product unit price">
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<i class="fa fa-sort-numeric-asc"></i>
								<label for="prqty">Product Quantity</label>
							</div>
							<div class="col-75">
								<input type="number" id="idqty" name="prqty" placeholder="Please key in the product quantity" min="1" max="100">
							</div>
						</div>
						<br>
						<div class="row">
							<div><input type="submit" name="submit" value="Add new product"></div>
						</div>
					</form>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<div class="footer">
				<p><b>Copyright 2021 <span>&#169;</span> My Shop. All rights reserved.</b></p>
			</div>
		</body>
		
	</html>	