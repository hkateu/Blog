<html>
	<head>
		<title>hkanalytics | Logit models</title>
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
				<h1><center>LOGIT MODELS</center></h1>
				<p>Logit models are similar to probit and probability models used for binary outcome variables as the dependent variable.</p>
				<p>Importing the necessary libraries</p>
			</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
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
		<p>Summary statisics of the dataset</p>
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
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>import statsmodels.formula.api as smf</p>
		</code>
		</div>
		<div class="col-md-12">
<p>Defining the variables</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>coke = cokeModel['coke']</p>
				<p>pr_pepsi = cokeModel['pr_pepsi']</p>
				<p>pr_coke = cokeModel['pr_coke']</p>
				<p>disp_pepsi = cokeModel['disp_pepsi']</p>
				<p>disp_coke = cokeModel['disp_coke</p>
				<p>pratio = cokeModel['pratio']</p>
				<p>formular = 'coke ~ pratio + C(disp_coke) + C(disp_pepsi)'</p>
		</code>
		</div>
		<div class="col-md-12">
<p>Carrying out logit regression</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>rcolumns = cokeModel.iloc[:,3:]</p>
				<p>cokeModeled = sm.Logit(coke, sm.add_constant(rcolumns))</p>
				<p>result = cokeModeled.fit()</p>
				<p>print(result.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>Optimization terminated successfully.
         Current function value: 0.622321
         Iterations 5
                           Logit Regression Results                           
==============================================================================
Dep. Variable:                   coke   No. Observations:                 1140
Model:                          Logit   Df Residuals:                     1136
Method:                           MLE   Df Model:                            3
Date:                Wed, 16 Jan 2019   Pseudo R-squ.:                 0.09493
Time:                        17:53:39   Log-Likelihood:                -709.45
converged:                       True   LL-Null:                       -783.86
                                        LLR p-value:                 4.715e-32
==============================================================================
                 coef    std err          z      P&gt;|z|      [0.025      0.975]
------------------------------------------------------------------------------
const          1.9230      0.326      5.902      0.000       1.284       2.562
disp_pepsi    -0.7310      0.168     -4.355      0.000      -1.060      -0.402
disp_coke      0.3516      0.159      2.218      0.027       0.041       0.662
pratio        -1.9957      0.315     -6.344      0.000      -2.612      -1.379
==============================================================================
</pre>
		</div>
		<div class="col-md-12">
<p>Just like the <a href="probit.php">Probit Models</a> you have to get the marginal effects inorder to interprete the logit model.</h2>
<h3>Marginal Effects</h3>
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
      <th>disp_pepsi</th>
      <td>-0.179692</td>
      <td>0.041233</td>
      <td>-4.357938</td>
      <td>1.312934e-05</td>
      <td>-0.260508</td>
      <td>-0.098876</td>
    </tr>
    <tr>
      <th>disp_coke</th>
      <td>0.086431</td>
      <td>0.038975</td>
      <td>2.217566</td>
      <td>2.658447e-02</td>
      <td>0.010040</td>
      <td>0.162821</td>
    </tr>
    <tr>
      <th>pratio</th>
      <td>-0.490596</td>
      <td>0.077021</td>
      <td>-6.369671</td>
      <td>1.894343e-10</td>
      <td>-0.641554</td>
      <td>-0.339639</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">
<p>Lets compare these results with Probability regression model</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>formular = 'coke ~ pratio + C(disp_coke) + C(disp_pepsi)'</p>
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
Date:                Wed, 16 Jan 2019   Prob (F-statistic):           2.64e-31
Time:                        17:53:40   Log-Likelihood:                -748.15
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
<p>If you compare the values Logit models Marginal Effects table (dy/dx) and the coeffecients in the <a href="probability.php">probability model</a>, there are very similar</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="time.php">TIME SERIES ANALYSIS IN PYTHON</a></p>
			<p>PREVIOUS:: <a href="probit.php">PROBIT MODELS</a></p>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/logit.php';  // Replace PAGE_URL with your page's canonical URL variable
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
