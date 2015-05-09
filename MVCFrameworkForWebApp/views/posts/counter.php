<?php

$counter='';//initilize counter
$sql="SELECT counter FROM tb_counter";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
$counter=$rows['counter'];

// if count is empty
if(empty($counter)){
    $counter=1;
    $insertCounter="INSERT INTO counter set value='".$counter."'";
    $result1=mysql_query($insertCounter);
}

// increment visitor count
$increasecounter=$counter+1;
$sql2="update counter set value='".$increasecounter."'";
$result2=mysql_query($sql2);
