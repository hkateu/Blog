<html>
	<head>
		<title>hkanalytics | TimeSeries Analysis in Python: Part 1, Data preparation</title>
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
				<h1><center>TIMESERIES ANALYSIS IN PYTHON: PART 1, DATA PREPARATION</center></h1>
				<p>In this tutorial we shall see how to prepare our data for timeseries analysis.</p>
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
			<p>Importing the data to pandas dataframe</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>okun = pd.read_csv('okun.csv')</p>
				<p>print(okun.head())</p>
				<p>print(okun.tail())</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>     g    u
0  1.4  7.3
1  2.0  7.2
2  1.4  7.0
3  1.5  7.0
4  0.9  7.2
      g    u
93  0.3  6.1
94 -1.4  6.9
95 -1.2  8.1
96 -0.2  9.3
97  0.8  9.6
</pre>
		</div>	
		<div class="col-md-12">
			<p>Description of the data</p>
			<p>This data set contains two variables, g and u, that are quarterly observations on the percentage change in Gross Domestic Product and the unemployment rate for the U.S. from 1985q2 to 2009q3</p>
			<p>Next we are going to create the date column running from1985q2 to2009q3 using pandas date_range function.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>tsindex = pd.date_range('1985Q2', periods=98, freq = 'Q')</p>
				<p>print(tsindex[:5])</p>
				<p>print(tsindex[-5:])</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>DatetimeIndex([&#39;1985-06-30&#39;, &#39;1985-09-30&#39;, &#39;1985-12-31&#39;, &#39;1986-03-31&#39;,
               &#39;1986-06-30&#39;],
              dtype=&#39;datetime64[ns]&#39;, freq=&#39;Q-DEC&#39;)
DatetimeIndex([&#39;2008-09-30&#39;, &#39;2008-12-31&#39;, &#39;2009-03-31&#39;, &#39;2009-06-30&#39;,
               &#39;2009-09-30&#39;],
              dtype=&#39;datetime64[ns]&#39;, freq=&#39;Q-DEC&#39;)
</pre>
		</div>
		<div class="col-md-12">
			<p>As you can see the last date is in the month of september which falls in the 3rd quarter of the year 2009</p>
			<p>Assigning these dates to the index of the dataset</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>okun.index = tsindex</p>
				<p>print(okun.head())</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>              g    u
1985-06-30  1.4  7.3
1985-09-30  2.0  7.2
1985-12-31  1.4  7.0
1986-03-31  1.5  7.0
1986-06-30  0.9  7.2
</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
				<p>print(okun.tail())</p>
		</code>
		</div>
		<div class="col-md-12">
<pre>              g    u
2008-09-30  0.3  6.1
2008-12-31 -1.4  6.9
2009-03-31 -1.2  8.1
2009-06-30 -0.2  9.3
2009-09-30  0.8  9.6
</pre>
		</div>
		<div class="col-md-12">
			<p>Now the dataset can be declared as a timeseries dataset</p>
			<p>The best place to start with timeseries analysis is to plot these two varibles against time inorder to see their trends</p>
			<p>This can be done using pandas plot function</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>okun.plot()</p>
			<p>plt.xlabel('years')</p>
			<p>plt.ylabel('gdp')</p>
			<p>plt.title('Unemployment vs gdp')</p>
			<p>plt.show()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/tsaone.png" />
		</div>
		
		<div class="col-md-12">
<p>The unemployment series (orange) shows a wider range of variation than GDP growth (blue), but less variance from one time period to the next. There are no obvious trends, breaks, or other features that would suggest that either of the variables is nonstationary. Therefore, these variables are probably well-suited for the traditional regression techniques discussed</p>
		</div>
		<div class="col-md-12">
			<p>NEXT:: <a href="timetwo.php">TIMESERIES ANALYSIS IN PYTHON: PART2, FINITE DISTRIBUTED LAG MODELS</a></p>
			<p>PREVIOUS:: <a href="logit.php">LOGIT MODELS</a></p>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="comments">
		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://hkanalytics.co.ug/time.php';  // Replace PAGE_URL with your page's canonical URL variable
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
