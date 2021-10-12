<html>
	<head>
		<title>hkanalytics | Linear probability models</title>
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
				<h1><center>LINEAR PROBABILITY MODELS</center></h1>
				<p>In this tutorial you will learn how to create and interprete a linear probability model using OLS</p>
				<p>Importing the necessary libraries</p>
			</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>%matplotlib inline</p>

				<p>import matplotlib</p>
				<p>import numpy as np</p>
				<p>import matplotlib.pyplot as plt</p>

				<p>import pandas as pd</p>
				<p>from pandas import DataFrame, Series</p>
		</code>
			</div>
		<div class="col-md-12">
			<p>Importing the data to pandas dataframe</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>cokeModel = pd.read_csv('coke.csv')</p>
				<p>cokeModel.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>coke</th>
      <th>pr_pepsi</th>
      <th>pr_coke</th>
      <th>disp_pepsi</th>
      <th>disp_coke</th>
      <th>pratio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>1</td>
      <td>1.79</td>
      <td>1.79</td>
      <td>0</td>
      <td>0</td>
      <td>1.000000</td>
    </tr>
    <tr>
      <th>1</th>
      <td>1</td>
      <td>1.79</td>
      <td>0.89</td>
      <td>0</td>
      <td>1</td>
      <td>0.497207</td>
    </tr>
    <tr>
      <th>2</th>
      <td>1</td>
      <td>1.41</td>
      <td>0.89</td>
      <td>0</td>
      <td>0</td>
      <td>0.631206</td>
    </tr>
    <tr>
      <th>3</th>
      <td>1</td>
      <td>1.79</td>
      <td>1.33</td>
      <td>0</td>
      <td>0</td>
      <td>0.743017</td>
    </tr>
    <tr>
      <th>4</th>
      <td>1</td>
      <td>1.79</td>
      <td>1.79</td>
      <td>0</td>
      <td>0</td>
      <td>1.000000</td>
    </tr>
  </tbody>
</table>
		</div>	
		<div class="col-md-12">
			<h3>Description of the data</h3>
<ol>
<li>coke - 1 if coke chose, 0 if pepsi chosen</li>
<li>pr_pepsi - price of 2 litre bottle of pepsi</li>
<li>pr_coke - price of 2 litre bottle of coke</li>
<li>disp_pepsi - 1 if pepsi is displayed at the time of purchase, 0 otherwise</li>
<li>disp_coke - 1 if coke is displayed at the time of purchase, 0 otherwise</li>
<li>pratio - price of coke relative to price of pepsi</li>
</ol>
		</div>
		<div class="col-md-12">
		<h2>Exploratory data analysis</h2>
		<p>Developing summary statistics</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>cokeModel.describe()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>coke</th>
      <th>pr_pepsi</th>
      <th>pr_coke</th>
      <th>disp_pepsi</th>
      <th>disp_coke</th>
      <th>pratio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>count</th>
      <td>1140.000000</td>
      <td>1140.000000</td>
      <td>1140.000000</td>
      <td>1140.000000</td>
      <td>1140.000000</td>
      <td>1140.000000</td>
    </tr>
    <tr>
      <th>mean</th>
      <td>0.447368</td>
      <td>1.202719</td>
      <td>1.190088</td>
      <td>0.364035</td>
      <td>0.378947</td>
      <td>1.027249</td>
    </tr>
    <tr>
      <th>std</th>
      <td>0.497440</td>
      <td>0.300726</td>
      <td>0.299916</td>
      <td>0.481370</td>
      <td>0.485338</td>
      <td>0.286608</td>
    </tr>
    <tr>
      <th>min</th>
      <td>0.000000</td>
      <td>0.680000</td>
      <td>0.680000</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.497207</td>
    </tr>
    <tr>
      <th>25%</th>
      <td>0.000000</td>
      <td>0.980000</td>
      <td>0.890000</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.857143</td>
    </tr>
    <tr>
      <th>50%</th>
      <td>0.000000</td>
      <td>1.190000</td>
      <td>1.190000</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>1.000000</td>
    </tr>
    <tr>
      <th>75%</th>
      <td>1.000000</td>
      <td>1.390000</td>
      <td>1.390000</td>
      <td>1.000000</td>
      <td>1.000000</td>
      <td>1.150376</td>
    </tr>
    <tr>
      <th>max</th>
      <td>1.000000</td>
      <td>1.790000</td>
      <td>1.790000</td>
      <td>1.000000</td>
      <td>1.000000</td>
      <td>2.324675</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">
		<p>Explanation of summary statistics</p>
<ol>
    <li>There are 1140 observations in this dataset</li>
    <li>The average price of pepsi is 0.3 dollars, while that of coke is 0.29 dollars, which shows they are similar in price</li>
    <li>Pepsi on average is displayed 36% of the time when a purchase is made while coke is displayed 37% of the time when a purchase is made. As the data shows the display times are on average similar for both products</li>
    <li>The average relative price of the two products is 1.02 dollars i.e price of coke divided by the price of pepsi </li>
    <li>The minimum price of coke and pepsi is 0.68 dollars, while the maximum price is 1.79 dollars</li>
    <li>The minimum price ratio is 0.49 while the maximum price ratio is 2.32</li>
</ol>
<h2>Probability regression</h2>
<p>Importing the statsmodel formular api</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>import statsmodels.formula.api as smf</p>
		</code>
		</div>
		<div class="col-md-12">
