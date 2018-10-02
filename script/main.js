//	list variables with a null value for proper assignment later
var tShirt = null,
	tshirtText = null,
	sliderRed = null,
	sliderGreen = null,
	sliderBlue = null,
	sliderGrey = null,
	sliders = null,
	shirtPattern = null,
	userText = null,
	textSize = null,
	textFont = null,
	fontChoice = null,
	textColor = null,
	textBold = null,
	textItalic = null,
	textUnderlined = null,
	textBoxes = null,
	colorBars = null
;

//	list RGB values for each preset on page
var colPreset = {
	white: {
		r: 255,
		g: 255,
		b: 255
	},
	black: {
		r: 0,
		g: 0,
		b: 0
	},
	dodgerblue: {
		r: 30,
		g: 144,
		b: 255
	},
	lightcoral: {
		r: 240,
		g: 128,
		b: 128
	},
	darkkhaki: {
		r: 189,
		g: 183,
		b: 107
	}
};

//	list patterns
var patternPreset = [
	"none",
	"url('./img/tiedye.jpg')",
	"url('./img/m05.jpeg')"
];

//	list font choices
var fontPreset = [
	"Times New Roman",
	"Arial",
	"Verdana",
	"Tahoma"
];

//	assign values to variables as content is loaded
document.addEventListener("DOMContentLoaded", function(e){
	tShirt = document.getElementById("shirt");
	tshirtText = document.getElementById("shirttext");
	sliderRed = document.getElementById("redslider");
	sliderGreen = document.getElementById("greenslider");
	sliderBlue = document.getElementById("blueslider");
	sliderGrey = document.getElementById("greyslider");
	shirtPattern = document.getElementById("patternmenu");
	userText = document.getElementById("text-input");
	textSize = document.getElementById("sizeslider");
	textFont = document.getElementById("fontmenu");
	textBold = document.getElementById("boldbox");
	textItalic = document.getElementById("italicbox");
	textUnderlined = document.getElementById("underlinedbox");
	colorBars = document.getElementsByClassName("colorbars");

//	add event listeners to objects to make user input appear on page
	shirtPattern.addEventListener(
		"input", function(p){
			changePattern(shirtPattern.value)
		}
	);
	textFont.addEventListener(
		"input", changeFont
	);
	sliderGrey.addEventListener(
		"input", greyScale
	);
	userText.addEventListener(
		"input", shirtText
	);
	textSize.addEventListener(
		"input", changeSize
	);
//	add event listeners for font style boxes and make them feed argument to the styleText(b,i,u) function
	textBoxes = document.querySelectorAll('.fontboxes');
	textBoxes.forEach(
		function(s){
			s.addEventListener(
				"input", function(e){
					styleText(textBold.checked,textItalic.checked,textUnderlined.checked);
				}
			)
		}
	);

//	get sliders based on class and add event listeners to each of them and make them feed arguments to the shirtColor(r,g,b) function
	rgbsliders = document.querySelectorAll('.rgbsliders');
	rgbsliders.forEach(
		function(s){
			s.addEventListener(
				"input", function(e){
					shirtColor(sliderRed.value,sliderGreen.value,sliderBlue.value);
				}
			)
		}
	);

//	run changeFont() immediately once to ensure font size and shirt font match what is initially stated in DOM
	changeFont();
}
);


//	change shirt colour to selected preset
function selWhite(){
	selColor(colPreset.white);
}

function selBlack(){
	selColor(colPreset.black);
}

function selDodgerblue(){
	selColor(colPreset.dodgerblue);
}

function selLightcoral(){
	selColor(colPreset.lightcoral);
}

function selDarkkhaki(){
	selColor(colPreset.darkkhaki);
}

//	tell shirtColor() to actualise the colour choice based on RGB-values of colour presets
//	tell updateSliders() to update RGB-sliders to the same values
function selColor(p){
	shirtColor(p.r,p.g,p.b)
	updateSliders(p.r,p.g,p.b);
}

//	update sliders to show values submitted by other scripts
function updateSliders(r,g,b){
	sliderRed.value = r;
	sliderGreen.value = g;
	sliderBlue.value = b;
}

//	change the background-color css-property to "rgb(value1,value2,value3)"
function shirtColor(r,g,b){
	tShirt.style.backgroundColor = "rgb("+r+","+g+","+b+")";
}

//
function changePattern(p){
	if(p != 1){
		sliderRed.disabled = true;
		sliderGreen.disabled = true;
		sliderBlue.disabled = true;
		sliderGrey.disabled = true;
		for (i=0; i < colorBars.length; i++){
			colorBars[i].style.display = "none";
		}
		shirtPattern.style.marginLeft = "270px";
	}
	else {
		sliderRed.disabled = false;
		sliderGreen.disabled = false;
		sliderBlue.disabled = false;
		sliderGrey.disabled = false;
			for (i=0; i < colorBars.length; i++){
				colorBars[i].style.display = "inline";
			}
		shirtPattern.style.marginLeft = "10px";
	}

	tShirt.style.backgroundImage = patternPreset[p - 1];
}

//	set background-color to be the value of the greyscale-slider (gr) as "rgb(gr,gr,gr)"
//	tell RGB-sliders to update to the value of gr
function greyScale(){
	gr = sliderGrey.value;
	shirtColor(gr,gr,gr);
	updateSliders(gr,gr,gr);
}

//	change the shirt text to be what is entered in the custom text box
function shirtText(){
	tshirtText.innerHTML = userText.value;
}

//	change the shirt text's font size when slider is dragged
function changeSize(){
	tshirtText.style.fontSize = textSize.value + "px";
} 

//	change the shirt text's font of text to one out of four options, listed in the fontPreset array
function changeFont(){
	tshirtText.style.font = textSize.value +
	"px"+
	" " +
	fontPreset[textFont.value - 1];
}

//	add spectrum.js for font colour selection, documentation available at https://bgrins.github.io/spectrum/
$("#textcolor").spectrum({
	preferredFormat:"rgb",
    color: "rgb(0,0,0)",
	change: function(color) {
		document.getElementById("text-container").style.color = color;
    }
});

//	make text on shirt bold/italic/underlined based on user input
function styleText(b,i,u){
	if(b === true){
		tshirtText.style.fontWeight = "bold";
	}
	else {
		tshirtText.style.fontWeight = "normal";
	}

	if(i === true){
		tshirtText.style.fontStyle = "italic";
	}
	else {
		tshirtText.style.fontStyle = "normal";
	}

	if(u === true){
		tshirtText.style.textDecoration = "underline";
	}
	else {
		tshirtText.style.textDecoration = "none";
	}
}
