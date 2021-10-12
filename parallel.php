<html>
	<head>
		<title>hkanalytics | Feature selection on the Titanic dataset using parallel coordinate plots.</title>
		<meta name="viewport" content="width=divice-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="keywords" content="Uganda, machine learning, python, matplotlib, visualization">
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

<a class="navbar-brand" rel="home" href="#" title="hkanalystics">
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
				<h1><center>FEATURE SELECTION ON THE TITANIC DATASET USING PARALLEL COORDINATE PLOTS.</center></h1>
				<p>A parallel coordinate plot is ideal for comparing many variables together and seeing the relationship between them. Values are lotted as a series of lines that connected across all axes. This means that  each line is a collection of points placed on each axis, that have all been colleccted together. To read more about parallel coordinate plots, you can click <a href="datavizcatalogue.com/methods/parallel_coordinates.html">here</a>.
				<p>The goal of this tutorial is to see how we can use parallel coordinate plots for feature selection in titanic data.</p>
				<p>The Titanic dataset describes the survival status of individual passengers on the Titanic.</p>
			</div>
		<div class="col-md-12">
			<p>Importing the decessary libraries</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>%matplotlib inline</p>
		</br>

		<p>import pandas as pd</p>
		<p>import numpy as np</p>
		<p>from pandas import DataFrame, Series</p>
		<p>from pylab import *</p>
		<p>import matplotlib.pyplot as plot</p>
		</code>
			</div>
		<div class="col-md-12">
			<p>Importing the Titanic dataset</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>titanic = pd.read_excel("titanic3.xls")</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Viewing the top 5 rows</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>titanic.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>pclass</th>
      <th>survived</th>
      <th>name</th>
      <th>sex</th>
      <th>age</th>
      <th>sibsp</th>
      <th>parch</th>
      <th>ticket</th>
      <th>fare</th>
      <th>cabin</th>
      <th>embarked</th>
      <th>boat</th>
      <th>body</th>
      <th>home.dest</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>1</td>
      <td>1</td>
      <td>Allen, Miss. Elisabeth Walton</td>
      <td>female</td>
      <td>29.0000</td>
      <td>0</td>
      <td>0</td>
      <td>24160</td>
      <td>211.3375</td>
      <td>B5</td>
      <td>S</td>
      <td>2</td>
      <td>NaN</td>
      <td>St Louis, MO</td>
    </tr>
    <tr>
      <th>1</th>
      <td>1</td>
      <td>1</td>
      <td>Allison, Master. Hudson Trevor</td>
      <td>male</td>
      <td>0.9167</td>
      <td>1</td>
      <td>2</td>
      <td>113781</td>
      <td>151.5500</td>
      <td>C22 C26</td>
      <td>S</td>
      <td>11</td>
      <td>NaN</td>
      <td>Montreal, PQ / Chesterville, ON</td>
    </tr>
    <tr>
      <th>2</th>
      <td>1</td>
      <td>0</td>
      <td>Allison, Miss. Helen Loraine</td>
      <td>female</td>
      <td>2.0000</td>
      <td>1</td>
      <td>2</td>
      <td>113781</td>
      <td>151.5500</td>
      <td>C22 C26</td>
      <td>S</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>Montreal, PQ / Chesterville, ON</td>
    </tr>
    <tr>
      <th>3</th>
      <td>1</td>
      <td>0</td>
      <td>Allison, Mr. Hudson Joshua Creighton</td>
      <td>male</td>
      <td>30.0000</td>
      <td>1</td>
      <td>2</td>
      <td>113781</td>
      <td>151.5500</td>
      <td>C22 C26</td>
      <td>S</td>
      <td>NaN</td>
      <td>135.0</td>
      <td>Montreal, PQ / Chesterville, ON</td>
    </tr>
    <tr>
      <th>4</th>
      <td>1</td>
      <td>0</td>
      <td>Allison, Mrs. Hudson J C (Bessie Waldo Daniels)</td>
      <td>female</td>
      <td>25.0000</td>
      <td>1</td>
      <td>2</td>
      <td>113781</td>
      <td>151.5500</td>
      <td>C22 C26</td>
      <td>S</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>Montreal, PQ / Chesterville, ON</td>
    </tr>
  </tbody>
