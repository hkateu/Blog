<?php
require 'sendgrid-php/vendor/autoload.php';
if(isset($_POST['submit'])){
	if(isset($_POST['subject'], $_POST['message'], $_POST['email'])){
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$email2 = $_POST['email'];

		$sendgrid = new SendGrid("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");
		$email = new SendGrid\Email();

		$email->addTo("hkateu@gmail.com")
			->setFrom($email2)
			->setSubject($subject)
			->setHtml($message);
		$sendgrid->send($email);
	}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>hkanalytics Contacts Page</title>
<meta name="viewport" content="widith=device-widith, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="keywords" content="Uganda, statistics, econometrics, machine learning, python, R programming">
<meta name="author" content="About Kateu Herbert">
<meta name="robots" content="index, follow">

<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="css/docs.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
<script src="jquery/jquery-1.11.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</head>


<nav class="navbar navbar-inverse" role="navigation" style="border-radius:0px;">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
	<span class="sr-only">Toggle navigation</span> 
	<span class="icon-bar"></span> 
	<span class="icon-bar"></span> 
	<span class="icon-bar"></span> 
</button>
<a class="navbar-brand" rel="home" href="#" title="hkanalystics">
        <img style="max-width:100px; margin-top: -16px; z-index:4; position:relative;"
             src="img/logo.jpg">
    </a>

</div>
<div class="collapse navbar-collapse" id="example-navbar-collapse">
	<ul class="nav navbar-nav">
	<li style="padding-left:0px;" ><a style="color:rgb(2,59,102);" href="index.php">Home</a></li>
	<li style="padding-left:0px;" ><a href="about.php" style="color:rgb(2,59,102);" >About</a></li>
	<li style="padding-left:0px;" class="active" style="color:white;"><a href="#" style="background-color:rgb(2,59,102);" >Contact</a></li>
	</ul>
</div>
</nav>



<div class="col-md-12" style="padding:10px;"> 
<div class="col-md-6">
<div class="col-md-12">
<h2>Contacts Links</h2>
</div>
<div class="col-md-12"   style="height:45px; widith:201px; margin-top:2px;">
<a href="https://web.facebook.com/herbert.kateu"><img src="img/facebook.png"/></a>
</div>
<div class="col-md-12" style="height:45px; widith:201px; margin-top:2px;" >
<a href="https://twitter.com/hkanalytics"><img src="img/twitter.png" /></a>
</div>
<div class="col-md-12"  style="height:45px; widith:201px; margin-top:2px;" >
<a href="#"><img src="img/linkedin.png" /></a>
</div>

</div>
<div class="col-md-6" style="padding:10px;">
<div class="col-md-12">
<h2>Email me</h2>
</div>
<form action="contact.php" method="post">
<div class="form-group">
<label for "Subject">Subject</label>
  <input class="form-control" type="text" placeholder="Subject" id="subject" name="subject">
</div>

  <div class="form-group">
    <label for="Message">Message</label>
    <textarea class="form-control" style="height:80px;" id="message" placeholder="Enter Message" name="message"></textarea>
</div>
<div class="form-group">
<label for "Email">Your Email</label>
  <input class="form-control" type="email" placeholder="Your email address" id="email" name="email">
</div>
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12" style="height:auto; background-color:black; color:white;  padding:0px;">
<div class="col-md-6" style="padding:10:px;">
<img src="profile.jpg" style="height:20%; width:20%; margin-top:10px;" class="img-rounded img-responsive">
<p>Hi iam Kateu Herbert, a Statistics & Economics graduate from Kampala Uganda, this is my datascience portfolio showing projects i have worked on or contributed to plus a number of tutorials in Python and R.</p>
<p>For more info go to <a href="about.php">About</a></p>
<p>You can get in <a href="contact.php">contact</a> with him</p>
</div>
<div class="col-md-6" style="height:auto; padding:0px;">
<div class="col-md-12"><center><h4>TAGS</h4></center></div>
<div class="col-md-6 col-sm-6 col-xs-6" id="foottags" style="height:auto;">
<ul style="list-style:none; padding:0px;">
<li><a href="index.php?tag=1">Econometrics</a></li>
<li><a href="index.php?tag=2">Python</a></li>
<li><a href="index.php?tag=3">Matplotlib</a></li>
<li><a href="index.php?tag=4">Pandas</a></li>
<li><a href="index.php?tag=5">Statsmodels</a></li>
<li><a href="index.php?tag=6">Scipy</a></li>
<li><a href="index.php?tag=7">Numpy</a></li>
</ul>
</div>
<div class="col-md-6 col-sm-6 col-xs-6" style="height:auto; padding:0px;">
<ul style="list-style:none;">

</ul>

</div>
</div>
</div>

</html>
