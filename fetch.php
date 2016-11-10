<?php 

mysql_connect("localhost", "root", ""); 
mysql_select_db("angular");
//$result = mysqli_query("select * from employee");
$result = "select * from employee";
$data=  mysql_query($result);
$data = array();

while ($row = mysql_fetch_array($data)) {
  $data[] = $row;
}
    print json_encode($data);
?>