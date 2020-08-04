<?php
session_start();



include ("include_db_coordinates.php");	
$tbl_name="User_Master"; // Table name 


// Connect to server and select databse.
 mysql_connect("$host", "$username", "$password")or die("cannot connect to server, please contact Marketwire.net administrator."); 
 mysql_select_db("$db_name")or die("cannot select DB");



// Define $myusername and $mypassword 
 $myusername=$_POST['txtemailid']; 
 $mypassword=$_POST['txtpwd']; 



// To protect from MySQL injection
 $myusername = stripslashes($myusername);
 $mypassword = stripslashes($mypassword);
 $myusername = mysql_real_escape_string($myusername);
 $mypassword = mysql_real_escape_string($mypassword);
 
 

 $sql="SELECT * FROM User_Master WHERE EmailId='$myusername' and User_pwd='$mypassword'";
echo($sql);
 $result=mysql_query($sql);

// Mysql_num_row is counting table row
 $count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

while($row = mysql_fetch_array($result))
{
	$myreference_id = $row['UserId'];
	$User_status = $row['User_status'];
	$myusername=$row['$FirstName']. " " .$row['$LastName'];
}

if($count==1){
	##$row = mysql_fetch_assoc($sql);
	

    // Register $myusername, $mypassword and redirect to file "login_success.php"
	 $myUser_status = mysql_real_escape_string($User_status);
	 $myreference_id = mysql_real_escape_string($myreference_id);
	 
	 
	  
	 $_SESSION["myusername"] = $myusername;
	 $_SESSION["myreference_id"] = $myreference_id;	 
	 
	 session_register("myusername");	
	// session_register("myreference_id");
	

	 
	 
	  ##session_register("myUser_status"); #### Student=S,Facilitator=F, Coordinators=C,Donors=D,Volunteers=V 
	  ## session_register("myreference_id"); 
	 
	 // Free resultset
	// mysql_free_result($result);
	 
	 ////////////INSERT data into log table: "ffe_user_logs" that user has loggedin this time and date to user profile system.
	 //////////TABLE: ffe_user_logs//////////////////////////////////////////////////////////////////////////////////////////
	 
	 $gtipaddress = $_SERVER['REMOTE_ADDR'];
	 $gtipaddress1 = $_SERVER['HTTP_X_FORWARDED_FOR'];
	 
	 $gtcurrentdate = date('Y-m-d H:i:s');
	 
	// $sqlinsert="insert into ffe_user_logs (login_email,usr_ip_address,usr_ip_address1,login_date,student_id) values ('$myusername','$gtipaddress','$gtipaddress1','$gtcurrentdate','$myreference_id')";
	 //mysql_query($sqlinsert) or die(mysql_error()); 
	 

     //echo "Login Sucessfully....";
	






 }
 else {
	 echo "Incorrect email ID or Password";
	 //go back button
	 //echo "";
 }
	
 ?>