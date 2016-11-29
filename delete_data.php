<?php
error_reporting(0);
include_once "dbMYSQL.php";
$con=new DB_con();
$table="userdata";
if(isset($_GET['delete_id']))
{
$id=$_GET['delete_id'];
$res=$con->delete($table,$id);
if($res)
{
?>
<script>
alert('Record Deleted....');
window.location='index.php';
</script>
<?php
}
else
{
?>
<script>
alert('Record Cannot Be Deleted...');
window.location='index.php';
</script>
<?php
}
}
?>
