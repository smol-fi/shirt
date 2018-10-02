<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Custom Shirt</title>
	<?php
		include "./includes/config.php";
		if($_POST['pattern']==1){
			$color = "rgb(".$_POST['red'].",".$_POST['green'].",".$_POST['blue'].");";
		}
		else if($_POST['pattern']==2){
			$color = "Tie dye";
		}
		else if($_POST['pattern']==3){
			$color="M/05";
		}
		$text = $_POST['shirttext'];
		
		if($_POST['textfont']==1){
			$font = "Times New Roman";
		}
		else if($_POST['textfont']==2){
			$font = "Arial";
		}
		else if($_POST['textfont']==3){
			$font = "Verdana";
		}
		else if($_POST['textfont']==4){
			$font = "Tahoma";
		}
		$textsize = $_POST['textsize']."px";
		$textcolor = $_POST['textcolor'];
		if(isset($_POST['boldbox'])){
			$bold = 1;
		}
		else{
			$bold = 0;
		}
		if(isset($_POST['italicbox'])){
			$italic = 1;
		}
		else{
			$italic = 0;
		}
		if(isset($_POST['underlinedbox'])){
			$underline = 1;
		}
		else{
			$underline = 0;
		}
	?>
	<link rel="stylesheet" href="./style/main.css">
	<link rel="stylesheet" href="./style/order.css">
</head>
<body>
	<header>
		<h1 id="tosijees">Tosi Jees Shirts</h1>
	</header>
	<p id="not-supported">Sorry, this device is currently not supported.</p>
	<div id="container">
		<h1>Finalise your order</h1>
		<form action="./confirm.php" method="post">
			<div id="table-container">
				<table id="properties-table" class="contentrow">
					<tr>
						<th>Colour or pattern</th>
						<th>Text</th>
						<th>Text colour</th>
						<th>Text font</th>
						<th>Text size</th>
						<th>Bold</th>
						<th>Italic</th>
						<th>Underlined</th>
					</tr>
					<tr>
					<td>
					<input type="hidden" name="color" value="<?php echo $color;?>">
						<?php
						if($_POST['pattern']==1){
							echo "<div style=\"border:1px solid black;height:30px;width:30px;background-color:".$color."\"class=\"colorbox\"></div>";
						}
						else{
							echo $color;
						}
						?>
					</td>
					<td>
						<input type="hidden" name="text" value="<?php echo $text;?>">
						<p><?php echo $text;?></p>
					</td>
					<td>
						<input type="hidden" name="textcolor" value="<?php echo $textcolor;?>">
							<?php
								if($text == ""){
									echo "";
								}
								else if($text != "" && $textcolor == ""){
									$textcolor = "rgb(0,0,0)";
									echo "<div style=\"border:1px solid black;height:30px;width:30px;background-color:".$textcolor.";\"class=\"colorbox\"></div>";
								}
								else {
									echo "<div style=\"border:1px solid black;height:30px;width:30px;background-color:".$textcolor.";\"class=\"colorbox\"></div>";
								}
							?>
					</td>
					<td>
						<input type="hidden" name="font" value="<?php echo $font;?>">
						<p><?php echo $font;?></p>
					</td>
					<td>
						<input type="hidden" name="textsize" value="<?php echo $size;?>">
						<p><?php echo $textsize;?></p>
					</td>
					<td>
						<input type="hidden" name="bold" value="<?php echo $bold;?>">
						<p><?php
							if ($bold==1){
								echo "Yes";
							}
							else {
								echo "No";
							}
						?></p>
					</td>
					<td>
						<input type="hidden" name="italic" value="<?php echo $italic; ?>">
						<p><?php
							if ($italic==1){
								echo "Yes";
							}
							else {
								echo "No";
							}
						?></p>
					<td>
						<input type="hidden" name="underline" value="<?php echo $underline; ?>">
						<p><?php
							if ($underline==1){
								echo "Yes";
							}
							else {
								echo "No";
							}
						?></p>
					</td>
					</tr>
				</table>
			</div>
			<div class="contentrow">
				<label> Name: </label>
				<input type="text" name="name" value="" placeholder="John Doe">
			</div>
			<div class="contentrow">
				<label>E-mail: </label>
				<input type="email" name="email" value="" placeholder="name@domain.tld">
			</div>
			<div class="contentrow">
				<label>Phone: </label>
				<input type="text" name="phone" value="" placeholder="xxx-xxxxxxx">
			</div>
			<div class="contentrow">
				<label>Address: </label>
				<input type="text" name="address" value="" placeholder="Streetname 00">
			</div>
			<div class="contentrow">
				<label>Zip-code: </label>
				<input type="text" name="pcode" value="" placeholder="00000">
			</div>
			<div class="contentrow">
				<label>City: </label>
				<input type="text" name="city" value="" placeholder="Your city">
			</div>
			<div class="contentrow">
				<label>Country: </label>
				<input type="text" name="country" value="" placeholder="Your country">
			</div>
			<div class="contentrow">
				<label>Delivery method: </label>
				<input type="radio" name="delivery" value="Regular"><label>Regular delivery</label>
				<div class="clear800"></div>
				<input type="radio" name="delivery" value="Express"><label>Express delivery</label>
				<input type="radio" name="delivery" value="Deluxe"><label>Deluxe express delivery</label>
			</div>
			<div class="contentrow">
				<input type="submit" value="Confirm order" id="orderbutton">
			</div>
		</form>
	</div>
	<div id="padding-bot">
	</div>
	<footer>
		<p id="footer-text">Tosi Jees Shirts, 2018</p>
	</footer>
</body>
</html>