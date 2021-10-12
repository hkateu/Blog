<html>
	<head>
		<title>hkanalytics | Getting Beta Coefficients from Z-Scores.</title>
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
				<h1><center>GETTING BETA COEFFICIENTS FROM Z-SCORES</center></h1>
				<p>This tutorial will give you an understanding of multiple regression using z-scores and how to interpret the results</p>
				<p>This is a continuation of my previous post on <a href="polynomial_reg.php">polynomial regression</a>, if you havent read through it, please go back and check it out before continuing with this tutorial. </p>
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
		<p>import statsmodels.formula.api as smf</p>
		</code>
			</div>
		<div class="col-md-12">
			<p>In this tutorial we are regressing our variables using their z-scores. Therefore the interpretation will be based standard deviations as we shall see</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>from scipy.stats.mstats import zscore</p>
			<p>salesModelU3 = smf.ols(formula = 'zscore(sales) ~ zscore(price) + zscore(advert) + zscore(advertt)', data = andy)</p>
			<p>results3 = salesModelU3.fit()</p>
			<p>print(results3.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:          zscore(sales)   R-squared:                       0.508
Model:                            OLS   Adj. R-squared:                  0.487
Method:                 Least Squares   F-statistic:                     24.46
Date:                Sun, 13 Jan 2019   Prob (F-statistic):           5.60e-11
Time:                        15:55:36   Log-Likelihood:                -79.805
No. Observations:                  75   AIC:                             167.6
Df Residuals:                      71   BIC:                             176.9
Df Model:                           3                                         
Covariance Type:            nonrobust                                         
===================================================================================
                      coef    std err          t      P&gt;|t|      [0.025      0.975]
-----------------------------------------------------------------------------------
Intercept       -7.078e-16      0.083   -8.5e-15      1.000      -0.166       0.166
zscore(price)      -0.6104      0.084     -7.304      0.000      -0.777      -0.444
zscore(advert)      1.5575      0.456      3.417      0.001       0.649       2.466
zscore(advertt)    -1.3420      0.456     -2.943      0.004      -2.251      -0.433
==============================================================================
Omnibus:                        1.004   Durbin-Watson:                   2.043
Prob(Omnibus):                  0.605   Jarque-Bera (JB):                0.455
Skew:                          -0.088   Prob(JB):                        0.797
Kurtosis:                       3.339   Cond. No.                         10.9
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
			<p>A one standard deviation increase in price decreases sales by 0.08.</p>
			<p>Differenciating advert with respect to sales slope = beta1 + 2beta2 advert therefore if advert increases by one standard deviation, sales will decrease by 1.5575 - 2*1.3420, which is 1.1265 standard deviations.</p>
		</div>	
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>x = [0,1,2,3,4,5,6,7,8,9,10]</p>
			<p>y = []</p>
			</p>for i in x:</p>
			<p>&nbsp; c = 1.5575*i - 1.3420*(i**2)</p>
			<p>&nbsp; y.append(c)</p>
			<p>print(y)</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>[0.0, 0.21550000000000002, -2.253, -7.405500000000001, -15.242, -25.762500000000003, -38.967000000000006, -54.855500000000006, -73.428, -94.68450000000001, -118.62500000000001]
</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>fig,ax = plt.subplots()</p>
			<p>plt.plot(x,y)</p>
			<p>plt.title('Graph showing the turning point of the equation')</p>
			<p>plt.xlabel('X-Variable')</p>
			<p>plt.ylabel('Y-Variable')</p>
			<p>fig.savefig("tpoint.png", bbox_inches = "tight")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/tpoint.png" />
		</div>
		<div class="col-md-12" >
			<p>calculating the turning point |beta1/2beta2|</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>tpoint = abs(1.5572/(2*1.3420))</p> 
			<p>print(tpoint)</p>
			</code>
		</div>
		
		<div class="col-md-12" >
			<p>0.5801788375558866</p>
		</div>
		<div class="col-md-12">
			<p>Therefore when advert reaches 0.58, there will be a negative effect on sales since this value is the turning point of the slope.</p>
			<p>The calculated turning point is the same as that shown on the graph just before the line starts sloping downwards.</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="dummy_reg.php">MULTIPLE REGRESSION WITH DUMMY VARIABLES IN PYTHON</a></p>
			<p>PREVIOUS:: <a href="polynomial_reg.php">POLYNOMIAL REGRESSION IN PYTHON</a></p>
		</div>
		
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/zscores_reg.php';  // Replace PAGE_URL with your page's canonical URL variable
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
