<?php

$id=$_POST['city_id'];
$weather1=$_POST['weather1'];
$TimeStamp=$_POST['timeStamp'];
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

//check if you have all the data you need from the client-side call.  This should include the fields being changed and the ID of the student to be changed
//if not, add an appropriate error to errors
if(isset($id)&& isset($weather1)){
	$sql="UPDATE `cities` SET `weather1`='{$weather1}',`weather2`='{$weather2}',`weather3`='{$weather3}',`TimeStamp`='{$TimeStamp}' WHERE `id`='{$id}'";
	

	$result = mysqli_query($conn,$sql);
	if(empty($result)){
		$output['errors'][]='database errors';
	}else if(mysqli_affected_rows($conn)===1){
		$output['success']=true;
		
		
		
	}else{
		$output['errors'][]='update error';
	}
}else{
	$output['errors'][]="missing input . $id . $weather1 .$weather2 . $weather3";
}

//write a query that updates the data at the given student ID.  

//send the query to the database, store the result of the query into $result


//check if $result is empty.  
	//if it is, add 'database error' to errors
//else: 
	//check if the number of affected rows is 1.  Please note that if the data updated is EXCACTLY the same as the original data, it will show a result of 0
		//if it did, change output success to true
	//if not, add to the errors: 'update error'

?>