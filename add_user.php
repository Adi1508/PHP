<?php
error_reporting(0);
include_once 'dbMYSQL.php';
$con=new DB_con();
$table="userdata";
?>
<html>
<head>
<title>ADD NEW USER DATA</title>
<link href=".\CSS\bootstrap.min.css" rel="stylesheet" type="text/css">
<link href=".\CSS\font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
  <form method="post" enctype="multipart/form-data">
<div class="jumbotron">
<div class="container">
<div class="row">
<div class="col-lg-4">
<div class="panel panel-primary">
<div class="panel-heading">
<h2 style="text-align:center;">ADD NEW USER DATA</h2>
</div>
<div class="panel-body">
  <div class="form-group">
      <input class="form-control" type="text" placeholder="Enter Name" name="name" />
  </div>
  <div class="form-group">
      <input class="form-control" type="text" placeholder="Enter Father Name" name="fname" />
  </div>
  <div class="form-group">
      <input class="form-control" type="text" placeholder="Enter City" name="city" />
  </div>
  <div class="form-group">
    <label>Date Of Birth</label>
      <input class="form-control" type="date" name="dob" />
  </div>
  <div class="form-group">
  <input type="file" name="image">
</div>
  <button type="submit" name="submit" class="btn btn btn-success">ADD NEW USER</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<?php
if(isset($_POST["submit"]))
{
  $a=$_POST["name"];
  $b=$_POST["fname"];
  $c=$_POST["city"];
  $d=$_POST["dob"];

  $img=$_FILES["image"]["name"];
				   $temp_img=$_FILES['image']['tmp_name'];

					$type=$_FILES["image"]["type"];
					$size=$_FILES["image"]["size"];
					$store=$_FILES["image"]["tmp_name"];
					 $arr= explode('.',$img);
				 $k=end($arr);
				 $formate=array("jpg","png","gif","jpeg",);

				 if(in_array("$k",$formate))

					move_uploaded_file($store,"upload/".$img);

  $res=$con->insert($table,$a,$b,$c,$d,$img);
  if($res)
  {
    ?>
    <script>
    alert('Record Added...');
    window.location='index.php';
    </script>
    <?php
  }
  else {
    ?>
    <script>
    alert('error record addition...');
    window.location='index.php';
    </script>
    <?php
  }
}
 ?>
</body>
</html>
