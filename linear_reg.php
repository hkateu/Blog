<html>
	<head>
		<title>hkanalytics | Linear Regression in Python.</title>
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
				<h1><center>LINEAR REGRESSION IN PYTHON</center></h1>
				<p>This tutorial will give you an understading of linear regression using the Statsmodels and Pandas python libraries</p>
			</div>
		<div class="col-md-12">
			<p>Importing the necessary libraries</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>%matplotlib inline</p>
		</br>

		<p>import pandas as pd</p>
		<p>import numpy as np</p>
		<p>from pandas import DataFrame, Series</p>
		<p>import matplotlib.pyplot as plt<p>
		<p>import seaborn as sns</p>
		<p>import statsmodels.api as sm</p>
		</code>
			</div>
		<div class="col-md-12">
			<h2>Exploratory data analysis</h2>
			<p>We shall be using data on weekly household expenditure on food and weekly income</p>
			<p>Importing the food.csv dataset into the dataframe.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>food = pd.read_csv('food.csv')</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Heres a look at the top 5 rows of the food dataframe.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>food.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
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
		</div>
		<div class="col-md-12">
			<p>Generating summary statistics usng the describe function.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>summary = food.describe()</p>
			<p>print(summary)</p>
			</code>
		</div>
		
		<div class="col-md-12 movable" >
			<pre>         food_exp     income
count   40.000000  40.000000
mean   283.573500  19.604750
std    112.675181   6.847773
min    109.710000   3.690000
25%    200.377500  17.110000
50%    264.480000  20.030000
75%    363.325000  24.397500
max    587.660000  33.400000
</pre>
		</div>
		<div class="col-md-12">
			<p>Explanation of summary statistics</p>
<ol>
<li>Count shows there are 40 rows of data</li>
<li>The average weekly food expenditure is 283 dollars while the average weekly income is only 19 dollars</li>
<li>The lowest weekly food expenditure was 109.7 dollars while the most that was spent was 587 dollars</li>
<li>The least weekly income was 3 dollars while the most that was earned was 33 dollars.</li>
<li>50% shows the 50th percentile which is the same as the median values while 25% and 75% shows the 25th percentile and 75th percentile respectively.</li>
</ol>
		</div>
		<div class="col-md-12">
			<p>We can filter our data using pandas</p>
			<p>Top 7 rows of the dataset</p>
			<p>######################</p>
			<p>Top 7 rows for food expendture</p>
			<p>######################</p>
			<p>Filter to show only rows with food expenditure less than 10</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>print(food.head(7))</p>
			<p>print("######################")</p>
			</br>	
			<p>print(food['food_exp'].head())</p>
			<p>print("######################")</p>
			</br>	
			<p>print(food['food_exp'][food['income']<=10])</p>
			<p>print("######################")</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>   food_exp  income
0    115.22    3.69
1    135.98    4.39
2    119.34    4.75
3    114.96    6.03
4    187.05   12.47
######################
0    115.22
1    135.98
2    119.34
3    114.96
4    187.05
Name: food_exp, dtype: float64
######################
0    115.22
1    135.98
2    119.34
3    114.96
Name: food_exp, dtype: float64
######################
</pre>
		</div>
		<div class="col-md-12">
		<p>Creatng a scatter diagram showing income and food expenditure</p>	
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>plt.scatter(food['income'], food['food_exp'], color=['green','blue'])</p>
		<p>plt.title("Food Expenditure Data")</p>
		<p>plt.xlabel("Weekly household income")</p>
		<p>plt.ylabel("Household food expenditure per week")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
			<img src="postimg/food_scatter.png" />
		</div>
		</div>
		<div class="col-md-12">
			<p>As we can see in the scatter diagram as weekly household income (shown in green) increases household food expenditure (shown in blue) also increases</p>	
			<p>Next lets carry out regression analysis with food expenditure as dependent variable and weekly household income as independent. The goal is to findout the relationship and by how much household income affects food expenditure</p>
		</div>
		<div class="col-md-12">
		<h2>Regression analysis and prediction</h2>
		<p>Assigning the food dataset columns to variables.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>fd_exp = food['food_exp']</p>
		<p>fd_inc =food['income']</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Carrying out regression with statsmodels</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>mod = sm.OLS(fd_exp, sm.add_constant(fd_inc))</p>
			<p>res = mod.fit()</p>
			<p>print(res.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:               food_exp   R-squared:                       0.385
Model:                            OLS   Adj. R-squared:                  0.369
Method:                 Least Squares   F-statistic:                     23.79
Date:                Thu, 10 Jan 2019   Prob (F-statistic):           1.95e-05
Time:                        09:45:09   Log-Likelihood:                -235.51
No. Observations:                  40   AIC:                             475.0
Df Residuals:                      38   BIC:                             478.4
Df Model:                           1                                         
Covariance Type:            nonrobust                                         
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
const         83.4160     43.410      1.922      0.062      -4.463     171.295
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
			<p>Interpretation of the results</p>
<ol>
<li>From the r-squared we can tell that 37% of the variations in food expenditure can be explained by the model while the remaining 63% remains unexplained. This alone shows that the model is not a good fit.</li>
<li>When we look at the row showing income statistics, a P-Value of 0.00 is less than 0.05 showing that income has a significant effect on weekly expenditure</li>
<li>The coefficient of income is 10.2 meaning that as weekly income increases by one dollar, household food expenditure increases by 10 dollars. Which is odd because the weekly income is much less than the food expenditure. But for learning purposes thats the explanation</li>
</ol>
<p>Using the model to find predicted values of food expenditure yhat</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>yhat = res.predict()</p>
			<p>print(yhat[1:5])</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>[128.23633465 131.91180612 144.98014912 210.73024983]</pre>	
		</div>
		<div class="col-md-12">
			<p>Adding the predictions to the dataset.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>food['yhat'] = yhat</p>
			<p>print(food.head(5))</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>   food_exp  income        yhat
0    115.22    3.69  121.089585
1    135.98    4.39  128.236335
2    119.34    4.75  131.911806
3    114.96    6.03  144.980149
4    187.05   12.47  210.730250
</pre>	
		</div>
		<div class="col-md-12">
			<p>Using the model to predict food expenditure if income was 20 dollars</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold" >
		<code class="col-md-12">
			<p>res.predict([0,20])</p>
		</code>
		</div>
		<div class="col-md-12">
			<p><pre>array([204.19285936])</pre></p>
		</div>
		<div class="col-md-12">
			<p>The above figure is wrong, statsmodels doesnt add the intercept to the prediction, so lets adjust for that.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold" >
		<code class="col-md-12">
			<p>res.predict([0,20]) + res.params['const']</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>array([287.60886138])</pre>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="multiple_reg.php">Multiple Linear Regression in Python</a></p>
			<p>PREVIOUS:: <a href="parliament.php">AN IN DEPTH ANALYSIS OF DATA ON MEMBERS OF 10th PARLIAMENT OF UGANDA</a></p>
		</div>
		
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/linear_reg.php';  // Replace PAGE_URL with your page's canonical URL variable
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
