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
$page = $_POST['page'];
$tags = $_POST['tags'];
$today = date('Y-m-d H:i:s');
//insert into topic
$query = "INSERT INTO topic (Author, Posted, Intro, Page, topic) VALUES('" . $author . "','" .  $today . "','" .  $intro . "','" .  $page . "', '" . $topic . "')";

//run the complete query
$result = mysqli_query($conn, $query);
if($result){
echo "Done";
}else{
printf("error: %s\n", mysqli_error($conn));
}

$id = mysqli_insert_id($conn);
echo $id;
//add insert statment for each selected tag

foreach($tags as $tag){
$query2 = "INSERT INTO topic_tags (topic_id, tags_id) VALUES('" . $id . "','" . $tag . "')";

$result2 = mysqli_query($conn, $query2);
if($result2){
echo "Done2";
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
<title>hkanalytics Update Page</title>
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



<div class="col-md-6">
<form action="admin.php" method="post">
  <div class="form-group">
    <label for="Topic">Topic</label>
    <input name="topic" type="text" class="form-control" id="topic" placeholder="Enter Topic">
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
</html>