<p>labeling the variables, and creating the regression formular</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>coke = cokeModel['coke']</p>
				<p>pr_pepsi = cokeModel['pr_pepsi']</p>
				<p>pr_coke = cokeModel['pr_coke']</p>
				<p>disp_pepsi = cokeModel['disp_pepsi']</p>
				<p>disp_coke = cokeModel['disp_coke']</p>
				<p>pratio = cokeModel['pratio']</p>
				<p>formular = 'coke ~ pratio + C(disp_coke) + C(disp_pepsi)'</p>
		</code>
		</div>
		<div class="col-md-12">
<p>The goal of this regression is to predict the probability of choosing coke or pepsi give the other variables, inotherwords we want to predict variable "coke".</p>

<p>One point to note, "disp_coke" and "disp_pepsi" are categorical variables, which is why the are wtritten in this kind of notation C(disp_coke), C(disp_pepsi)</p>

<p>The statsmodel formular api smf has a function called ols, which we shall be using, it takes formular and the dataframe as an input</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>cModel = smf.ols(formula = formular, data = cokeModel)</p>
				<p><i># fitting the model</i></p>
				<p>results = cModel.fit()</p>
				<p>print(results.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:                   coke   R-squared:                       0.120
Model:                            OLS   Adj. R-squared:                  0.118
Method:                 Least Squares   F-statistic:                     51.67
Date:                Thu, 10 Jan 2019   Prob (F-statistic):           2.64e-31
Time:                        11:10:15   Log-Likelihood:                -748.15
No. Observations:                1140   AIC:                             1504.
Df Residuals:                    1136   BIC:                             1524.
Df Model:                           3                                         
Covariance Type:            nonrobust                                         
======================================================================================
                         coef    std err          t      P&gt;|t|      [0.025      0.975]
--------------------------------------------------------------------------------------
Intercept              0.8902      0.065     13.594      0.000       0.762       1.019
C(disp_coke)[T.1]      0.0772      0.034      2.244      0.025       0.010       0.145
C(disp_pepsi)[T.1]    -0.1657      0.036     -4.654      0.000      -0.236      -0.096
pratio                -0.4009      0.061     -6.534      0.000      -0.521      -0.280
==============================================================================
Omnibus:                        6.812   Durbin-Watson:                   1.206
Prob(Omnibus):                  0.033   Jarque-Bera (JB):              112.194
Skew:                           0.190   Prob(JB):                     4.34e-25
Kurtosis:                       1.511   Cond. No.                         10.4
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
<p>From the results above, the R-squared figure is only 12%, which shows that the model only explain 12% of the variation in coke variable</p>

<p>When you look at the p-values denoted by p>|t|, all the probabilities are below 0.05 which shows that all the independent variables are significant</p>

<p>Another obvious point to note is the model seeks to explain the probability of choosing to buy coke, which explains why disp_pepsi and pratio have negative coefficients.</p>
<h2>Interpreting the results</h2>
<p>The coeficient of disp_coke (0.0772) tells us that if coke is displayed it increases the probability of choosing a coke on average by 0.8%</p>
<p>The coefficient of disp_pepsi (-0.1657) tells us that if pepsi is displayed it reduces the probability of choosing a coke on average by 17%</p>
<p>The The coefficient of pratio (-0.4009) tells us that if the price ration incerases by one dollar, the probability of choosing a coke will on average decrease by 4%</p>
<h2>Predicting the probabilities from the models</h2>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>predictions = results.predict()</p>
				<p>predictions[0:5]</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>array([0.48935366, 0.76807842, 0.63718894, 0.59236822, 0.48935366])</pre>
		</div>
		<div class="col-md-12">
<p>The result from predict() function outputs a numpy array, it would be easier to keep everything in pandas formats</p>

<p>Since it just one column, lets convert this to a pandas Series</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>pred = Series(predictions)</p>
				<p>pred.head()</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>0    0.489354
1    0.768078
2    0.637189
3    0.592368
4    0.489354
dtype: float64</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>pred.describe()</p>
				<p>plt.plot(pred)</p>
				<p>plt.savefig("probabilty.png", bbox_inches = "tight")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/probability.png" />
		</div>
		<div class="col-md-12">
<p>From the plot above you can see that a few data points fall below zero</p>

<p>This obviously causes a problem since probability values should be between 0 and 1</p>

<p>Getting more information on these values</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>pred[pred<0].describe()</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>count    1140.000000
mean        0.447368
std         0.172361
min        -0.207321
25%         0.400864
50%         0.459632
75%         0.547032
max         0.768078
dtype: float64</pre>
		</div>
		<div class="col-md-12">
<p>They are only 16 predictions below 0, to deal with them we shall replace all predictions below 0 with 0</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
<p>pred2 = []</p>
<p>for i in range(pred.count()):</p>
    <p>&nbsp;if pred[i]<0:</p>
        <p>&nbsp;&nbsp;pred2.append(0)</p>
    <p>&nbsp;else:</p>
        <p>&nbsp;&nbsp;pred2.append(pred[i])</p>
<p>pred2 = pd.Series(pred2)</p>
<p>pred2.describe()</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>count    16.000000
mean     -0.018359
std       0.052320
min      -0.207321
25%      -0.000239
50%      -0.000239
75%      -0.000239
max      -0.000239
dtype: float64</pre>
		</div>
		<div class="col-md-12">
<p>Everything is in order now</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="probit.php">PROBIT MODELS</a></p>
			<p>PREVIOUS:: <a href="weighted_reg.php">REGRESSION USING WEIGHTED LEAST SQUARES</a></p>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/probability.php';  // Replace PAGE_URL with your page's canonical URL variable
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
