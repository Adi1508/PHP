<?php
error_reporting(0);
include_once 'dbMYSQL.php';
$con= new DB_con();
$res=$con->select();
?>
<html>
<head>
<title>PHP with OOPS</title>
  <link href=".\CSS\bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href=".\CSS\font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
   function del_id(id)
   {
     if(confirm('Sure to delete this record?'))
     {
       window.location='delete_data.php?delete_id='+id
     }
   }
   function edit_id(id)
   {
     if(confirm('sure to edit this record?'))
     {
       window.location='edit_data.php?edit_id='+id
     }
   }
   </script>
</head>
<body>
  <div class="jumbotron">
    <div class="container">
  <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="row">
        <div class="col-lg-6">
    <h2 style="text-align:center;">USER DATA</h2>
  </div>
  <div class="col-lg-6">
    <a href="add_user.php"><button style="float:right" type="button" class="btn btn btn-success">ADD NEW USER</button></a>
    </div>
  </div>
</div>
    <div class="panel-body">
      <div class="col-lg-12">
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>City</th>
                <th>Date Of Birth</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php
        $count=1;
        while($row=mysql_fetch_array($res))
        {
          ?>
          <tr>
            <td><?php echo $count; ?></td>
           <td><?php echo $row[1]; ?></td>
           <td><?php echo $row[2]; ?></td>
           <td><?php echo $row[3]; ?></td>
           <td><?php echo $row[4]; ?></td>
           <td><img src="upload/<?php echo $row[5];?>" width="150" height="150"></td>
           <td align="center"><a href="javascript:edit_id(<?php echo $row[0]; ?>)">EDIT</a></td>
            <td align="center"><a href="javascript:del_id(<?php echo $row[0]; ?>)">DELETE</a></td>
         </tr>
         <?php
          $count++;
        }
        ?>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>
