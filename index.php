<?php

if(date("Y-m-d", time()) < "2017-04-01"){
	echo "This version is only available after <b>2017-04-01</b><br />Click <a href='../care_v2.0.5/?noprompt=true'>here</a> to load the correct version";
	die();
}
require_once "./lib/db_function.php";
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title><?= $project_title; ?></title>
  <link rel="shortcut icon" href="./images/footer_care.png">
  <link rel="icon" href="./images/footer_care.png">
  <link rel="stylesheet" type="text/css" media="all" href="style.css">
  <link rel="stylesheet" type="text/css" media="all" href="./lib2/cssmenu/styles_menu.css">
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
  <!-- jQuery plugin leanModal under MIT License http://leanmodal.finelysliced.com.au/ -->
</head>

<body>
	<div id="topbar">
		<div  id='cssmenu'>
			<ul>
				<li>
					<a href='#'>CARE</a>
				</li>
			</ul>
		</div>
	</div>
  <div id="w">
    <div id="content">
      <!--<h1>WELCOME TO CARE SOFTWARE</h1>-->
      <center>
	  <!--<img src='./images/home.png' style='border-radius:4px;' />-->
	  <?= $project_name; ?>:
	  <?= $version; ?>
	  <a href="#loginmodal" style='margin-top:160px;' class="flatbtn" id="modaltrigger">Login</a>
	  </center>
    </div>
  </div>
  <div id="loginmodal" style="display:none;">
    <h1>User Login</h1>
    <form id="loginform" name="loginform" method="post" action="index.html">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" class="txtfield" tabindex="1">
      
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" class="txtfield" tabindex="2">
      
      <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu" value="Log In" tabindex="3"></div>
	  <div class="login_result"></div>
    </form>
  </div>
  
  <div id="footer">
	<img src='./images/footer_care.png' style='float:left;' />
	<img src='./images/footer_care.png' style='float:right;' />
	<a href='./about/KIZIBERE.html' onclick='alert("Sorry Not Available Now!"); return false;' title='About KIZIBERE Health Center'>Sovu</a> | <a href='./about/eol.html' onclick='alert("Sorry Not Available Now!"); return false;' title='About EASY ONE LIMITED'>EOL</a> | <a href='./about/care.html' onclick='alert("Sorry Not Available Now!"); return false;' title='About CARE HEALTH CENTER INFORMATION MANAGEMENT SYSTEM'>CARE</a> | <a href="./care/user_manual.docx" onclick='alert("Sorry Not Available Now!"); return false;' title='Click to download User Manual'>User Manual</a><br />
	
	<?= @$app_name ?> <?= @$version ?> build <?= @$build ?>
	<br />
	<!-- Designed By <a href=''  onclick='alert("Sorry Not Available Now!"); return false;' title='More about Hebert'><?= $designer ?></a> -->
	 Developed By <a href='https://www.easyoneltd.com' title='About Easy One LTD' onclick='alert("Check Internet Connection"); return false;'>EASY ONE LIMITED</a> <br />&copy; EASY ONE LIMITED
  </div>
<script type="text/javascript">
$(function(){

	$("#username").keypress(function(e){
		$("#username").removeClass("error");
	});
	$("#password").keypress(function(e){
		$("#password").removeClass("error");
	});
  $('#loginform').submit(function(e){
	var username = $("#username").val();
	var password = $("#password").val();
	if(username == ""){
		$("#username").addClass("error");
		return e.preventDefault();
	}
	
	if(password == ""){
		$("#password").addClass("error");
		return e.preventDefault();
	}
	//submit the request using JQuery Ajax function
	$.ajax({
		type: "POST",
		url: "./login.php",
		data: "username=" + $("#username").val() + "&password=" + $("#password").val() + "&url=ajax",
		cache: false,
		success: function(result){
			$(".login_result").html(result);
		}
	});
    return e.preventDefault();
	
  });
  
  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
  $("#modaltrigger").click(function(e){
	$("#username").focus();
  });
  $("#modaltrigger").click();
  $('body').mousedown(function(e) {
	var clicked = $(e.target); // get the element clicked
	if (clicked.is('#loginmodal') || clicked.parents().is('#loginmodal')) {
		return; // click happened within the dialog, do nothing here
   } else { // click was outside the dialog, so close it
     //$('.overlay').hide();
	 return false;
   }
});
});
</script>
</body>
</html>