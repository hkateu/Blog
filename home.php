<?php
if(isset($_GET['tag'])){
	$filter = $_GET['tag'];
}
?>

<!doctype html>
<html>
<head>
<title>hkanalytics Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="UTF-8">
<meta name="keywords" content="Uganda, statistics, econometrics, machine learning, python, R programming">
<meta name="author" content="About Kateu Herbert">
<meta name="robots" content="index, follow">

<link href="bootstrap/bootcss/bootstrap.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:teal;">
  <a class="navbar-brand" href="#">
  	<span class="navbar-brand mb-0 h1" style="font-family: 'Pacifico', cursive; font-size:30px;"><span style="color:rgb(48,44,44);">h</span><span style="color:rgb(217,14,14);">k</span><span style="color:rgb(238,177,17);">a</span><span style="color:rgb(76,49,11);">n</span><span style="color:rgb(113,189,189);">a</span><span style="color:rgb(48,44,44);">l</span><span style="color:rgb(217,14,14);">y</span><span style="color:rgb(238,177,17);">t</span><span style="color:rgb(76,49,11);">i</span><span style="color:rgb(113,189,189);">c</span><span style="color:rgb(48,44,44);">s</span>
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
	</ul>
	<ul class="navbar-nav ml-auto">
	<li class="nav-item">
        <a class="nav-link" href="#">Enquire</a>
      </li>
	 </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Pricing</button>
    </form>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid" style="background-image: url('img/home/desk.jpg'); background-size:cover; background-repeat:no-repeat; padding:0px;">
<div class="col" style="position:relative; z-index:10px; background-color:white; padding:5%; background:rgb(255,255,255,.4); color:black;">
  <h1 class="display-4">Take control of your data</h1>
  <p class="lead">See the benefits of analytics, make your data work for you.</p>
  <hr class="my-4">
  <p>All your data science needs just one click away.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a>
  </p>  
</div>
</div>

<div class="col" style="padding-bottom:10px;">
<div class="col-md-12"><h1 style="font-size:60px; text-align:center; font-family: 'Helvitica Neue', Helvitica, Arial, sans-serif;">Services we offer</h1></div>
<div class="row align-items-center">
<div class="col-md-4 mx-auto">
<div class="card" style="margin:5px; height:450px;">
  <img class="card-img-top" src="img/home/spread.jpg" alt="Card image cap" style="object-fit:cover; height:200px;">
  <div class="card-body">
    <h5 class="card-title">Spreadsheet Development</h5>
    <p class="card-text">We help develop spreadsheet with all relevant formulars, macros and forms, layed out in a meaningfull way in Excel and Google sheets according to your preference.</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>
<div class="col-md-4 mx-auto">
<div class="card" style="margin:5px; height:450px;">
  <img class="card-img-top" src="img/home/statistics.jpg" alt="Card image cap" style="object-fit:cover; height:200px;">
  <div class="card-body">
    <h5 class="card-title">Quantitative Analysis</h5>
    <p class="card-text">We perform all types of quantitative analysis ranging from exploratory analysis, statistics, timeseries and econometrics. Analysis is done using SPSS, Stata R and Python depending on your preference</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>

<div class="col-md-4 mx-auto">
<div class="card" style="margin:5px; height:450px;">
  <img class="card-img-top" src="img/home/neural.jpg" alt="Card image cap" style="object-fit:cover; height:200px;">
  <div class="card-body">
    <h5 class="card-title">Predictive Analytics</h5>
    <p class="card-text">We leverage machine learning and deep learning to make predictions with high levels of accuracy, primarily using Python and R.</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>
</div>
<div class="row align-items-center">
<div class="col-md-4 mx-auto">
<div class="card" style="margin:5px; height:400px;">
  <img class="card-img-top" src="img/home/dash.jpg" alt="Card image cap" style="object-fit:cover; height:200px;">
  <div class="card-body">
    <h5 class="card-title">Dashboard Development</h5>
    <p class="card-text">We will create for you robust dashboards to help you monitor important Key Performance Indicators using PowerBi and Tableau</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>
<div class="col-md-4 mx-auto">
<div class="card" style="margin:5px; height:400px;">
  <img class="card-img-top" src="img/home/viz.jpg" alt="Card image cap" style="object-fit:cover; height:200px;">
  <div class="card-body">
    <h5 class="card-title">Data Visualization</h5>
    <p class="card-text">We provide data visualization services using tools such as D3.js, ggplot, seaborn and matplotlib</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>
<div class="col-md-4 mx-auto">
<div class="card" style="margin:5px; height:400px;" >
  <img class="card-img-top" src="img/home/auto.jpg" alt="Card image cap" style="object-fit:cover; height:200px;">
  <div class="card-body">
    <h5 class="card-title">Script Automation</h5>
    <p class="card-text">We help automate your data analysis tasks using scripts such as Excels VBA, Google scripts, python and R</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>
</div>
</div>

<div class="row" style="height:auto; background-color:black; color:white;  padding:0px;">
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery.js"></script>
	<script src="bootstrap/proper.js"></script>
	<script src="bootstrap/bootjs/bootstrap.bundle.js"></script>
	</body>
</html>

