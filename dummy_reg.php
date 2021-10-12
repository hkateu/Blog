<html>
	<head>
		<title>hkanalytics | Multiple regression with dummy variables in Python.</title>
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
				<h1><center>MULTIPLE REGRESSION WITH DUMMY VARIABLES IN PYTHON</center></h1>
				<p>This tutorial will give you an understanding of how to deal with dummy variables in multiple regression and how to interpret the results</p>
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
			<p>Importing the dataset into a pandas dataframe</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>utown = pd.read_csv('utown.csv')</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Lets have a look at the first and last five rows of the data</p>
		</div>	
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>utown.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>price</th>
      <th>sqft</th>
      <th>age</th>
      <th>utown</th>
      <th>pool</th>
      <th>fplace</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>205.452</td>
      <td>23.46</td>
      <td>6</td>
      <td>0</td>
      <td>0</td>
      <td>1</td>
    </tr>
    <tr>
      <th>1</th>
      <td>185.328</td>
      <td>20.03</td>
      <td>5</td>
      <td>0</td>
      <td>0</td>
      <td>1</td>
    </tr>
    <tr>
      <th>2</th>
      <td>248.422</td>
      <td>27.77</td>
      <td>6</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>3</th>
      <td>154.690</td>
      <td>20.17</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>4</th>
      <td>221.801</td>
      <td>26.45</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>1</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>utown.tail()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>price</th>
      <th>sqft</th>
      <th>age</th>
      <th>utown</th>
      <th>pool</th>
      <th>fplace</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>995</th>
      <td>257.195</td>
      <td>22.84</td>
      <td>4</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>996</th>
      <td>338.295</td>
      <td>30.00</td>
      <td>11</td>
      <td>1</td>
      <td>0</td>
      <td>1</td>
    </tr>
    <tr>
      <th>997</th>
      <td>263.526</td>
      <td>23.99</td>
      <td>6</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>998</th>
      <td>300.728</td>
      <td>28.74</td>
      <td>9</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>999</th>
      <td>220.987</td>
      <td>20.93</td>
      <td>2</td>
      <td>1</td>
      <td>0</td>
      <td>1</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12" >
			<p>A  brief description of the variables in the dataset</p>
			<ul>
    <li>price - House price in $1000</li>
    <li>sqft - Square feet of living area, 100s</li>
    <li>age - House age in years</li>
    <li>utown - 1 if close to the university</li>
    <li>pool - 1 if house has a pool</li>
    <li>fplace - 1 if house has a fireplace</li>
			</ul>
			<p>Generating descriptive statistics using pandas describe function</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>utown.describe()</p>
			</code>
		</div>
		
		<div class="col-md-12 movable" >
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>price</th>
      <th>sqft</th>
      <th>age</th>
      <th>utown</th>
      <th>pool</th>
      <th>fplace</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>count</th>
      <td>1000.000000</td>
      <td>1000.00000</td>
      <td>1000.000000</td>
      <td>1000.000000</td>
      <td>1000.000000</td>
      <td>1000.000000</td>
    </tr>
    <tr>
      <th>mean</th>
      <td>247.655721</td>
      <td>25.20965</td>
      <td>9.392000</td>
      <td>0.519000</td>
      <td>0.204000</td>
      <td>0.518000</td>
    </tr>
    <tr>
      <th>std</th>
      <td>42.192729</td>
      <td>2.91848</td>
      <td>9.426728</td>
      <td>0.499889</td>
      <td>0.403171</td>
      <td>0.499926</td>
    </tr>
    <tr>
      <th>min</th>
      <td>134.316000</td>
      <td>20.03000</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.000000</td>
    </tr>
    <tr>
      <th>25%</th>
      <td>215.646750</td>
      <td>22.82750</td>
      <td>3.000000</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.000000</td>
    </tr>
    <tr>
      <th>50%</th>
      <td>245.832500</td>
      <td>25.36000</td>
      <td>6.000000</td>
      <td>1.000000</td>
      <td>0.000000</td>
      <td>1.000000</td>
    </tr>
    <tr>
      <th>75%</th>
      <td>278.264500</td>
      <td>27.75000</td>
      <td>13.000000</td>
      <td>1.000000</td>
      <td>0.000000</td>
      <td>1.000000</td>
    </tr>
    <tr>
      <th>max</th>
      <td>345.197000</td>
      <td>30.00000</td>
      <td>60.000000</td>
      <td>1.000000</td>
      <td>1.000000</td>
      <td>1.000000</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">
			<p>From the data above one should take note of the average figures as shown on row labled mean, and min and max for each varible.</p>
			<p>Lets compare prices of houses near the university and those in other neighbourhoods</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i># close to university</i></p>
			<p>utown_near = utown['price'][utown['utown'] ==1]</p>
			<p><i># other neighbourhoods</i></p>
			<p>utown_far = utown['price'][utown['utown'] ==0]</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>ax1 = plt.subplot(211)</p>
			<p>plt.hist(utown_near)</p>
			<p>ax1.set_title('Prices of houses')</p>
			<p>ax2 = plt.subplot(212, sharex=ax1)</p>
			<p>plt.hist(utown_far, color='orange')</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>(array([ 4.,  6., 28., 44., 94., 94., 85., 66., 44., 16.]),
 array([134.316 , 148.5821, 162.8482, 177.1143, 191.3804, 205.6465,
        219.9126, 234.1787, 248.4448, 262.7109, 276.977 ]),
 &lt;a list of 10 Patch objects&gt;)</pre>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/prices.png" />
		</div>
		<div class="col-md-12">
			<p>As shown in the graph above prices of houses near the university(blue) are highier than prices of houses in other neighbourhoods(orange)</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>print('Near University')</p>
			<p>print(utown_near.describe())</p>
			<p>print("#######################")</p>
			<p>print('Other neighbourhoods')</p>
			<p>print(utown_far.describe())</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>Near University
