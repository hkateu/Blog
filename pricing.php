<?php
if(isset($_GET['tag'])){
	$filter = $_GET['tag'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>hkanalytics Home Page</title>
<meta name="viewport" content="widith=device-widith, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="keywords" content="Uganda, statistics, econometrics, machine learning, python, R programming">
<meta name="author" content="About Kateu Herbert">
<meta name="robots" content="index, follow">

<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="css/docs.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
<script src="jquery/jquery-1.11.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>


<nav class="navbar navbar-inverse" role="navigation" style="">
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
	<li style="padding-left:0px;" class="active" style="color:white;"><a style="background-color:rgb(2,59,102);" href="#">Home</a></li>
	<li style="padding-left:0px;"><a href="about.php" style="color:rgb(2,59,102);">About</a></li>
	<li style="padding-left:0px;"><a href="contact.php" style="color:rgb(2,59,102);">Contact</a></li>
	</ul>
</div>
</nav>

<div class="col-md-10">
<?php
$servername = "localhost";
$username = "hkanalyt_user";
$password = "mysqlblogpass2017";
$dbname = "hkanalyt_blog";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check connection
if (!$conn){
die("Connection failed: " . mysqli_connect_error());
}else{
	if(isset($_GET['tag'])){

	$query = "SELECT * FROM topic JOIN topic_tags ON(topic.id = topic_tags.topic_id) WHERE tags_id = $filter ORDER BY Posted DESC";
	$resultest = mysqli_query($conn, $query)
		or die(mysqli_error($conn));
	$num_rows = mysqli_num_rows($resultest);	

	if(isset($_GET['pageno'])){
	$pageno=$_GET['pageno'];
	}else{
		$pageno=1;
		}

$rows_per_page = 20;
$lastpage = ceil($num_rows/$rows_per_page);

$pageno = (int)$pageno;
if($pageno > $lastpage){
	$pageno = $lastpage;
	}
if($pageno<1){
	$pageno = 1;
	}
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page . ',' . $rows_per_page;	

$query = "SELECT * FROM topic JOIN topic_tags ON(topic.id = topic_tags.topic_id) WHERE tags_id = $filter ORDER BY Posted DESC $limit";

		$result = mysqli_query($conn, $query);
		if($result){
		while($row = mysqli_fetch_assoc($result)){
			$topic_id = $row['id'];
			$author = $row['Author'];
			$posted = $row['Posted'];
			$intro = $row['Intro'];
			$page = $row['Page'];
			$topic = $row['topic'];
			$postimg = $row['img'];
 $query2 = "SELECT p.id, t.name FROM topic_tags tt JOIN topic p on p.id = tt.topic_id join tags t on t.id = tags_id WHERE p.id =" . $topic_id;			
$result2 = mysqli_query($conn, $query2);

echo "<div class='col-md-12'>
<h3>" . $topic . "</h3>
<div class=\"col-md-12\">
<img src=\"postimg/" . $postimg . "\" class=\"img-responsive col-md-4\" />
</div>
<p>Author:" . $author . "</p>
<p>Date:" . $posted . "</p>";
	echo "<p>Tags: ";
if($result2){
	$numResults = mysqli_num_rows($result2);
	$counter = 0;
while($row2 = mysqli_fetch_assoc($result2)){
	$name = $row2['name'];
	if(++$counter == $numResults){
	echo $name;
	}else{
	echo $name . " | ";
	}
}
}else{
	printf("error: %s\n", mysqli_error($conn));

}
	echo "</p>";
//<p>Tags: Econometrics | Python | Pandas | Matplotlib</p>
echo "<p>" . $intro . "</p>
	<p><a href='" . $page . "' class=\"btn btn-info\">Continue reading</a></p>
<hr>
</div>";

			
		}	
	}else{
		printf("error: %s\n", mysqli_error($conn));
	}	
	}else{

	$query = "SELECT * FROM topic ORDER BY Posted DESC";
	$resultest = mysqli_query($conn, $query)
		or die(mysqli_error($conn));
	$num_rows = mysqli_num_rows($resultest);	

	if(isset($_GET['pageno'])){
	$pageno=$_GET['pageno'];
	}else{
		$pageno=1;
		}

$rows_per_page = 20;
$lastpage = ceil($num_rows/$rows_per_page);

$pageno = (int)$pageno;
if($pageno > $lastpage){
	$pageno = $lastpage;
	}
if($pageno<1){
	$pageno = 1;
	}
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page . ',' . $rows_per_page;	


	$query = "SELECT * FROM topic ORDER BY Posted DESC $limit";
		$result = mysqli_query($conn, $query);
		if($result){
		while($row = mysqli_fetch_assoc($result)){
			$topic_id = $row['id'];
			$author = $row['Author'];
			$posted = $row['Posted'];
			$intro = $row['Intro'];
			$page = $row['Page'];
			$topic = $row['topic'];
			$postimg = $row['img'];
 $query2 = "SELECT p.id, t.name FROM topic_tags tt JOIN topic p on p.id = tt.topic_id join tags t on t.id = tags_id WHERE p.id =" . $topic_id;
$result2 = mysqli_query($conn, $query2);

echo "<div class='col-md-12'>
	<h3>" . $topic . "</h3>
	<div class=\"col-md-12\">
<img src=\"postimg/" . $postimg . "\" class=\"img-responsive col-md-4\" />
</div>
<p>Author:" . $author . "</p>
<p>Date:" . $posted . "</p>";
	echo "<p>Tags: ";
if($result2){
	$numResults = mysqli_num_rows($result2);
	$counter = 0;
while($row2 = mysqli_fetch_assoc($result2)){
	$name = $row2['name'];
	if(++$counter == $numResults){
	echo $name;
	}else{
	echo $name . " | ";
	}
}
}else{
	printf("error: %s\n", mysqli_error($conn));

}
	echo "</p>";
//<p>Tags: Econometrics | Python | Pandas | Matplotlib</p>
echo "<p>" . $intro . "</p>
<a href='" . $page . "' class=\"btn \">Continue reading</a></p>
<hr>
</div>";

			
		}	
	}else{
		printf("error: %s\n", mysqli_error($conn));
	}	
	}
}
?>
<?php
if($pageno == 1){
	echo " FIRST PREV ";
	}else{
		echo "<a href='{$_SERVER['PHP_SELF']}?pageno=1>FIRST</a>";
		$prevpage = $pageno - 1;
		echo "<a href='{$_SERVER['PHP_SELF']}?pageno=" . $prevpage . ">PREV</a>";
		} 
	if($lastpage == 0){
		echo "(Page $pageno of 1 ) ";
		}else{
		echo "(Page $pageno of $lastpage ) ";	
			}
	if ($pageno == $lastpage || $lastpage == 0){
		echo "NEXT LAST ";
		}else {
			$nextpage = $pageno+1;
			echo "<a href='{$_SERVER['PHP_SELF']}?pageno=" . $nextpage . ">NEXT</a> </center>";
			echo "<a href='{$_SERVER['PHP_SELF']}?pageno=" . $lastpage . ">LAST</a>";
			}
?>

</div>
<div class="col-md-2" >
<h4><center>Tags</center></h4>
<ul style="list-style:none;">
<li><a href="index.php?tag=1">Econometrics</a></li>
<li><a href="index.php?tag=2">Python</a></li>
<li><a href="index.php?tag=3">Matplotlib</a></li>
<li><a href="index.php?tag=4">Pandas</a></li>
<li><a href="index.php?tag=5">Statsmodels</a></li>
<li><a href="index.php?tag=6">Scipy</a></li>
<li><a href="index.php?tag=7">Numpy</a></li>
</ul>
</div>
<div class="col-md-12" style="height:200px;  color:white;">
<p>Disqus goes here</p>
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

