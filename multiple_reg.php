<html>
	<head>
		<title>hkanalytics | Multiple Regression in Python.</title>
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
				<h1><center>MULTIPLE REGRESSION IN PYTHON</center></h1>
				<p>This tutorial will give you an understading of multiple linear regression using the Statsmodels and Pandas python libraries</p>
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
		</code>
			</div>
		<div class="col-md-12">
			<h2>Exploratory data analysis</h2>
			<p>We shall be using data on weekly household expenditure on food and weekly income</p>
			<p>Importing the food.csv dataset into the dataframe.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>andy = pd.read_csv('andy.csv')</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Viewing the first five rows of the dataset.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>andy.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>sales</th>
      <th>price</th>
      <th>advert</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>73.2</td>
      <td>5.69</td>
      <td>1.3</td>
    </tr>
    <tr>
      <th>1</th>
      <td>71.8</td>
      <td>6.49</td>
      <td>2.9</td>
    </tr>
    <tr>
      <th>2</th>
      <td>62.4</td>
      <td>5.63</td>
      <td>0.8</td>
    </tr>
    <tr>
      <th>3</th>
      <td>67.4</td>
      <td>6.22</td>
      <td>0.7</td>
    </tr>
    <tr>
      <th>4</th>
      <td>89.3</td>
      <td>5.02</td>
      <td>1.5</td>
    </tr>
  </tbody>
</table>
</div>
		</div>
		<div class="col-md-12">
			<p>Description of th e dataset</p>
			<ul>
			<li>sales - Monthly sales revenue in 1000's of dollars</li>
			<li>price - A price index for all products sold in a given month</li>
			<li>advert - Expenditure on advertising in 1000's of dollars</li>
			</ul>
			<p>Assigning the columns to variables</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>sales = andy['sales']</p>
			<p>price = andy['price']</p>
			<p>advert = andy['advert']</p>
			</code>
		</div>
		
		<div class="col-md-12" >
		<h2>Regression Analysis</h2>
			<p>Lets start with a simple linear model with only sales(dependent) and price(independent)</p>
			<p>Using Statsmodels formula api</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>import statsmodels.formula.api as smf</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>salesModel = smf.ols(formula = 'sales ~ price', data = andy)</p>
			<p>results = salesModel.fit()</p>
			<p>print(results.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:                  sales   R-squared:                       0.391
Model:                            OLS   Adj. R-squared:                  0.383
Method:                 Least Squares   F-statistic:                     46.93
Date:                Sun, 13 Jan 2019   Prob (F-statistic):           1.97e-09
Time:                        15:55:31   Log-Likelihood:                -227.55
No. Observations:                  75   AIC:                             459.1
Df Residuals:                      73   BIC:                             463.7
Df Model:                           1                                         
Covariance Type:            nonrobust                                         
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
Intercept    121.9002      6.526     18.678      0.000     108.893     134.907
price         -7.8291      1.143     -6.850      0.000     -10.107      -5.551
==============================================================================
Omnibus:                        2.490   Durbin-Watson:                   2.225
Prob(Omnibus):                  0.288   Jarque-Bera (JB):                1.835
Skew:                          -0.360   Prob(JB):                        0.399
Kurtosis:                       3.260   Cond. No.                         65.3
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
		<p>From the results we can see that our R-squared is only at 39%</p>
		<p>Lets run a multiple regression model with sales as the independent variable and price, advert and advertt as independent variables and compare the results</p>	
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
Time:                        15:55:31   Log-Likelihood:                -223.87
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
			<p>The first thing we notice is the R-Squared value has increased to 45% which is a good start because the model now explain 45% of the variation in sales<p>
			<p>Secondly all the independent variables are statistically significant since all their p-values are less than 0.05</p>
			<p>Thirdly an increase in the price index will lead to a drop in sales by 7,908 dollars</p>
			<p>Fourthly and increase in advertising by 1000 dollars will increase sales revenue by 1,8626 dollars</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="polynomial_reg.php">Polynomial Regression in Python</a></p>
			<p>PREVIOUS:: <a href="linear_reg.php">Linear Regression in Python</a></p>
		</div>
		
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/multiple_reg.php';  // Replace PAGE_URL with your page's canonical URL variable
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
