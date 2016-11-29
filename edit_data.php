<?php
error_reporting(0);
include_once 'dbMYSQL.php';
$con=new DB_con();
$table="userdata";

if(isset($_GET['edit_id']))
{
  $sql=mysql_query("select * from userdata where user_id=".$_GET['edit_id']);
  $result=mysql_fetch_array($sql);
}
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
       <input class="form-control" type="text" placeholder="Enter Name" name="name" value="<?php echo $result['name'] ?>"/>
   </div>
   <div class="form-group">
       <input class="form-control" type="text" placeholder="Enter Father Name" name="fname" value="<?php echo $result['father_name'] ?>"/>
   </div>
   <div class="form-group">
       <input class="form-control" type="text" placeholder="Enter City" name="city" value="<?php echo $result['user_city'] ?>"/>
   </div>
   <div class="form-group">
     <label>Date Of Birth</label>
       <input class="form-control" type="date" name="dob" value="<?php echo $result['dob'] ?>"/>
   </div>
   <button type="submit" name="update" class="btn btn btn-success">UPDATE USER DATA</button>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </form>
 <?php
 if(isset($_POST['update']))
 {
   $a=$_POST['name'];
   $b=$_POST['fname'];
   $c=$_POST['city'];

   $id=$_GET['edit_id'];
   $res=$con->update($table,$id,$a,$b,$c);
   if($res)
   {
     ?>
     <script>
     alert('Record Updaed....');
     window.location='index.php'
     </script>
     <?php
   }
   else {
     ?>
     <script>
     alert('Error Updating Record..')
     window.location='index.php'
     </script>
     <?php
   }
 }
  ?>
</body>
</html>
