<?php

		$host   =   "dbprojects.eecs.qmul.ac.uk"  ;
		$user   =   "hc303"  ;
		$pass   =   "kWIt2xAbU6QVE"  ;
		$db   =   "hc303"  ;
 
		$link  =  mysql_connect ( $host ,  $user ,  $pass );
			
			if (! $link ) {
    			die( 'Could not connect: '  .  mysql_error ());
			}
			
		echo  'Connected successfully' ;

		@$db_selected  =  mysql_select_db ( $db ,  $link );
		if (! $db_selected ) {
    		die ( 'Can\'t use $db : '  .  mysql_error ());
			}

		if(!$_POST['title']== "" && !$_POST['entry']==""){
		
			date_default_timezone_set("GMT+1");
			$title = $_POST['title'];
			$newentry = $_POST['entry'];
			$date = date("D").", ".date("M t")."th, ".date("Y").", ".date("g").":".date(i)." ".date(a)." ".date(e);

			$sql = "INSERT INTO content".
				"(main,title,date)".
				"VALUES".
				"('$newentry','$title','$date')";
		
		if(!mysql_query($sql))
		{
		echo "error";
		echo mysql_error();
		}
		}
		mysql_close ( $link );
		//header('Location: viewBlog.php');
		
		




?>