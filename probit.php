<html>
	<head>
		<title>hkanalytics | Probit models</title>
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
				<h1><center>PROBIT MODELS</center></h1>
				<p>In this tutorial you will learn how to create and interprete probit models in pythons Statsmodels package.</p>
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
				<p>import scipy.stats as stats</p>
		</code>
			</div>
		<div class="col-md-12">
			<p>Importing the data to pandas dataframe</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>transModel = pd.read_csv('transport.csv')</p>
				<p>transModel.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>autotime</th>
      <th>bustime</th>
      <th>dtime</th>
      <th>auto</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>52.9</td>
      <td>4.4</td>
      <td>-4.85</td>
      <td>0</td>
    </tr>
    <tr>
      <th>1</th>
      <td>4.1</td>
      <td>28.5</td>
      <td>2.44</td>
      <td>0</td>
    </tr>
    <tr>
      <th>2</th>
      <td>4.1</td>
      <td>86.9</td>
      <td>8.28</td>
      <td>1</td>
    </tr>
    <tr>
      <th>3</th>
      <td>56.2</td>
      <td>31.6</td>
      <td>-2.46</td>
      <td>0</td>
    </tr>
    <tr>
      <th>4</th>
      <td>51.8</td>
      <td>20.2</td>
      <td>-3.16</td>
      <td>0</td>
    </tr>
  </tbody>
</table>
		</div>	
		<div class="col-md-12">
			<h3>Describing the variables</h3>
<ol>
<li>autotime - commute time via auto in minutes</li>
<li>bustime - commute time via bus in minutes</li>
<li>dtime - (bustime-autotime)/10, 10 minute units</li>
<li>auto - 1 if auto chosen</li>
</ol>
		</div>
		<div class="col-md-12">
		<h2>Exploratory data analysis</h2>
		<p>Summary statisics of the dataset</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>transModel.describe()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>autotime</th>
      <th>bustime</th>
      <th>dtime</th>
      <th>auto</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>count</th>
      <td>21.000000</td>
      <td>21.000000</td>
      <td>21.000000</td>
      <td>21.000000</td>
    </tr>
    <tr>
      <th>mean</th>
      <td>49.347619</td>
      <td>48.123810</td>
      <td>-0.122381</td>
      <td>0.476190</td>
    </tr>
    <tr>
      <th>std</th>
      <td>32.434914</td>
      <td>34.630823</td>
      <td>5.691037</td>
      <td>0.511766</td>
    </tr>
    <tr>
      <th>min</th>
      <td>0.200000</td>
      <td>1.600000</td>
      <td>-9.070000</td>
      <td>0.000000</td>
    </tr>
    <tr>
      <th>25%</th>
      <td>22.500000</td>
      <td>20.200000</td>
      <td>-4.850000</td>
      <td>0.000000</td>
    </tr>
    <tr>
      <th>50%</th>
      <td>51.400000</td>
      <td>38.000000</td>
      <td>-0.700000</td>
      <td>0.000000</td>
    </tr>
    <tr>
      <th>75%</th>
      <td>81.000000</td>
      <td>84.000000</td>
      <td>4.990000</td>
      <td>1.000000</td>
    </tr>
    <tr>
      <th>max</th>
      <td>99.100000</td>
      <td>91.500000</td>
      <td>9.100000</td>
      <td>1.000000</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">
		<p>Explanation of summary statistics</p>
<ol>
<li>Count shows that there are 21 observations</li>
<li>The average autotime and bus time is 49 minutes and 48 minutes respectively</li>
<li>Average dtime is 5.7</li>
<li>On average auto is chosen 47%</li>
<li>The minimum time for auto and bus is 0.2 and 1.6 while maximum is 99.1 minutes and 9.1 minutes respectively</li>
</ol>
<p>Importing statsmodels for probit regression model</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>import statsmodels.api as sm</p>
		</code>
		</div>
		<div class="col-md-12">
<p>Defining the variables</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>autotime = transModel['autotime']</p>
				<p>bustime = transModel['bustime']</p>
				<p>dtime = transModel['dtime']</p>
				<p>auto = transModel['auto']</p>
		</code>
		</div>
		<div class="col-md-12">
<p>Carrying out probit regression</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>x = sm.add_constant(dtime)</p>
				<p>tModel = sm.Probit(auto, x)</p>
				<p>result = tModel.fit()</p>
				<p>print(result.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>Optimization terminated successfully.
         Current function value: 0.293579
         Iterations 6
                          Probit Regression Results                           
==============================================================================
Dep. Variable:                   auto   No. Observations:                   21
Model:                         Probit   Df Residuals:                       19
Method:                           MLE   Df Model:                            1
Date:                Wed, 16 Jan 2019   Pseudo R-squ.:                  0.5758
Time:                        17:53:36   Log-Likelihood:                -6.1652
converged:                       True   LL-Null:                       -14.532
                                        LLR p-value:                 4.300e-05
==============================================================================
                 coef    std err          z      P&gt;|z|      [0.025      0.975]
------------------------------------------------------------------------------
const         -0.0644      0.399     -0.161      0.872      -0.847       0.718
dtime          0.3000      0.103      2.916      0.004       0.098       0.502
==============================================================================
</pre>
		</div>
		<div class="col-md-12">
<p>You cannot interprete the coefficients from the ouput of a probit regression in the standard way. You need to interprete the marginal effects of the regressors, that is how much the conditional probability of the outcome variable changes when you change the value of the regressor, holding all other regressors constant at some value.</p>
<p>The difference from the linear regression case where you are directly interpreting the estimated coefficients, this is because for the linear regression case the coefficients are the marginal effects.</p>
<p>For the probit case there is an additional step for computing marginal effects once you have computed the probit regression fit</p>
<p>Computing the marginal effects of the probit model</p>
<h2>Average marginal effects</h2>
<p>Overall effect</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>marg = result.get_margeff(at='overall', method='dydx', atexog=None, dummy=False, count=False)</p>
				<p>marg.summary_frame()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>dy/dx</th>
      <th>Std. Err.</th>
      <th>z</th>
      <th>Pr(&gt;|z|)</th>
      <th>Conf. Int. Low</th>
      <th>Cont. Int. Hi.</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>dtime</th>
      <td>0.048407</td>
      <td>0.003416</td>
      <td>14.170494</td>
      <td>1.395151e-45</td>
      <td>0.041712</td>
      <td>0.055102</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">

<p>For the overall effect, a 1% increase in dtime would increase the probability of using automobile over bus by 5%(dy/dx)</p>

<p>Marginal effect at means</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>result.get_margeff(at='mean', method='dydx', atexog=None, dummy=False, count=False).summary_frame()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>dy/dx</th>
      <th>Std. Err.</th>
      <th>z</th>
      <th>Pr(&gt;|z|)</th>
      <th>Conf. Int. Low</th>
      <th>Cont. Int. Hi.</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>dtime</th>
      <td>0.119068</td>
      <td>0.040998</td>
      <td>2.904223</td>
      <td>0.003682</td>
      <td>0.038713</td>
      <td>0.199423</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">
			<p>On average a 1% increase in dtime will increase the probability of using automobile over bus by 12%</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="logit.php">LOGIT MODELS</a></p>
			<p>PREVIOUS:: <a href="probability.php">LINEAR PROBABILITY MODELS</a></p>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/probit.php';  // Replace PAGE_URL with your page's canonical URL variable
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
