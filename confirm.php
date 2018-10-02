<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Custom Shirt</title>
	<?php include "./includes/config.php";
	
		$color = $_POST['color'];
		$text = $_POST['text'];
		$textcolor = $_POST['textcolor'];
		$font = $_POST['font'];
		$textsize = $_POST['textsize'];
		$bold = $_POST['bold'];
		$italic = $_POST['italic'];
		$underline = $_POST['underline'];
		
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$tel = $_POST['phone'];
		$address = $_POST['address'];
		$pcode = $_POST['pcode'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$delivery = $_POST['delivery'];
		
		try {
			$con->beginTransaction();
			
			$stmt2 = $con->prepare("INSERT INTO customer(Name, Tel, Email, Address, Pcode, City, Country) VALUES (:name, :tel, :email, :address, :pcode, :city, :country)");
			
			$stmt2->bindParam(":name",$name,PDO::PARAM_STR,30);
			$stmt2->bindParam(":tel",$tel,PDO::PARAM_STR,20);
			$stmt2->bindParam(":email",$email,PDO::PARAM_STR,50);
			$stmt2->bindParam(":address",$address,PDO::PARAM_STR,50);
			$stmt2->bindParam(":pcode",$pcode,PDO::PARAM_INT,11);
			$stmt2->bindParam(":city",$city,PDO::PARAM_STR,30);
			$stmt2->bindParam(":country",$country,PDO::PARAM_STR,20);
			$stmt2->execute();
			
			$last_id = $con->lastInsertId();
			
			$stmt = $con->prepare("INSERT INTO orders(Colouroption, Text, Font, Size, Colour, Bold, Italic, Underline, Deliver, CustomerID) VALUES (:colopt, :text, :font, :size, :colour, :bold, :italic, :underline, :deliver, :customerId)");
			
			$stmt->bindParam(":colopt",$color,PDO::PARAM_STR,20);
			$stmt->bindParam(":text",$text,PDO::PARAM_STR);
			$stmt->bindParam(":font",$font,PDO::PARAM_STR,15);
			$stmt->bindParam(":size",$textsize,PDO::PARAM_INT);
			$stmt->bindParam(":colour",$textcolor,PDO::PARAM_STR,20);
			$stmt->bindParam(":bold",$bold,PDO::PARAM_INT,1);
			$stmt->bindParam(":italic",$italic,PDO::PARAM_INT,1);
			$stmt->bindParam(":underline",$underline,PDO::PARAM_INT,1);
			$stmt->bindParam(":deliver",$delivery,PDO::PARAM_STR,7);
			$stmt->bindParam(":customerId",$last_id,PDO::PARAM_INT,11);
			
			$stmt->execute();

			$con->commit();
		} 
		
		catch(Exception $e) {
			$con->rollback();
			print "Error: " . $e->getMessage() . "<br />";
		}

	?>
	<link rel="stylesheet" href="./style/main.css">
</head>
	<body>
		<h2>Okay, order has been sent!</h2>
		<h3>Your order will be shipped to:</h3>
		<div id="orderdetails">
			<p>Name: <?php echo $name;?></p>
			<p>E-mail: <?php echo $email;?></p>
			<p>Phone: <?php echo $tel;?></p>
			<p>Address: <?php echo $address.", ".$pcode." ".$city.", ".$country;?></p>
			<p>Delivery: <?php echo $delivery;?></p>
		</div>
	</body>
</html>
