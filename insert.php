<?php 
$data = json_decode(file_get_contents("php://input"));
$emp_no = mysql_real_escape_string($data->emp_no);
$first_name = mysql_real_escape_string($data->first_name);
$last_name = mysql_real_escape_string($data->last_name);
$dept_name = mysql_real_escape_string($data->dept_name);
mysql_connect("localhost", "root", ""); 
mysql_select_db("angular");
//$check=mysql_query("INSERT INTO employee('emp_no','first_name','last_name','dept_name') VALUES('".$emp_no."','".$first_name."','".$last_name."','".$dept_name."')");
$query = "INSERT INTO employee SET
                    emp_no = '" . $emp_no . "',
                    first_name = '" . $first_name . "',
                    last_name = '" . $last_name . "',
                      dept_name = '" . $dept_name . "'";
                 
 mysql_query($query);

?>