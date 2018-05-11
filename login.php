<?php

session_start();

if ($_POST['username']){
	$dbUsername = "hanseul";
	$dbPassword = "hanseul";
	$userNAME = strip_tags($_POST["username"]);
	$passWORD = strip_tags($_POST["password"]);
	
	
	if ($userNAME == $dbUsername && $passWORD == $dbPassword){
		$_SESSION['username'] = $userNAME;
		
		$host   =   "dbprojects.eecs.qmul.ac.uk"  ;
		$user   =   "hanseul"  ;
		$pass   =   "hc303"  ;
		$db   =   "hanseul"  ;
 
		$link  =  mysql_connect ( $host ,  $user ,  $pass );
		header('Location: addentry.html');
		
		if (! $link ) {
    		die( 'Could not connect: '  .  mysql_error ());
		}
		echo  'Connected successfully' ;

		$db_selected  =  mysql_select_db ( $db ,  $link );
		if (! $db_selected ) {
    		die ( 'Can\'t use $db : '  .  mysql_error ());
		}
		
		$sql = "CREATE TABLE content(
			id INT AUTO_INCREMENT NOT NULL,
			main VARCHAR(150) NOT NULL,
			title VARCHAR(50) NOT NULL,
			date VARCHAR(50) NOT NULL,
			primary key (id))";
	
		if(mysql_query($sql)){
			echo "<br>Table created";
		}
		else{
			echo "<br> Error" . mysql_error($link);
		}
		
		mysql_close ($link);
	}
	else{
		echo "Please type in correct login credentials.";
	
	}
	
}





?>