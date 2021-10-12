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
if(isset($_POST['topic'], $_POST['author'], $_POST['intro'], $_POST['page'], $_POST['tags'])){
$topic = $_POST['topic'];	
$author = $_POST['author'];
$intro = $_POST['intro'];
$page = $_POST['page'] . "#disqus_thread";
$tags = $_POST['tags'];
$postimg = $_POST['postimg'];
$today = date('Y-m-d H:i:s');
echo $postimg;
//insert into topic
$query = "INSERT INTO topic (Author, Posted, Intro, Page, topic, img) VALUES('" . $author . "','" .  $today . "','" .  $intro . "','" .  $page . "', '" . $topic . "','" . $postimg . "')";

//run the complete query
$result = mysqli_query($conn, $query);
if($result){
//echo "Done";
}else{
printf("error: %s\n", mysqli_error($conn));
}

$id = mysqli_insert_id($conn);
//echo $id;
//add insert statment for each selected tag

foreach($tags as $tag){
$query2 = "INSERT INTO topic_tags (topic_id, tags_id) VALUES('" . $id . "','" . $tag . "')";

$result2 = mysqli_query($conn, $query2);
if($result2){
//echo "Done2";
}else{
printf("error: %s\n", mysqli_error($conn));
}
}


mysqli_close($conn);
}
}
?>

<!DOCTYPE html>
<html>

<head>
<title>hkanalytics Admin Page</title>
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

<div class="col-md-6" style="margin-bottom:20px;">
<form action="admin.php" method="post">
  <div class="form-group">
    <label for="Topic">Topic</label>
    <input name="topic" type="text" class="form-control" id="topic" placeholder="Enter Topic">
  </div>
<div class="form-group">
<label for="Img">Image</label>
<input name="postimg" type="text" class="form-control" id="postimg" placeholder="Enter Image name">
</div>
  <div class="form-group">
    <label for="Author">Author</label>
    <input name="author" type="text" class="form-control" id="author" placeholder="Enter Name">
  </div>
<div class="form-group">
    <label for="Intro">Intro</label>
    <textarea class="form-control" name="intro" id="intro" placeholder="Enter Introduction" rows="3" cols = "80"></textarea>
  </div>
<div class="form-group">
    <label for="Page">Page Link</label>
    <input type="text" class="form-control" name="page" id="page" placeholder="Enter page Link">
  </div>

  <div class="checkbox">
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
}
$sql = "SELECT * FROM tags";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
	//output data
while($row = mysqli_fetch_assoc($result)){
echo "<label>
      <input type='checkbox' name=tags[] value='" . $row['id'] . "'>" . $row['name'] . "
    </label> </br>";

}
}else{
echo "0 results";
}
mysqli_close($conn);
?>
  </div>
  <button type="submit" class="btn">Submit</button>
</form>
</div>

<div class="col-md-12 col-sm-12 col-xs-12" style="height:auto; background-color:black; color:white;  padding:0px;">
<div class="col-md-6" style="padding:10:px;">
<img src="profile.jpg" style="height:10%; width:10%; margin-top:10px;" class="img-rounded">
<p>Kateu Herbert is a Statistics & Economics graduate from Kyambogo University. He is the brainchild of hkanalytics, a blog dedicated to providing solutions to problems using opens source technology like Python and R-programming. He has expertise in Machine Learning, Statistics, Econometrics and has participated in many projects in and around the country.</p>
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
