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
				<h1><center>TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 3, HANDLING HETEROSKEDASTICITY WITH LOG TRANSFORMATION</center></h1>
				<p>This tutorial will teach you how to deal with heteroskedasticity using variable log transformation.</p>
<p>This is a continuation of the previous post titled <a href="robust.php">TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 2, HANDLING HETEROSKEDASTICITY WITH ROBUST LINEAR REGRESSION</a>, it would be better to read through it before going on with this post.</p>
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
			<p>Using this method we check the variables to see if they are normally distributed and not skewed</p>
			<p>This can be done by plotting histograms for each varible</p>
		</div>	
		
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>plt.hist(income)</p>
			<p>plt.savefig("income_hist.png", bbox_inches = "tight")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/income_hist.png" />
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>plt.hist(foodexp)</p>
			<p>plt.savefig("foodexp_hist.png", bbox_inches = "tight")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/foodexp_hist.png" />
		</div>
		<div class="col-md-12">
			<p>When you compare these two hsitograms its evident that food expenditure is skewed, lets correct this by carrying out a log transformation on foodexp</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>logFoodexp = np.log(foodexp)</p>
			<p>plt.hist(logFoodexp)</p>
			<p>plt.savefig("logfoodexp_hist.png", bbox_inches = "tight")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/logfoodexp_hist.png" />
		</div>
		<div class="col-md-12" >
			<p>The log transformation now looks like a normal distribution.</p>
			<p>Lets carry out regression using this new variable as the dependent</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>foodexp2 = logFoodexp</p>
			<p>income = food['income']</p>
			<p>formular2 = 'foodexp2 ~ income'</p>
			<p>foodModel2 = smf.ols(formula = formular2, data = food)</p>
			<p>fresults2 = foodModel2.fit()</p>
			<p>print(fresults2.summary())</p>
		</code>
		</div>
		<div class="col-md-12" >
			<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:               foodexp2   R-squared:                       0.418
Model:                            OLS   Adj. R-squared:                  0.403
Method:                 Least Squares   F-statistic:                     27.27
Date:                Sat, 12 Jan 2019   Prob (F-statistic):           6.62e-06
Time:                        09:12:47   Log-Likelihood:                -11.117
No. Observations:                  40   AIC:                             26.23
Df Residuals:                      38   BIC:                             29.61
Df Model:                           1                                         
Covariance Type:            nonrobust                                         
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
Intercept      4.7802      0.159     30.072      0.000       4.458       5.102
income         0.0400      0.008      5.222      0.000       0.025       0.056
==============================================================================
Omnibus:                        7.990   Durbin-Watson:                   1.877
Prob(Omnibus):                  0.018   Jarque-Bera (JB):                6.764
Skew:                          -0.864   Prob(JB):                       0.0340
Kurtosis:                       4.036   Cond. No.                         63.7
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12" >
			<p>Testing for heteroskedasticity to make sure its nolonger present</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>from statsmodels.stats.diagnostic import het_breuschpagan as bp</p>
			<p>bp(fresults.resid, fresults.model.exog)</p>
		</code>
		</div>
		<div class="col-md-12" >
			<pre>(1.711006685443306, 0.19085481029447668, 1.698092543533316, 0.2003787091396459)</pre>
		</div>
		<div class="col-md-12" >
			<p>From the results one can see that the probability value is now 0.19 which is greater than 0.05, thus we can conclude that heteroskedasticity is absent in this model</p>
			<p>However because of the log transformation the interpretation of the model will change.</p>
			<p>Food expenses will increase by 4% for every addition of dollar on income</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="weighted_reg.php">REGRESSION USING WEIGHTED LEAST SQUARES</a></p>
			<p>PREVIOUS:: <a href="robust.php">TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON: PART 2, HANDLING HETEROSKEDASTICITY WITH ROBUST LINEAR REGRESSION</a></p>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/log_trans.php';  // Replace PAGE_URL with your page's canonical URL variable
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
