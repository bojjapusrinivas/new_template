
<?PHP

    include ("include_db_coordinates.php");	

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	
	 
	$fullname = $_POST['fullname'];			
	$lastname = $_POST['lastname']; 
	$email = $_POST['email'];	
	$userpassword = $_POST['userpassword'];
	$phonenumber = $_POST['phonenumber'];
	$organization = $_POST['organization'];
	$jobtitle = $_POST['jobtitle'];
	$jobroll = $_POST['jobroll'];
	$country = $_POST['country'];

	$current_date = date("Y-m-d H:i:s");
	
	$sql_result_user = mysql_query("SELECT `UserId` FROM `User_Master` WHERE `EmailId`='$email'") or die(mysql_error());
	$sql_row_user = mysql_fetch_assoc($sql_result_user);
	if(!empty($sql_row_user['UserId'])) 
	{	
		
		echo "&nbsp;&nbsp;&nbsp;&nbsp;<font color=red>Details already exists!</font>";			
			 
	}
	else
	{
		$sql_add_user = "insert into User_Master (FirstName,LastName,EmailId,User_Company,JobFunction,User_website,user_position,Username,User_pwd,Date_created,User_status,User_IP,User_Type,Channel_Partner,Login_Time,Two_Step_Verification) values ('$fullname','$lastname','$email','$organization','$jobtitle','$organization','$jobroll','$email','$userpassword','$current_date','Y','','','Marketwire.net','$current_date','')";
		//echo $sql_add_user;
		$result_user1 = mysql_query($sql_add_user);

		// if successfully insert data into database, displays message "Successful". 
		/*if($result_user1)
		 {
		echo "&nbsp;&nbsp;&nbsp;&nbsp;<font color=red>Details Added Successful</font>";			
		}
		 else 
		 {
			echo "<font color=red>ERROR - Details Add - Please check with GIA administrator with error details.</font>";
		}	*/
		//echo "connected";
	}

	// close connection 
	mysql_close();
	

	
	?>