count    519.000000
mean     277.241601
std       30.782080
min      191.570000
25%      254.871500
50%      276.680000
75%      298.940500
max      345.197000
Name: price, dtype: float64
#######################
Other neighbourhoods
count    481.000000
mean     215.732495
std       26.737362
min      134.316000
25%      196.818000
50%      215.275000
75%      235.324000
max      276.977000
Name: price, dtype: float64
</pre>
		</div>
		<div class="col-md-12">
			<p>As shown in the summary statistics above the average price of houses near university is 277,000 dollars while that of houses in other areas is 215,000 dollars which is much lower.</p>
			<p>Lets create an indicator variable with sqft more than 25 to signify large houses</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>large = []</p>
			<p>for i in range(utown['sqft'].count()):</p>
				<p>&nbsp;if (utown['sqft'][i] > 25) == False:</p>
					<p>&nbsp;&nbsp;large.append(0)</p>
				<p>&nbsp;else:</p>
					<p>&nbsp;&nbsp;large.append(1)</p>
		</code>
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
		<div class="col-md-12">
			<p>We can also generate an indicator variable for midpriced houses between 215 and 275 dollars(in 000's)</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>midprice = []</p>
			<p>for i in range(utown['price'].count()):</p>
				<p>&nbsp;if (215 < utown['price'][i]) & (utown['price'][i] < 275) == False:</p>
					<p>&nbsp;&nbsp;midprice.append(0)</p>
				<p>&nbsp;else:</p>
					<p>&nbsp;&nbsp;midprice.append(1)</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Lets add these into our dataset</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>utown['large'] = large</p>
			<p>utown['midprice'] = midprice</p>
			<p>utown.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>price</th>
      <th>sqft</th>
      <th>age</th>
      <th>utown</th>
      <th>pool</th>
      <th>fplace</th>
      <th>large</th>
      <th>midprice</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>205.452</td>
      <td>23.46</td>
      <td>6</td>
      <td>0</td>
      <td>0</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>1</th>
      <td>185.328</td>
      <td>20.03</td>
      <td>5</td>
      <td>0</td>
      <td>0</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>2</th>
      <td>248.422</td>
      <td>27.77</td>
      <td>6</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>1</td>
      <td>1</td>
    </tr>
    <tr>
      <th>3</th>
      <td>154.690</td>
      <td>20.17</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <th>4</th>
      <td>221.801</td>
      <td>26.45</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>1</td>
      <td>1</td>
      <td>1</td>
    </tr>
  </tbody>
</table>
		</div>
		<div class="col-md-12">
			<p>Labeling our variables to input in the statsmodels formula api</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>price = utown['price']</p>
			<p>sqft = utown['sqft']</p>
			<p>age = utown['age']</p>
			<p>utown1 = utown['utown']</p>
			<p>pool = utown['pool']</p>
			<p>fplace = utown['fplace']</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Developing our regression equation or formular</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>formular = 'price ~ C(utown1) + sqft + C(utown1):sqft + age + C(pool) + C(fplace)'</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>The C() functions house categorical variables, for example C(utown1) for utown variable. C(utown1):sqft shows an interaction between utown1 and sqft</p>
			<p>The next step is to carryout the regression</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>import statsmodels.formula.api as smf</p>
			<p>Model = smf.ols(formula = formular, data = utown)</p>
			<p>results = Model.fit()</p>
			<p>print(results.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:                  price   R-squared:                       0.871
Model:                            OLS   Adj. R-squared:                  0.870
Method:                 Least Squares   F-statistic:                     1113.
Date:                Sat, 12 Jan 2019   Prob (F-statistic):               0.00
Time:                        08:00:47   Log-Likelihood:                -4138.4
No. Observations:                1000   AIC:                             8291.
Df Residuals:                     993   BIC:                             8325.
Df Model:                           6                                         
Covariance Type:            nonrobust                                         
=======================================================================================
                          coef    std err          t      P&gt;|t|      [0.025      0.975]
---------------------------------------------------------------------------------------
Intercept              24.5000      6.192      3.957      0.000      12.350      36.650
C(utown1)[T.1]         27.4530      8.423      3.259      0.001      10.925      43.981
C(pool)[T.1]            4.3772      1.197      3.658      0.000       2.029       6.725
C(fplace)[T.1]          1.6492      0.972      1.697      0.090      -0.258       3.557
sqft                    7.6122      0.245     31.048      0.000       7.131       8.093
C(utown1)[T.1]:sqft     1.2994      0.332      3.913      0.000       0.648       1.951
age                    -0.1901      0.051     -3.712      0.000      -0.291      -0.090
==============================================================================
Omnibus:                        0.543   Durbin-Watson:                   1.986
Prob(Omnibus):                  0.762   Jarque-Bera (JB):                0.436
Skew:                          -0.038   Prob(JB):                        0.804
Kurtosis:                       3.069   Cond. No.                         628.
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
		<p>From the results of the regression the first thing that catches my eye is the R-Squared value which shows that the model explains 87% of the variation in price. This is a good figure</p>
		<p>All the variables are significant except fplace which has a p-value greater than 0.05. Lets carry out the regression again without fplace variable</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>formular2 = 'price ~ C(utown1) + sqft + C(utown1):sqft + age + C(pool)'</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>Model2 = smf.ols(formula = formular2, data = utown)</p>
			<p>results2 = Model2.fit()</p>
			<p>print(results2.summary())</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:                  price   R-squared:                       0.870
Model:                            OLS   Adj. R-squared:                  0.870
Method:                 Least Squares   F-statistic:                     1333.
Date:                Sat, 12 Jan 2019   Prob (F-statistic):               0.00
Time:                        08:00:47   Log-Likelihood:                -4139.8
No. Observations:                1000   AIC:                             8292.
Df Residuals:                     994   BIC:                             8321.
Df Model:                           5                                         
Covariance Type:            nonrobust                                         
=======================================================================================
                          coef    std err          t      P&gt;|t|      [0.025      0.975]
---------------------------------------------------------------------------------------
Intercept              24.1378      6.194      3.897      0.000      11.983      36.292
C(utown1)[T.1]         28.3749      8.413      3.373      0.001      11.866      44.884
C(pool)[T.1]            4.2879      1.197      3.583      0.000       1.940       6.636
sqft                    7.6603      0.244     31.426      0.000       7.182       8.139
C(utown1)[T.1]:sqft     1.2623      0.332      3.806      0.000       0.612       1.913
age                    -0.1870      0.051     -3.650      0.000      -0.287      -0.086
==============================================================================
Omnibus:                        0.445   Durbin-Watson:                   1.990
Prob(Omnibus):                  0.800   Jarque-Bera (JB):                0.362
Skew:                          -0.040   Prob(JB):                        0.835
Kurtosis:                       3.047   Cond. No.                         627.
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
		<ul>
		<li>From the results we can see from the coefficient on utown1 that houses near the university on average are 28,000 dollars more than those that are not near the university given than they have the same pool size and square feet.</li>
		<li>The coefficient of pool shows that houses with a pool near the university average are 4,288 dollars more than those that are not near the university given than they have the same square feet.</li>
		<li>The coefficient of sqft shows that a unit increase in square feet for houses not near the university will increase the price of the house by 7,660 dollars</li>
		<li>The coefficient of the interaction variable of sqft and utown1 shows that a unit increase in square feet for houses near the university will increase the price of the house by 8,922 (7,660 + 1,262) dollars</li>
		<li>The coefficient of age shows that as the age of the house increases by one year, the price of the house will on average fall by 187 dollars</li>
		</ul>
		</div>	
		<div class="col-md-12">
		<p>From the results fplace was not really contributing that much to the model, because r-squared is still at 87%</p>
		<p>Testing hypotheses about coefficients of indicator variables is no different than testing hypotheses about any other coefficients. To test the significance of the University Town location we test the joint null hypothesis H0 : a = 0, y = 0 against the alternative that one of these coefficients is not zero. The F-test of this hypothesis can be carried out using the function below</p>
		</div>	
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>hypothesis = '(C(utown1)[T.1] = 0), (C(utown1)[T.1]:sqft = 0)'</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>results2.f_test(hypothesis)</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>&lt;class &#39;statsmodels.stats.contrast.ContrastResults&#39;&gt;
&lt;F test: F=array([[1950.1674044]]), p=0.0, df_denom=994, df_num=2&gt;</pre>
		</div>
		<div class="col-md-12">
		<p>Based on the test result, with p-value 0.0000, we reject the null hypothesis that location has no effect at significance level of 0.05 or even 0.001.</p>
		<p>We can also calculate the estimated regression slope and intercept for houses near the university.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>thypothesis1 = 'Intercept + C(utown1)[T.1] = 0'</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>results2.t_test(thypothesis1)</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>&lt;class &#39;statsmodels.stats.contrast.ContrastResults&#39;&gt;
                             Test for Constraints                             
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
c0            52.5127      5.763      9.112      0.000      41.203      63.822
==============================================================================</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>thypothesis2 = 'sqft + C(utown1)[T.1]:sqft = 0'</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>results2.t_test(thypothesis2)</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>&lt;class &#39;statsmodels.stats.contrast.ContrastResults&#39;&gt;
                             Test for Constraints                             
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
c0             8.9226      0.225     39.672      0.000       8.481       9.364
==============================================================================</pre>
		</div>
		<div class="col-md-12">
		<p>These outputs are sililar to statas lincom for linear combinations.</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="heteroskedasticity.php">TESTING AND DEALING WITH HETEROSKEDASTICITY IN PYTHON</a></p>
			<p>PREVIOUS:: <a href="zscores_reg.php">GETTING BETA COEFFICIENTS FROM Z-SCORES</a></p>
		</div>
		
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/dummy_reg.php';  // Replace PAGE_URL with your page's canonical URL variable
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