</table>
</div>
		</div>
		<div class="col-md-12">
			<p>Viewing the shape of the dataset.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>titanic.shape</p>
			</code>
		</div>
		
		<div class="col-md-12" >
			<pre>(1309, 14)</pre>
		</div>
		<div class="col-md-12">
			<p>lets slim down the dataset, because some of these features donnot help much in prediction. For this tutorial we shall remove name,ticket, cabin, boat, body and home.dest, just to keep things simple.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>titanic = titanic.drop(['name', 'ticket', 'cabin', 'boat', 'body', 'home.dest'], axis = 1)</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>viewing the slimmed down dataset</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>titanic.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<table border="1" class="table table-striped">
<thead>
    <tr style="text-align: right;">
      <th></th>
      <th>pclass</th>
      <th>survived</th>
      <th>sex</th>
      <th>age</th>
      <th>sibsp</th>
      <th>parch</th>
      <th>fare</th>
      <th>embarked</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>1</td>
      <td>1</td>
      <td>female</td>
      <td>29.0000</td>
      <td>0</td>
      <td>0</td>
      <td>211.3375</td>
      <td>S</td>
    </tr>
    <tr>
      <th>1</th>
      <td>1</td>
      <td>1</td>
      <td>male</td>
      <td>0.9167</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>S</td>
    </tr>
    <tr>
      <th>2</th>
      <td>1</td>
      <td>0</td>
      <td>female</td>
      <td>2.0000</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>S</td>
    </tr>
    <tr>
      <th>3</th>
      <td>1</td>
      <td>0</td>
      <td>male</td>
      <td>30.0000</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>S</td>
    </tr>
    <tr>
      <th>4</th>
      <td>1</td>
      <td>0</td>
      <td>female</td>
      <td>25.0000</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>S</td>
    </tr>
  </tbody>
