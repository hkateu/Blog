<html>
	<head>
		<title>hkanalytics | An indepth analysis of 10th parliament.</title>
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
				<h1><center>AN INDEPTH ANLYSIS OF DATA ON MEMBERS OF 10th PALIAMENT OF UGANDA</center></h1>
				<p>Special thanks to <a href="catalog.data.ug">catalog.data.ug</a> for providing the dataset</p>
				<p>The examples below will give you an understading of the binomial distribution using the Numpy and Scipy  python libraries</p>
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
		<p>import matplotlib.pyplot as plt<p>
		<p>from wordcloud import WordCloud, STOPWORDS</p>
		</code>
			</div>
		<div class="col-md-12">
			<p>Importing the decessary libraries</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>members = pd.read_csv("parliament.csv", encoding= "ISO-8859-1")</p>
			<p>members.head()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
		<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>No.</th>
      <th>Name of M.P</th>
      <th>District</th>
      <th>Constituency</th>
      <th>Political Party</th>
      <th>Profession</th>
      <th>Marital status</th>
      <th>Phone number</th>
      <th>Date of Birth</th>
      <th>P.L.E School</th>
      <th>...</th>
      <th>Unnamed: 77</th>
      <th>Unnamed: 78</th>
      <th>Unnamed: 79</th>
      <th>Unnamed: 80</th>
      <th>Unnamed: 81</th>
      <th>Unnamed: 82</th>
      <th>Unnamed: 83</th>
      <th>Unnamed: 84</th>
      <th>Unnamed: 85</th>
      <th>Unnamed: 86</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>1</td>
      <td>Aadroa Alex Onzima</td>
      <td>None</td>
      <td>Ex-Officio</td>
      <td>None</td>
      <td>Administrator</td>
      <td>Married</td>
      <td>0.999914621</td>
      <td>6/24/1952</td>
      <td>Oluvu Primary School, Arua</td>
      <td>...</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
    <tr>
      <th>1</th>
      <td>2</td>
      <td>Ababiku Jesca</td>
      <td>Adjumani</td>
      <td>District Woman Representative</td>
      <td>NRM</td>
      <td>Teacher</td>
      <td>Single</td>
      <td>772315541</td>
      <td>7/17/1975</td>
      <td>Adjumani Girls Primary School</td>
      <td>...</td>
      <td>Youth Leader U.P.C Party, Lira North constitue...</td>
      <td>Secretary Student Council, Lango College, 1972...</td>
      <td>Headteacher, Onono Memorial S.S, 1975-1981</td>
      <td>NaN</td>
      <td>Music, dance, Drama, Singing, Hunting</td>
      <td>Conflicts management</td>
      <td>NaN</td>
      <td>Red Cross, Trade Technology, Cultural Group</td>
      <td>Committee on Science and Technology</td>
      <td>Member</td>
    </tr>
    <tr>
      <th>2</th>
      <td>3</td>
      <td>ABACANON CHARLES ANGIRO GUTOMOI</td>
      <td>Lira</td>
      <td>ERUTE COUNTY NORTH</td>
      <td>FDC</td>
      <td>Farmer</td>
      <td>Married</td>
      <td>392944775</td>
      <td>5/17/1949</td>
      <td>East African Exams Council</td>
      <td>...</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
    <tr>
      <th>3</th>
      <td>4</td>
      <td>ABALA DAVID</td>
      <td>Ngora</td>
      <td>Ngora County</td>
      <td>NRM</td>
      <td>Administrator</td>
      <td>Married</td>
      <td>0772408242, 0702888820</td>
      <td>10/3/1975</td>
      <td>NaN</td>
      <td>...</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
    <tr>
      <th>4</th>
      <td>5</td>
      <td>ABBAS AGABA MUGISHA</td>
      <td>Kamwenge</td>
      <td>Kitagwenda County</td>
      <td>NRM</td>
      <td>Lawyer/Advocate</td>
      <td>Married</td>
      <td>772628660</td>
      <td>10/13/1979</td>
      <td>NaN</td>
      <td>...</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
      <td>NaN</td>
    </tr>
  </tbody>
