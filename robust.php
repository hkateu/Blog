<html>
	<head>
		<title>hkanalytics | Testing and dealing with Heteroskedasticity in python.</title>
		<meta name="viewport" content="width=divice-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="keywords" content="Uganda, statistics, economics, machine learning, python, statsmodels">
		<meta name="author" content="Kateu Herbert">
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

	<a class="navbar-brand" style = "color:yellow;">
	<img style="max-width:100px; margin-top: -16px; z-index:4; position:relative;"
             src="img/logo.jpg">
	</a>
</div>
<div class="collapse navbar-collapse" id="example-navbar-collapse">
	<ul class="nav navbar-nav">
	<li style="padding-left:0px;" ><a style="color:rgb(2,59,102);" href="index.php">Home</a></li>
	<li style="padding-left:0px;" ><a href="about.php" style="color:rgb(2,59,102);" >About</a></li>
	<li style="padding-left:0px;"><a href="contact.php" style="color:rgb(2,59,102);">Contact</a></li>
	</ul>
</div>
</nav>

		<div class="container col-md-12">
			<div class="col-md-12">
				<h1><center>TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 2, HANDLING HETEROSKEDASTICITY WITH ROBUST LINEAR REGRESSION</center></h1>
				<p>This tutorial will teach you how to deal with heteroskedasticity in multiple linear regression using robust linear models.</p>
<p>This is a continuation of the previous post titled <a href="heteroskedasticity.php">TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 1</a>, it would be better to read through it before going on with this post.</p>
			</div>
		<div class="col-md-12">
			<p>Importing the necessary libraries</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>%matplotlib inline</p>
		</br>
		<p>import matplotlib</p>
		<p>import numpy as np</p>
		<p>import matplotlib.pyplot as plt</p>

		<p>import pandas as pd</p>
		<p>from pandas import DataFrame, Series</p>
		<p>import statsmodels.api as sm</p>
		</code>
			</div>
		<div class="col-md-12">
			<p>Using the same data on food expenditure</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>food = pd.read_csv('food.csv')</p>
			<p>foodexp = food['food_exp']</p>
			<p>income = food['income']</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>We can create Robust model to deal with heteroskedasticity using statsmodels RML() function for robust models</p>
		</div>	
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>robModel = sm.RLM(foodexp, sm.add_constant(income), M=sm.robust.norms.HuberT())</p>
			<p>robRel = robModel.fit()</p>
			<p>print(robRel.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>                    Robust linear Model Regression Results                    
==============================================================================
Dep. Variable:               food_exp   No. Observations:                   40
Model:                            RLM   Df Residuals:                       38
Method:                          IRLS   Df Model:                            1
Norm:                          HuberT                                         
Scale Est.:                       mad                                         
Cov Type:                          H1                                         
Date:                Sat, 12 Jan 2019                                         
Time:                        10:11:04                                         
No. Iterations:                     9                                         
==============================================================================
                 coef    std err          z      P&gt;|z|      [0.025      0.975]
------------------------------------------------------------------------------
const         85.7880     47.143      1.820      0.069      -6.611     178.187
income        10.1461      2.273      4.463      0.000       5.691      14.602
==============================================================================

If the model instance has been used for another fit with different fit
parameters, then the fit options might not be the correct ones anymore .
</pre>
		</div>
		<div class="col-md-12" >
			<p>When you compare the standard errors in the robust model and the OLS model, in the <a href="heteroskedasticity.php">previous post</a>, you find that those in the Robust model are larger to compensate for heteroskedasticity</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="log_trans.php">TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 3, HANDLING HETEROSKEDASTICITY WITH LOG TRANSFORMATION</a></p>
			<p>PREVIOUS:: <a href="heteroskedasticity.php">TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 1</a></p>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/robust.php';  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = '0002'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://hkanalytics-co-ug.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <script id="dsq-count-scr" src="//hkanalytics-co-ug.disqus.com/count.js" async></script>                 
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