</table>
</div>
</div>
		<div class="col-md-12">
			<p>lets drop rows with missing observations in the dataset</p>	
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>titanic = titanic.dropna()</p>
		</code>
		</div>
				<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>titanic.shape</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>(1043, 8)</pre>
			<p>We have now reduced the dataset to 1043 rows and 8 columns</p>
			<p>Creating dummy variables for sex and embarked</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>pd.unique(titanic['sex'])</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>array([&#39;female&#39;, &#39;male&#39;], dtype=object)</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>pd.unique(titanic['embarked'])</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>array([&#39;S&#39;, &#39;C&#39;, &#39;Q&#39;], dtype=object)</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<pre class="code">Sex1 = []
Embarked = []
for i in range(titanic.shape[0]):
    if(titanic.iloc[i,2] == "male"):
        Sex1.append(0)
    else:
        Sex1.append(1)
        
for i in range(titanic.shape[0]):
    if(titanic.iloc[i,7] == 'S'):
        Embarked.append(0)
    elif(titanic.iloc[i,7] == 'C'):
        Embarked.append(1)
    else:
        Embarked.append(2)</pre>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>titanic['sex'] = Sex1</p>
			<p>titanic['embarked'] = Embarked</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>titanic.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<table border="1" class="table table-striped">
<thead>
    <tr style="text-align: right;">
      <th></th>
      <th>pclass</th>
      <th>survived</th>
      <th>sex</th>
      <th>age</th>
      <th>sibsp</th>
      <th>parch</th>
      <th>fare</th>
      <th>embarked</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>29.0000</td>
      <td>0</td>
      <td>0</td>
      <td>211.3375</td>
      <td>0</td>
    </tr>
    <tr>
      <th>1</th>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td>0.9167</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>0</td>
    </tr>
    <tr>
      <th>2</th>
      <td>1</td>
      <td>0</td>
      <td>1</td>
      <td>2.0000</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>0</td>
    </tr>
    <tr>
      <th>3</th>
      <td>1</td>
      <td>0</td>
      <td>0</td>
      <td>30.0000</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>0</td>
    </tr>
    <tr>
      <th>4</th>
      <td>1</td>
      <td>0</td>
      <td>1</td>
      <td>25.0000</td>
      <td>1</td>
      <td>2</td>
      <td>151.5500</td>
      <td>0</td>
    </tr>
  </tbody>
</table>
	</div>
	</div>
		<div class="col-md-12">
			<p>Using a boxplot to visualize our data</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>titanic.boxplot(rot=90)</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<pre>&lt;matplotlib.axes._subplots.AxesSubplot at 0x44ddc247f0&gt;</pre>
			<img src="img/boxtitanic.png" />
		</div>
		</div>
		<div class="col-md-12">
			<p>Some variables are not seen because of the difference in scale, the solution is to normalize the data a plot again.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>from sklearn import preprocessing</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>norm_titanic = preprocessing.normalize(titanic)</p>
	`		<p>columnames = titanic.columns</p>
			<p>norm_titanic = DataFrame(norm_titanic, columns= columnames)</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>norm_titanic.boxplot(rot=90)</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<pre>&lt;matplotlib.axes._subplots.AxesSubplot at 0x44ddb79e48&gt;</pre>
			<img src="img/normtitanic.png" />
		</div>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>norm_titanic.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
				<div class="col-md-12">
		<table border="1" class="table table-striped">
<thead>
    <tr style="text-align: right;">
      <th></th>
      <th>pclass</th>
      <th>survived</th>
      <th>sex</th>
      <th>age</th>
      <th>sibsp</th>
      <th>parch</th>
      <th>fare</th>
      <th>embarked</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>0.004688</td>
      <td>0.004688</td>
      <td>0.004688</td>
      <td>0.135943</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.990683</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>1</th>
      <td>0.006597</td>
      <td>0.006597</td>
      <td>0.000000</td>
      <td>0.006048</td>
      <td>0.006597</td>
      <td>0.013195</td>
      <td>0.999829</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>2</th>
      <td>0.006597</td>
      <td>0.000000</td>
      <td>0.006597</td>
      <td>0.013194</td>
      <td>0.006597</td>
      <td>0.013194</td>
      <td>0.999761</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>3</th>
      <td>0.006472</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.194162</td>
      <td>0.006472</td>
      <td>0.012944</td>
      <td>0.980841</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>4</th>
      <td>0.006510</td>
      <td>0.000000</td>
      <td>0.006510</td>
      <td>0.162738</td>
      <td>0.006510</td>
      <td>0.013019</td>
      <td>0.986519</td>
      <td>0.0</td>
    </tr>
  </tbody>
</table>
	</div>
	</div>
		<div class="col-md-12">
			<p>Reordering the columns so that we have survived first</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>cols = list(norm_titanic.columns)</p>
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>new_col = [cols[1]]</p>
			<p>new_col</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>[&#39;survived&#39;]</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>new_col.extend([cols[0]])</p>
			<p>new_col</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>[&#39;survived&#39;, &#39;pclass&#39;]</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>new_col.extend(cols[2::])</p>
			<p>new_col</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>[&#39;survived&#39;, &#39;pclass&#39;, &#39;sex&#39;, &#39;age&#39;, &#39;sibsp&#39;, &#39;parch&#39;, &#39;fare&#39;, &#39;embarked&#39;]</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>norm_titanic = norm_titanic[new_col]</p>
			<p>norm_titanic.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<table border="1" class="table table-striped">
<thead>
    <tr style="text-align: right;">
      <th></th>
      <th>survived</th>
      <th>pclass</th>
      <th>sex</th>
      <th>age</th>
      <th>sibsp</th>
      <th>parch</th>
      <th>fare</th>
      <th>embarked</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>0.004688</td>
      <td>0.004688</td>
      <td>0.004688</td>
      <td>0.135943</td>
      <td>0.000000</td>
      <td>0.000000</td>
      <td>0.990683</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>1</th>
      <td>0.006597</td>
      <td>0.006597</td>
      <td>0.000000</td>
      <td>0.006048</td>
      <td>0.006597</td>
      <td>0.013195</td>
      <td>0.999829</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>2</th>
      <td>0.000000</td>
      <td>0.006597</td>
      <td>0.006597</td>
      <td>0.013194</td>
      <td>0.006597</td>
      <td>0.013194</td>
      <td>0.999761</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>3</th>
      <td>0.000000</td>
      <td>0.006472</td>
      <td>0.000000</td>
      <td>0.194162</td>
      <td>0.006472</td>
      <td>0.012944</td>
      <td>0.980841</td>
      <td>0.0</td>
    </tr>
    <tr>
      <th>4</th>
      <td>0.000000</td>
      <td>0.006510</td>
      <td>0.006510</td>
      <td>0.162738</td>
      <td>0.006510</td>
      <td>0.013019</td>
      <td>0.986519</td>
      <td>0.0</td>
    </tr>
  </tbody>
</table>
	</div>
	</div>
		<div class="col-md-12">
			<p>Now that we have prepared our data we can now create our prallel coordinate plot</p>
			<p>Plotting the dataset without survived</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p><new_col2 = new_col[1::]</p>
		<p>new_col2</p>	
		</code>
		</div>
		<div class="col-md-12">
			<pre>[&#39;pclass&#39;, &#39;sex&#39;, &#39;age&#39;, &#39;sibsp&#39;, &#39;parch&#39;, &#39;fare&#39;, &#39;embarked&#39;]</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<pre class="code">for i in range(norm_titanic.shape[0]):
    #plot rows of data as if they were series data
    dataRow = norm_titanic.iloc[i,1:7]
    normTarget = norm_titanic.iloc[i,6] 
    dataRow.plot(color=plot.cm.RdYlBu(normTarget), alpha=0.5)

plot.xticks(range(len(new_col2)),new_col2)
plot.xlabel("Attribute Index")
plot.ylabel(("Attribute Values"))
plot.show()</pre>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<pre>&lt;matplotlib.axes._subplots.AxesSubplot at 0x44ddb79e48&gt;</pre>
			<img src="img/pcp.png" />
		</div>
		</div>
		<div class="col-md-12">
			<p>overlapping vs distinct colors which make good predictor for survival in titanic dataset As a rule of thumb, variables that have overlapping colors donnot make good predictors, in essence these are the variables we would drop from our feature set.</p>
			<p>To prove this we can run a regression model and look at the probability values.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>import statsmodels.formula.api as smf</p>	
		</code>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>titanicModel = smf.ols(formula = 'survived ~ pclass + sex + age + sibsp + parch + fare + embarked', data = norm_titanic)</p>
		<p>results = titanicModel.fit()</p>
		<p>print(results.summary())></p>	
		</code>
		</div>
		<div class="col-md-12">
		<pre>                            OLS Regression Results                            
==============================================================================
Dep. Variable:               survived   R-squared:                       0.312
Model:                            OLS   Adj. R-squared:                  0.307
Method:                 Least Squares   F-statistic:                     66.99
Date:                Sun, 28 Jul 2019   Prob (F-statistic):           1.06e-79
Time:                        12:36:26   Log-Likelihood:                 2972.3
No. Observations:                1043   AIC:                            -5929.
Df Residuals:                    1035   BIC:                            -5889.
Df Model:                           7                                         
Covariance Type:            nonrobust                                         
==============================================================================
                 coef    std err          t      P&gt;|t|      [0.025      0.975]
------------------------------------------------------------------------------
Intercept     -0.0032      0.006     -0.537      0.592      -0.015       0.009
pclass         0.0862      0.011      7.664      0.000       0.064       0.108
sex            0.3772      0.030     12.591      0.000       0.318       0.436
age           -0.0021      0.005     -0.463      0.643      -0.011       0.007
sibsp         -0.1131      0.019     -5.895      0.000      -0.151      -0.075
parch          0.0933      0.024      3.808      0.000       0.045       0.141
fare           0.0101      0.005      2.064      0.039       0.000       0.020
embarked       0.0432      0.025      1.761      0.079      -0.005       0.091
==============================================================================
Omnibus:                      117.289   Durbin-Watson:                   1.769
Prob(Omnibus):                  0.000   Jarque-Bera (JB):              329.944
Skew:                           0.581   Prob(JB):                     2.26e-72
Kurtosis:                       5.498   Cond. No.                         97.9
==============================================================================

Warnings:
[1] Standard Errors assume that the covariance matrix of the errors is correctly specified.
</pre>
		</div>
		<div class="col-md-12">
			<p>From the results we can see that age and embarked have a probability of 0.643 and 0.079 respectively which are both less than the 0.05, meaning they are both not significant to the model and can be dropped.</p>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/parliament.php';  // Replace PAGE_URL with your page's canonical URL variable
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
