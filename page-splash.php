<?php 
/*
Template Name: Splash - side
*/

?>
<!doctype html>
<meta charset="utf-8"/>
<head>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#fadeIn").delay(500).fadeIn(1000);
	});

</script>
<style>
@font-face {
    font-family: 'century_gothic';
    src: url('http://tairy.org/tankefuld/wp/century-gothic/gothic_0-webfont.eot');
    src: url('http://tairy.org/tankefuld/wp/century-gothic/gothic_0-webfont.eot?#iefix') format('embedded-opentype'),
         url('http://tairy.org/tankefuld/wp/century-gothic/gothic_0-webfont.woff') format('woff'),
         url('http://tairy.org/tankefuld/wp/century-gothic/gothic_0-webfont.ttf') format('truetype'),
         url('http://tairy.org/tankefuld/wp/century-gothic/gothic_0-webfont.svg#century_gothicregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'century_gothic_bold';
    src: url('http://tairy.org/tankefuld/wp/century-gothic/gothicb-webfont.eot');
    src: url('http://tairy.org/tankefuld/wp/century-gothic/gothicb-webfont.eot?#iefix') format('embedded-opentype'),
         url('http://tairy.org/tankefuld/wp/century-gothic/gothicb-webfont.woff') format('woff'),
         url('http://tairy.org/tankefuld/wp/century-gothic/gothicb-webfont.ttf') format('truetype'),
         url('http://tairy.org/tankefuld/wp/century-gothic/gothicb-webfont.svg#century_gothicregular') format('svg');
    font-weight: normal;
    font-style: normal;
}

*{
	margin:0;
	padding:0;	
	}

html{
	width:100%;
	height:100%;
	}

body{
	width:100%;
	min-width:500px;
	height:100%;
	background:#333;
	background-image:url(http://tairy.org/tankefuld/wp/wp-content/uploads/2013/12/bg-white-shaddow.png);
	background-position:center top;
	background-repeat:no-repeat;
	text-align:center;
	}
	
a img{
	display:inline-block;
	vertical-align:niddle;
	height:85px;
	margin:30px 40px 10px;
	}

#logo{
	margin-top:160px;
	height:208px;
	}

h1{
	padding-top:20px;
	line-height:1.4;
	display: inline-block;
	text-align: center;
	vertical-align: top;
	font-size: 39px;
	color: #ddbe97;
	text-decoration: none;
	text-align: left;
	font-family:century_gothic;
	margin:0;
	}
#site-description {
	margin:0;
	font-size: 27px;
	color: #fff;
	font-family:century_gothic;
	}
#fadeIn{
	display:none;
	}


</style>
</head>
<body>
<div id="fadeIn">
<a href="https://www.facebook.com/tankefuldSvendborg">
<img id="logo"src="http://tairy.org/tankefuld/wp/wp-content/uploads/2013/12/logo-tankefuld.png"/>
</a>
<br/>
<h1>Tankefuld inviterer...</h1>
<p id="site-description">Bæredygtig bydel i Svendborg</p>
<br>
<a href="https://www.facebook.com/tankefuldSvendborg">
<img style="border:1px solid #fff;height:81px;" src="http://www.pastaprima.net/wp-content/uploads/2013/03/ars-grafik-facebook-icon.png"/>
</a>
<a href="http://svendborg.dk/">
<img src="http://tairy.org/tankefuld/wp/wp-content/uploads/2013/12/logo-kommune.png"/>
</a>
</div>
</body>