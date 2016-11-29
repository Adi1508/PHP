<?php
define ('DB_SERVER','localhost');
define ('DB_USER','root');
define ('DB_PASS','');
define ('DB_NAME','oopsproj');

class DB_con
{
  function __construct()
  {
    $conn=mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die("localhost connection problem".mysql_error());
    mysql_select_db(DB_NAME, $conn);
  }

  public function select()
  {
  $res=mysql_query("select * from userdata");
  return $res;
  }

  public function delete($table, $id)
  {
  $res=mysql_query("delete from $table where user_id=".$id);
  return $res;
  }

  public function update($table,$id,$k,$l,$m)
  {
  $res= mysql_query("update $table set name='$k', father_name='$l',user_city='$m' where user_id=".$id);
  return $res;
  }

  public function insert($table, $name, $fname, $city, $date, $img)
  {
  $res=mysql_query("insert into $table set name='$name', father_name='$fname', user_city='$city', dob='$date', pic='$img'");
  return res;
  }
}
?>
