<?php
header("Access-Control-Allow-Origin: *");

$id=$_POST['city_id'];
$name=$_POST['name'];
$latitude=$_POST['lat'];
$longitude=$_POST['long'];
$weather1=$_POST['weather1'];
$time=$_POST['timeStamp'];
if(isset($_POST['weather2'])){
	$weather2=$_POST['weather2'];
}else{
	$weather2=Null;
}
if(isset($_POST['weather3'])){
	$weather3=$_POST['weather3'];
}else{
	$weather3=Null;
}


//check if you have all the data you need from the client-side call.  
if(isset($id) && isset($name) && isset($latitude)&& isset($longitude) && isset($weather1)){
   
$sql="INSERT INTO `cities`(`id`, `TimeStamp`,`name`, `latitude`, `longitude`, `weather1`, `weather2`, `weather3`) 
   VALUES ('{$id}','{$time}','{$name}','{$latitude}','{$longitude}','{$weather1}','{$weather2}','{$weather3}')";   
 $output["sql"]=$sql;  
 $output["conn"]=$conn;  
   $result = mysqli_query($conn,$sql);
   if(empty($result)){
	   $output['errors'][]='database errors';
   }else if(mysqli_affected_rows($conn)===1){
	   $output['success']=true;
	    $output['insertID']=mysqli_insert_id($conn);
   }else{
	   $output['errors'][]='insert error';
   }

}else{

	$output['errors'][]="Variables missing required items";
}

//if not, add an appropriate error to errors

//write a query that inserts the data into the database.  remember that ID doesn't need to be set as it is auto incrementing

//send the query to the database, store the result of the query into $result


//check if $result is empty.  
	//if it is, add 'database error' to errors
//else: 
	//check if the number of affected rows is 1
		//if it did, change output success to true
		//get the insert ID of the row that was added
		//add 'insertID' to $outut and set the value to the row's insert ID
	//if not, add to the errors: 'insert error'

?>