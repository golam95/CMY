
<?php 
$back=backup_database_tables('localhost','root','','shop', '*');
if ($back==true) {
	echo("<script>alert('database backup successfull');</script>");

}

// backup the db function
function backup_database_tables($host,$user,$pass,$name,$tables)
{

$link = mysqli_connect($host,$user,$pass,$name);
//mysql_select_db($name,$link);

//get all of the tables
if($tables == '*')
{
$tables = array();
$result = mysqli_query($link,'SHOW TABLES');
while($row = mysqli_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}
$return="";
//cycle through each table and format the data
foreach($tables as $table)
{
$result = mysqli_query($link,'SELECT * FROM '.$table);
$num_fields = mysqli_num_fields($result);

$return.= 'DROP TABLE '.$table.';';
$row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
$return.= "nn".$row2[1].";nn";

for ($i = 0; $i < $num_fields; $i++)
{
while($row = mysqli_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
//$row[$j] = preg_replace("n","\n",$row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");n";
}
}
$return.="nnn";
}

//save the file
$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
$sager=('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql');
$date = date('Y-m-d');
$sqlname='CMYShop';


 $query = "INSERT INTO db_backup(db_name,db_description,db_date)   
           VALUES('$sqlname','$sager','$date')"; 
		 if (mysqli_query($link, $query)) {
              header('Location: ../viewbackup.php');
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
   
fwrite($handle,$return);
fclose($handle);
}

 ?>
 <a href="../viewbackup.php">$sager</a>