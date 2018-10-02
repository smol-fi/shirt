<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include "./includes/config.php";
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/main.css">
	<link rel='stylesheet' href='./style/spectrum.css'>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script defer src="./script/main.js" type="text/javascript"></script>
	<script src='./script/spectrum.js'></script>
	<title>Custom t-shirt</title>
</head>
<body>
	<header>
		<h1 id="tosijees">Tosi Jees Shirts</h1>
	</header>
	<p id="not-supported">Sorry, this device is currently not supported.</p>
	<div id="container">
		<div id="shirtarea">
			<img id="shirt" src="./img/shirt_s.png" style="background-color: rgb(255,255,255);">
			<div id="text-container">
			<p id="shirttext">Your text here</p>
			</div>
		</div>
		<form action="./order.php" method="post">
			<div id="controls">
				<div id="colorbar" class="contentrow">
					<div id="selectwhite" class="colorbars" onclick="selWhite()"></div>
					<div id="selectblack" class="colorbars" onclick="selBlack()"></div>
					<div id="selectdodgerblue" class="colorbars" onclick="selDodgerblue()"></div>
					<div id="selectlightcoral" class="colorbars" onclick="selLightcoral()"></div>
					<div id="selectdarkkhaki" class="colorbars" onclick="selDarkkhaki()"></div>
					<select id="patternmenu" name="pattern">
						<option value="1">Colour</option>
						<option value="2">Tie dye</option>
						<option value="3">M/05</option>
					</select>
				</div>
				<br />
				<div id="customcolorbar" class="contentrow">
					<div class="slidercont">
						<label for="redslider" class="sliderlabel">Red: </label>
						<input type="range" name="red" id="redslider" class="rgbsliders colorsliders" value="255" min="0" max="255" step="1">
					</div>
					<div class="slidercont">
						<label for="greenslider" class="sliderlabel">Green: </label>
						<input type="range" name="green" id="greenslider" class="rgbsliders colorsliders" value="255" min="0" max="255" step="1">
					</div>
					<div class="slidercont">
						<label for="blueslider" class="sliderlabel">Blue: </label>
						<input type="range" name="blue" id="blueslider" class="rgbsliders colorsliders" value="255" min="0" max="255" step="1">
					</div>
					<div class="slidercont">
						<label for="greyslider" class="sliderlabel">Grey: </label>
						<input type="range" id="greyslider" class="colorsliders" value="255" min="0" max="255" step="1">
					</div>
				<div class="contentrow">
					<label for="text-input">Custom text: </label>
					<input type="text" name="shirttext" id="text-input" class="text-inputs" value ="" placeholder="Your text here" name="usertext">
				</div>
				<div id="textsize-container" class="contentrow">
					<label for="sizeslider">Text Size: </label>
					<input type="range" name="textsize" id="sizeslider" value="20" min="11" max="50" step="1">
				</div>
				<div class="contentrow">
					<label for="fontmenu">Font: </label>
					<select id="fontmenu" name="textfont">
						<option value="1">Times New Roman</option>
						<option value="2">Arial</option>
						<option value="3">Verdana</option>
						<option value="4">Tahoma</option>
					</select>
					<label for="textcolor">Text Colour: </label>
					<input type="text" id="textcolor" name="textcolor" value="">
				</div>
				<div id="fontbox-container" class="contentrow">
					Bold:
					<input type="checkbox" name="boldbox" id="boldbox" class="fontboxes" value="bold">
					Italic:
					<input type="checkbox" name="italicbox" id="italicbox" class="fontboxes" value="italic">
					Underlined:
					<input type="checkbox" name="underlinedbox" id="underlinedbox" class="fontboxes" value="underlined">
				</div>
				<br />
				<input type="submit" value="Order now!" id="orderbutton">
				</div>
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