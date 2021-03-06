<html>
	<head>
		<title>hkanalytics | Polynomial Regression in Python.</title>
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
				<h1><center>POLYNOMIAL REGRESSION IN PYTHON</center></h1>
				<p>This tutorial will give you an understanding of polynomial regression using the Statsmodels and Pandas python libraries</p>
				<p>This is a continuation of my previous post on <a href="multiple_reg.php">multiple regression</a>, if you havent gone through it, please go back and check it out before continuing with this tutorial. </p>
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
			<p>If you recall from the previous tutorial on Multiple regression, we had a regression model with data on sales at Andys Burger place</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>andy = pd.read_csv('andy.csv')</p>
			<p>sales = andy['sales']</p>
			<p>price = andy['price']</p>
			<p>advert = andy['advert']</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>salesModelU = smf.ols(formula = 'sales ~ price + advert', data = andy)</p>
			<p>results2 = salesModelU.fit()</p>
			<p>print(results2.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:                  sales   R-squared:                       0.448
Model:                            OLS   Adj. R-squared:                  0.433
Method:                 Least Squares   F-statistic:                     29.25
Date:                Sun, 13 Jan 2019   Prob (F-statistic):           5.04e-10
Time:                        15:56:47   Log-Likelihood:                -223.87
No. Observations:                  75   AIC:                             453.7
Df Residuals:                      72   BIC:                             460.7
Df Model:                           2                                         
Covariance Type:            nonrobust                                         
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
Intercept    118.9136      6.352     18.722      0.000     106.252     131.575
price         -7.9079      1.096     -7.215      0.000     -10.093      -5.723
advert         1.8626      0.683      2.726      0.008       0.501       3.225
==============================================================================
Omnibus:                        0.535   Durbin-Watson:                   2.183
Prob(Omnibus):                  0.765   Jarque-Bera (JB):                0.159
Skew:                          -0.072   Prob(JB):                        0.924
Kurtosis:                       3.174   Cond. No.                         69.5
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
			<p>Suppose we added another variable to the equation</p>
		</div>	
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i># Squaring advert</i></p>
			<p>advertt = andy['advert'] **2</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Adding this varible of advert squared will make our equation a polinomial equation.</p>
			<p>Lets carry out regression again with this new variable</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>salesModelU = smf.ols(formula = 'sales ~ price + advert + advertt', data = andy</p>
			<p>results2 = salesModelU.fit()</p>
			<p>print(results2.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:                  sales   R-squared:                       0.508
Model:                            OLS   Adj. R-squared:                  0.487
Method:                 Least Squares   F-statistic:                     24.46
Date:                Sun, 13 Jan 2019   Prob (F-statistic):           5.60e-11
Time:                        15:57:00   Log-Likelihood:                -219.55
No. Observations:                  75   AIC:                             447.1
Df Residuals:                      71   BIC:                             456.4
Df Model:                           3                                         
Covariance Type:            nonrobust                                         
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
Intercept    109.7190      6.799     16.137      0.000      96.162     123.276
price         -7.6400      1.046     -7.304      0.000      -9.726      -5.554
advert        12.1512      3.556      3.417      0.001       5.060      19.242
advertt       -2.7680      0.941     -2.943      0.004      -4.644      -0.892
==============================================================================
Omnibus:                        1.004   Durbin-Watson:                   2.043
Prob(Omnibus):                  0.605   Jarque-Bera (JB):                0.455
Skew:                          -0.088   Prob(JB):                        0.797
Kurtosis:                       3.339   Cond. No.                         101.
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12" >
			<p>Differenciating advert with respect to sales slope = beta1 advert + 2beta2 advert therefore if advert increases by one unit, sales will decrease by 12.1512 - 2*2.7680, which is 6.6152 units</p>
			<p>calculating the turning point |beta1/2beta2|</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>tpoint = abs(12.1512/(2*2.7680))</p> 
			<p>print(tpoint)</p>
			</code>
		</div>
		
		<div class="col-md-12" >
			<p>2.194942196531792</p>
		</div>
		<div class="col-md-12">
			<p>If Andy spends more than 2.195 on advertising, sales will start to decline, if he spends exactly 2.195 on adverts there will be no effect on sales</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="zscores_reg.php">GETTING BETA COEFFICIENTS FROM Z-SCORES</a></p>
			<p>PREVIOUS:: <a href="multiple_reg.php">MULTIPLE REGRESSION IN PYTHON</a></p>
		</div>
		
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/polynomial_reg.php';  // Replace PAGE_URL with your page's canonical URL variable
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