</table>
<p>5 rows × 87 columns</p>
</div>
		</div>
		<div class="col-md-12">
			<p>Listing all the columns in the dataset.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>members.columns</p>
			</code>
		</div>
		
		<div class="col-md-12 movable" >
			<pre>Index([&#39;No.&#39;, &#39;Name of M.P&#39;, &#39;District&#39;, &#39;Constituency&#39;, &#39;Political Party&#39;,
       &#39;Profession&#39;, &#39;Marital status&#39;, &#39;Phone number&#39;, &#39;Date of Birth&#39;,
       &#39;P.L.E School&#39;, &#39;P.L.E Year&#39;, &#39;U.C.E School&#39;, &#39;U.C.E Year&#39;,
       &#39;U.A.C.E School&#39;, &#39;U.A.C.E Year&#39;, &#39;First Degree&#39;,
       &#39;University of First Degree&#39;, &#39;Year of first Degree&#39;, &#39;Second Degree&#39;,
       &#39;University of Second Degree&#39;, &#39;Year of second degree&#39;, &#39;Third Degree&#39;,
       &#39;University of Third Degree&#39;, &#39;Year of Third Degree&#39;,
       &#39;Other Qualifications&#39;, &#39;Past Job_1&#39;, &#39;Past Job_2&#39;, &#39;Past Job_3&#39;,
       &#39;Past Job_4&#39;, &#39;Past Job_5&#39;, &#39;Past Job_6&#39;, &#39;Past Job_7&#39;, &#39;Past Job_8&#39;,
       &#39;Past Job_9&#39;, &#39;Past Job_10&#39;, &#39;Hobbies&#39;, &#39;Special Interests&#39;,
       &#39;Other Information&#39;, &#39;Professional Body Membership&#39;, &#39;Committee_1&#39;,
       &#39;Role on Committee 1&#39;, &#39;Committee_2&#39;, &#39;Role on Committee 2&#39;,
       &#39;Committee_3&#39;, &#39;Role on Committee 3&#39;, &#39;Committee_4&#39;,
       &#39;Role on Committee 4&#39;, &#39;Unnamed: 47&#39;, &#39;Unnamed: 48&#39;, &#39;Unnamed: 49&#39;,
       &#39;Unnamed: 50&#39;, &#39;Unnamed: 51&#39;, &#39;Unnamed: 52&#39;, &#39;Unnamed: 53&#39;,
       &#39;Unnamed: 54&#39;, &#39;Unnamed: 55&#39;, &#39;Unnamed: 56&#39;, &#39;Unnamed: 57&#39;,
       &#39;Unnamed: 58&#39;, &#39;Unnamed: 59&#39;, &#39;Unnamed: 60&#39;, &#39;Unnamed: 61&#39;,
       &#39;Unnamed: 62&#39;, &#39;Unnamed: 63&#39;, &#39;Unnamed: 64&#39;, &#39;Unnamed: 65&#39;,
       &#39;Unnamed: 66&#39;, &#39;Unnamed: 67&#39;, &#39;Unnamed: 68&#39;, &#39;Unnamed: 69&#39;,
       &#39;Unnamed: 70&#39;, &#39;Unnamed: 71&#39;, &#39;Unnamed: 72&#39;, &#39;Unnamed: 73&#39;,
       &#39;Unnamed: 74&#39;, &#39;Unnamed: 75&#39;, &#39;Unnamed: 76&#39;, &#39;Unnamed: 77&#39;,
       &#39;Unnamed: 78&#39;, &#39;Unnamed: 79&#39;, &#39;Unnamed: 80&#39;, &#39;Unnamed: 81&#39;,
       &#39;Unnamed: 82&#39;, &#39;Unnamed: 83&#39;, &#39;Unnamed: 84&#39;, &#39;Unnamed: 85&#39;,
       &#39;Unnamed: 86&#39;],
      dtype=&#39;object&#39;)</pre>
		</div>
		<div class="col-md-12">
			<p>The last half of the columns are not labeled, but for this analysis we shall on concentrate on those that are labeled.</p>
			<h3>Visualizing how many members are in each political party.</h3> 
			<p>The fifth column shows political parties every member of parliament belongs to</p>
		</div>
		<div class="col-md-12">
			<p>Extracting column from the dataset</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>Pol_party = members.iloc[:,4]</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Creating a function to convert all words to capital</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>def to_upper(x):</p>
		<p>u = x.upper()</p>
		<p>return u</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Applying the function to the dataset</p>	
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		<p>Pol_party = Pol_party.apply(to_upper)</p>
		</code>
		</div>
		<div class="col-md-12">
			<p>Finding the number of members in each political party</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>Pol_df = Pol_party.value_counts()</p>
			<p>Pol_df</p>
		</code>
		</div>
		<div class="col-md-12">
		<pre>NRM            293
INDEPENDENT     65
FDC             35
NONE            17
DP              13
ARMY            10
UPC              6
Name: Political Party, dtype: int64</pre>	
		</div>
		<div class="col-md-12">
			<p>Plotting these frequencies on a bar graph</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>polbar = Pol_df.plot(kind="bar",title = "MPs aggregated by Political Parties")</p>
			<p>polbar.set_xlabel("Political parties")</p>
			<p>polbar.set_ylabel("Frequency")</p>
			</br>
			<p><i>#If you want to save the pandas plot use the following code</i></p>
		<p>fig = polbar.get_figure()</p>
		<p>fig.savefig("polparty.png", bbox_inches = "tight")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
			<img src="postimg/polparty.png" />
		</div>
		</div>
		<div class="col-md-12">
			<p>The graph above shows NRM has the majority share of parliamentarians followed by INDEPENDENT and FDC.</p>
		</div>
		<div class="col-md-12">
			<h3>Finding out the common professions of members in parliament</h3>
			<p>The sixth column shows professions of every member of parliament</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold" >
		<code class="col-md-12">
			<p><i>#selecting the six column labeled profession</i></p>
			<p>profession = members.iloc[:,5]</p>
			<br>
			<p><i>viewing the first 5 rows</i></p>
			<p>profession.head()</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>0      Administrator
1            Teacher
2             Farmer
3      Administrator
4    Lawyer/Advocate
Name: Profession, dtype: object</pre>
		</div>
		<div class="col-md-12">
			<p>Visualizing professions of members of parliament using a word cloud</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#setting the stopwords</i></p>
			<p>stopwords = set(STOPWORDS)</p>
			</br>

			<p><i>#wordcloud function using WordCloud library</i></p>
<p>wordcloud = WordCloud(</p>
                          <p class="codeind">background_color='white',</p>
                          <p class="codeind">stopwords=stopwords,</p>
						<p class="codeind"><i># max_words=200,</i></p>
                          <p class="codeind"><i># max_font_size=40,</i></p> 
                          <p class="codeind">random_state=42</p>
                         <p class="codeind">).generate(str(profession))</p>
			</br>
			<p>print(wordcloud)</p>
			</br>
			<p><i>#displaying wordcloud</i></p>
			<p>fig = plt.figure(figsize=(10, 10))</p>
			<p>plt.imshow(wordcloud)</p>
			<p>plt.axis('off')</p>
			<p>plt.show()</p>
		</code>
		</div>
		<div class="col-md-12">
			
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
			<p>&lt wordcloud.wordcloud.WordCloud object at 0x00000094603D28D0 &gt</p>
			<img src="postimg/profession.png" />
			<p>&lt Figure size 432x288 with 0 Axes &gt</p>
		</div>
		</div>
		<div class="col-md-12">
			<p>From the wordcloud above there are a number of common professions, Administrator and Teacher seem to be the most common professions among parliamentarians, other fairly common professions include Accountants and Lawyers</p>
		</div>
		<div class="col-md-12">
			<p>Iam a statisticain by profession and was curious to know how many statisticians are in parliament. The code below can answer this question</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		</p><i>#creating a dataframe with professions and frequency</i></p>
		<p>statistician_check = pd.DataFrame([profession.value_counts().index, profession.value_counts()])</p>
		<p>statistician_check = statistician_check.T</p>
		<p>statistician_check.columns = ['Prof', 'Freq']</p>
		<p>statistician_check.head()</p>	
		</code>
		</div>
		<div class="col-md-12 movable" >
			<div class="col-md-3">
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>Prof</th>
      <th>Freq</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>0</th>
      <td>Teacher</td>
      <td>61</td>
    </tr>
    <tr>
      <th>1</th>
      <td>Social Worker</td>
      <td>48</td>
    </tr>
    <tr>
      <th>2</th>
      <td>Administrator</td>
      <td>37</td>
    </tr>
    <tr>
      <th>3</th>
      <td>Accountant</td>
      <td>35</td>
    </tr>
    <tr>
      <th>4</th>
      <td>Lawyer/ Advocate</td>
      <td>23</td>
    </tr>
  </tbody>
</table>
			</div>
		</div>
		<div class="col-md-12">
			<p>The frequencies are consistent with the output from word cloud above, however Social Worker didnt reflect as well as it should being the second most common profession in parliament</p>
			<p>Another point to not is that Lawyer is the same as Advocate but this doesnt reflect in the word cloud since it excluded the / character.</p>
			<p>Filtering the data frame and checking if it contains the words Analyst or statistician.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
		</p>statistician_check[statistician_check["Prof"].str.contains("Analyst|Statistician") == True]</p>	
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-3">
			<table border="1" class="table table-striped">
  <thead>
    <tr style="text-align: right;">
      <th></th>
      <th>Prof</th>
      <th>Freq</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>54</th>
      <td>Analyst</td>
      <td>1</td>
    </tr>
  </tbody>
</table>
		</div>
		</div>
		<div class="col-md-12">
			<p>Unfortunately there are no statisticians in parliament according to the data provided however there is one analyst but we cant be sure what type of analyst he/she is.</p>
			<h3>Next we shall find out those that are single and married</h3>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#extracting the data from the dataframe.</i></p>
			<p>married = members.iloc[:,6]</p>
			<br/>
			<p><i>#getting the frequencies of marital status column</i></p>
			<p>marr_freq = married.value_counts()</p>
			<p>marr_freq</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>Married                   374
Single                     38
Widowed                    14
Divorced                    3
NIL                         3
Something                   2
0772444801/0774240834       1
0774195136/ 0700317321      1
Name: Marital status, dtype: int64</pre>
		</div>
		<div class="col-md-12">
			<p>From the results above, there are some wrong values captured in this column, like the telephone numbers and the word 'somethng' but this is jus for 4 observations. Three observations were entered as NIL which signifies missing entries.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#plotting the data on a bar graph</i></p>
			<p>marr = marr_d.plot.bar(title = "Bar chart showing marital status of MPs")</p>
			<p>marr.set_xlabel("Marital Status")</p>
			<p>marr.set_ylabel("Frequency")</p>
			
			<br/>
			<p><i>#Saving the image sas marital.png</i></p>
			<p>fig1 = marr.get_figure()</p>
			<p>fig1.savefig("marital.png", bbox_inches = "tight")</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
			<img src="postimg/marital.png" />			
		</div>
		</div>
		<div class="col-md-12 ">
			<p>According to the bar graph above, the majority of memebers of parliament are married those that are single are just 38, with the least number being widowd and divorced</p>
			<h3>Finding the age distribution of members of parliament</h3>
			<p>The dataset has a column showing the Date of Birth for each member of parliament.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#using pandas datetime function to convert date of birth column to ages and posting the in a new column called YEAR</i></p>
			<p>members['year'] = (pd.to_datetime('today') - pd.to_datetime(members['Date of Birth']))</p>
			
			<br/>
			<p><i>#Displaying the first 5 rows</i></p>
			<p>members['year'].head()</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>0   24225 days 11:38:43.479161
1   15802 days 11:38:43.479161
2   25359 days 11:38:43.479161
3   15724 days 11:38:43.479161
4   14253 days 11:38:43.479161
Name: year, dtype: timedelta64[ns]</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#Converting the number of days to years</i></p>
			<p>pm_years = members['year'].dt.days/365</p>
			<p>pm_years.head()</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>0    66.369863
1    43.293151
2    69.476712
3    43.079452
4    39.049315
Name: year, dtype: float64</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>(pm_years.min(),pm_years.max())</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>(23.865753424657534, 82.93150684931507)</pre>
		</div>
		<div class="col-md-12">
			<p>According to the results above, the youngest member of parliament is 23yrs and the oldest is 82yrs. I suspected there was an error with the above ages so i went ahead to find out who the belonged to</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#getting the index of the youngest member</i></p>
			<p>pm_years[pm_years == pm_years.min()]</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>72    23.865753
Name: year, dtype: float64</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#getting the index of the oldest member</i></p>
			<p>pm_years[pm_years == pm_years.max()]</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>194    82.931507
Name: year, dtype: float64</pre>
			<p>Extracting the information for the two members of parliament</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>members.iloc[194, :10]</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>No.                              195
Name of M.P        Kirunda Kivejinja
District                        None
Constituency              Ex-officio
Political Party                 NONE
Profession                   Zoology
Marital status               Married
Phone number               772583920
Date of Birth              12/6/1935
P.L.E School                     NaN
Name: 194, dtype: object</pre>
			<p>According to the data Hon Kirunda Kivejinja is 82yrs of age</p>
			<p>This year is consistent with the information on the parliament.go.ug website making him the oldest person in pariament.</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>members.iloc[72, :10]</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>No.                                                  73
Name of M.P        AZAIRWE NSHAIJA KABARAITSYA DOROTHY 
District                                       Kamwenge
Constituency              District Woman Representative
Political Party                                     NRM
Profession                                   Accountant
Marital status                                  Married
Phone number                                  772459896
Date of Birth                                12/15/1994
P.L.E School                                        NaN
Name: 72, dtype: object</pre>
			<p>So according to the data this is the youngest member of parliament but a quick look at the parliament website parliament.co.ug, shows she was born in 1974 making her 44yrs, which shows some discrepancies in the data.</p>
			<p>Lets get back to finding the distribution of ages in the 10th parliament</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>one=[]</p>
			<p>two=[]</p>
			<p>three=[]</p>
			<p>four=[]</p>
			<p>five=[]</p>
			<p>six=[]</p>
			<p>seven=[]</p>
			<br/>
			<p><i>#Creating bins for the ages and using a for loop to find the frequencies for each bin</i><p>
			<p>bins = [(20,29),(30,39),(40,49),(50,59),(60,69),(70,79),(80,89)]</p>
			<p>names = [one,two,three,four,five,six,seven]</p>
			<br/>
		<pre class="code">for i in range(len(bins)):
    for x in range(len(pm_years)):
        if(bins[i][0]<=pm_years[x]<=bins[i][1]):
            names[i].append(pm_years[x])</pre>
			numbs = []
<pre class="code">for i in range(len(bins)):
    numbs.append(len(names[i]))</pre>
			<br/>
			<p><i>Plotting the bar graph</i></p>
			<p>fig2,ax = plt.subplots()</p>
			<p>g = np.arange(len(names))</p>
			<p>plt.bar(g, numbs)</p>
			<p>plt.xticks(g, bins)</p>
			<p>plt.xlabel("Age brackets")</p>
			<p>plt.ylabel("Frequency")</p>
			<p>plt.title("Distirbution of ages in the 10th parliament")</p>
			<p>fig2.savefig("ages.png", bbox_inches = "tight")</p>
			<p>plt.show()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
		<div class="col-md-12">
			<img src="postimg/ages.png" />
		</div>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>numbs</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>[8, 62, 163, 97, 49, 16, 1]</pre>
			<p>According to the graph above, the majority of parliamentarians are between the ages of 40 and 49 (163 members of parliament), followed by those between 50 and 60 years of age(97). The youthfull members of parliament between 20-29 yrs of age are only 8 and those between 30-39 years of age are 62. Note that the ages may not be accurate.<p>
			<h3>Level of education</h3>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>Three_deg = members['Third Degree'][members['Third Degree'].isnull() == False]</p>
			<p>Two_deg = members['Second Degree'][members['Second Degree'].isnull() == False]</p>
			<p>One_deg = members['First Degree'][members['First Degree'].isnull() == False]</p>
			<br/>
			<p>(len(One_deg), len(Two_deg), len(Three_deg))</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>(357, 182, 43)</pre>
			<p>The numbers above show that 357 of the members of parliament have a degree, 182 have acquired a second degree and 43 went ahead to acquire and third degree.</p>
			<h3>Which professional bodies do these members of parliament belong to?</h3>
			<p>We shall extract this information from the column "labeled Professional body membership"</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>Prof_body = members['Professional Body Membership'][members['Professional Body Membership'].isnull() == False]</p>
			<p>len(Prof_body)</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>142</pre>
			<p>142 out of 439 Members of Parliament belong to a professional body</p>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p>members['Professional Body Membership'].head(10)</p>
		</code>
		</div>
		<div class="col-md-12">
			<pre>0                                                  NaN
1                                                  NaN
2          Red Cross, Trade Technology, Cultural Group
3                                                  NaN
4                                                  NaN
5    Uganda institution of professional engineers, ...
6                                                  NaN
7                                                  NaN
8                                                  NaN
9                                                  NaN
Name: Professional Body Membership, dtype: object</pre>
		</div>
		<div class="col-md-12 col-sm-12 codehold">
		<code class="col-md-12">
			<p><i>#Splitting and creating an array of text</i></p>
			<p>bodies = []</p>
<pre class="code">for i in Prof_body.index:
    bb = Prof_body[i].split(",")
    for n in range(len(bb)):
        bodies.append(bb[n])</pre>
		<br/>
		<p><i>#Make word cloud of bodies</i></p>
		<pre class="code">wordcloud = WordCloud(
                          background_color='white',
                          stopwords=stopwords,
                          #max_words=200,
						  #max_font_size=40, 
                          random_state=42
                         ).generate(str(bodies))</pre>

		<br/>
		<p><i>#Plotting the wordcloud</i></p>
<p>print(wordcloud)</p>
<p>fig = plt.figure(figsize=(10, 10))</p>
<p>plt.imshow(wordcloud)</p>
<p>plt.axis('off')</p>
<p>fig.savefig("bodies.png", bbox_inches = "tight")</p>
<p>plt.show()</p>
		</code>
		</div>
		<div class="col-md-12 movable">
			<img src="postimg/bodies.png" />
		</div>
		<div class="col-md-12">
			<p>According to the wordcloud majority of members of parlient belong to Uganda Law Society this is not suprising according to our previous analysis there many lawyers in parliament Suprising there are few that belong to UNATU and yet there many members of parliament who are teachers, probably because they are not practicing teachers they dont feel the need to join UNATU,. I can also single out some familiar professional bodies like Uganda Medical Associassion, CPA, Red Cross, ACCA, and Rotary.</p>
		</div>
		

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
