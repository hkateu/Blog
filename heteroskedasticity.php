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
				<h1><center>TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 1</center></h1>
				<p>This tutorial will give you an understanding of how to deal with heteroskedasticity in multiple linear regression using Statsmodels and pandas packages</p>
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
		<p>import statsmodels.api as sm</p>
		</code>
			</div>
		<div class="col-md-12">
			<p>Importing the dataset into a pandas dataframe</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>food = pd.read_csv('food.csv')</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Lets have a look at the first and last five rows of the data</p>
		</div>	
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>food.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>food_exp</th>
      <th>income</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>115.22</td>
      <td>3.69</td>
    </tr>
    <tr>
      <th>1</th>
      <td>135.98</td>
      <td>4.39</td>
    </tr>
    <tr>
      <th>2</th>
      <td>119.34</td>
      <td>4.75</td>
    </tr>
    <tr>
      <th>3</th>
      <td>114.96</td>
      <td>6.03</td>
    </tr>
    <tr>
      <th>4</th>
      <td>187.05</td>
      <td>12.47</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12" >
			<p>A  brief description of the variables in the dataset</p>
			<ul>
<li>food_exp - Household food expenditure per week</li>
<li>income - weekly household income</li>
</ul>
			<p>Generating summary statistics</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>food.describe()</p>
			</code>
		</div>
		
		<div class="col-md-12 movable" >
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>food_exp</th>
      <th>income</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>count</th>
      <td>40.000000</td>
      <td>40.000000</td>
    </tr>
    <tr>
      <th>mean</th>
      <td>283.573500</td>
      <td>19.604750</td>
    </tr>
    <tr>
      <th>std</th>
      <td>112.675181</td>
      <td>6.847773</td>
    </tr>
    <tr>
      <th>min</th>
      <td>109.710000</td>
      <td>3.690000</td>
    </tr>
    <tr>
      <th>25%</th>
      <td>200.377500</td>
      <td>17.110000</td>
    </tr>
    <tr>
      <th>50%</th>
      <td>264.480000</td>
      <td>20.030000</td>
    </tr>
    <tr>
      <th>75%</th>
      <td>363.325000</td>
      <td>24.397500</td>
    </tr>
    <tr>
      <th>max</th>
      <td>587.660000</td>
      <td>33.400000</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">
			<p>The mean weekly food expenditure is 283, while average weekly income is 19.6</p>
			<p>Minimum and maximum weekly food expenditure is 109.7 and 587 repectively while that of weekly household income is 3.6 and 33.4 respectively</p>
			<p>Carrying out Linear Regression using Ordinary Least Squares Method with food expenditure as the dependent variable and weekly household income as the dependent variable</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>foodexp = food['food_exp']</p>
			<p>income = food['income']</p>
			<p>formular = 'foodexp ~ income'</p>
			<p>foodModel = smf.ols(formula = formular, data = food)</p>
			<p>fresults = foodModel.fit()</p>
			<p>print(fresults.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:                foodexp   R-squared:                       0.385
Model:                            OLS   Adj. R-squared:                  0.369
Method:                 Least Squares   F-statistic:                     23.79
Date:                Sat, 12 Jan 2019   Prob (F-statistic):           1.95e-05
Time:                        09:30:30   Log-Likelihood:                -235.51
No. Observations:                  40   AIC:                             475.0
Df Residuals:                      38   BIC:                             478.4
Df Model:                           1                                         
Covariance Type:            nonrobust                                         
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
Intercept     83.4160     43.410      1.922      0.062      -4.463     171.295
income        10.2096      2.093      4.877      0.000       5.972      14.447
==============================================================================
Omnibus:                        0.277   Durbin-Watson:                   1.894
Prob(Omnibus):                  0.870   Jarque-Bera (JB):                0.063
Skew:                          -0.097   Prob(JB):                        0.969
Kurtosis:                       2.989   Cond. No.                         63.7
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
			<p>From the R-Squared figure it shows that the model only explains 38% of the variation in food expenditure. Lets test for heteroskedasticity using breusch pagan method</p>
			<ul>
			<li>Ho: Hetereoskedasticity is not present</li>
			<li>H1: Hetereoskedasticity is present</li>
			</ul>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>from statsmodels.stats.diagnostic import het_breuschpagan as bp</p>
			<p>bp(fresults.resid, fresults.model.exog)</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>(7.384424442517128,
 0.006579112042204343,
 8.603500751384779,
 0.005659102694886305)</pre>
		</div>
		<div class="col-md-12">
			<p>Since the probability value is 0.00658 which is lower than 0.05, reject null hypothesis and conclude that there is presence of heteroskedasticity.</p>
			<p>We can also test for heteroskedasticity using whites test</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>from statsmodels.stats.diagnostic import het_white as white</p>
			<p>white(fresults.resid, fresults.model.exog)</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>(7.5550785608990045,
 0.022878920822092863,
 4.307883859080302,
 0.020801976829789157)</pre>
		</div>
		<div class="col-md-12">
			<p>Using whites test for heteroskedasticity on can see that the lm prob 0.023 is less than 0.05, thus rejecting the null hypotheisis and concluding that there is presence of heteroskedasticity</p>
			<p>Another way to test for Heteroskedasticity is using the Gold Quant test</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>from statsmodels.stats.diagnostic import het_goldfeldquandt as GQ</p>
			<p>GQ(fresults.resid, fresults.model.exog)</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>(3.6147557162878114, 0.004596430234035789, &#39;increasing&#39;)</pre>
		</div>
		<div class="col-md-12">
			<p>p value is 0.0046 which is lower than 0.05, so we reject ho and conclude that heteroskedasticity is present</p>
			<p>Constructing a residual plot to back up our hypothesis of heteroskedasticity</p>
			<p>Getting predictions of the model</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>pred = fresults.predict()</p>
			<p>pred = Series(pred)</p>
			<p>pred.head()</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>0    121.089585
1    128.236335
2    131.911806
3    144.980149
4    210.730250
dtype: float64</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>large = Series(large)</p>
			<p>large.head()</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>0    0
1    0
2    1
3    0
4    1
dtype: int64</pre>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/residual.png" />
		</div>
		<div class="col-md-12">
			<p>The residual plot in the top right corner shows that residuals increase as income increases showing variability and thus presence of heteroskedasticity</p>
			<p>Other plots created by this function include y vs x fitted plot, particla regression plot and CCPR plot which stands for component and component plus residual plot. You can read more about these plots on the statsmodels website. </p>
			<p><a href="www.statsmodels.org">www.statsmodels.org</a></p>
			<p>In the next post i will present two methods of handling heteroskedasticity, namely</p>
			<ul>
				<li>Robust Linear Regression</li>
				<li>Log Transformed Models</li>
			</ul>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="robust.php">TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 2, HANDLING HETEROSKEDASTICITY WITH ROBUST LINEAR REGRESSION</a></p>
			<p>PREVIOUS:: <a href="dummy_reg.php">MULTIPLE REGRESSION WITH DUMMY VARIABLES IN PYTHON</a></p>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/heteroskedasticity.php';  // Replace PAGE_URL with your page's canonical URL variable
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
