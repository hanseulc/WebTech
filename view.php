<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<html>
     <head>
     <style>
     	body{height: 100%; margin:0;}
     
       	#header{
     		width: 90%;
     		padding: 0px;
     		margin: 0px;
     		text-align: center;
     		height: 90px;
     		background-color: #ecd8c6;
     		margin-left: auto;
     		margin-right: auto;
     		border-style: groove;
     	}
     	
     	#header img{
     		margin-top: 10px;
     	}
     	
     
     	#main{
     	
     		width: 85%;
     		padding: 5px;
     		margin-top: 10px;
     		margin-bottom: 50px;
     		margin-left: auto;
     		margin-right: auto;
     	}
     	
     	#content{
     		background-color:  #ecd8c6;	
     	}
     	
     	.content-container{
     		float: left;
     		width: calc(75% - 50px);
     		margin-right: 0;
     		margin-top:20px;
     		margin-bottom: 20px;
     		border-color: #818181;
     		border-width: 1px;
     		border-style: groove;
     	}

     	#navbar{
     		width: 25%;
     		height: 60%;
     		background-color:  #ecd8c6;
     		padding: 10px;
     		margin-top: 20px;
     		float: right;
     		border-color: #818181;
     		border-style: dashed;
     		border-width: 1px;
     	}
     	
     	#navbar ul{
     		list-style-type: none;
     		}
     	
     	#navbar ul a{
     		color: white;
     		text-decoration: none;
     		font-size: 18px;

     	}
     	
     	#navbar ul span{
     		color: white;
     		text-decoration: none;
     		font-size: 18px;
     		}
     	
     	
     	#navbar ul a:hover{
     		background-color: black;
     		color: #ecd8c6;
     	
     	}
     
     	#navbar ul span:hover{
     		background-color: white;
     		color: #ecd8c6;
     	
     	}
     
     	#date{
     		padding: 8px 8px 8px 10px;
     		background-color: white;
     	}
     	
     	#title{
     		font: italic bold 24px;
     		color: #808080;
     		padding: 8px 8px 8px 10px;
     	
     	}
     	
     	hr{
     		display:block;
     		position: relative;
     		padding: 0;
     		margin: 8px auto;
     		height: 0;
     		width: 100%;
     		max-height: 0;
     		font-size: 1px;
     		line-height: 0;
     		clear: both;
     		border: none;
     		border-top: 1px solid #aaaaaa;
     		border-bottom: 1px solid #ffffff; 
     	
     	}
     	
     	.sidebar {
		height: 100%;
    	width: 0;
    	position: fixed;
    	z-index: 1;
    	top: 0;
    	left: 0;
    	background-color: #111;
    	overflow-x: hidden;
    	transition: 0.5s;
    	padding-top: 60px;
	}

		.sidebar a {
    	padding: 8px 8px 8px 32px;
    	text-decoration: none;
    	font-size: 25px;
    	color: #818181;
    	display: block;
    	transition: 0.3s
	}

		.sidebar a:hover, .offcanvas a:focus{
    	color: #f1f1f1;
	}

		.sidebar .closebtn {
    	position: absolute;
   		top: 0;
    	right: 25px;
    	font-size: 36px;
    	margin-left: 50px;
	}
     	
     </style>
     
     </head>



	<body>
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
 	 var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
  	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	
		<div id = "header">
		
		<img src="hanseuls.png" alt="header" style="height: 80px">
		
		</div> <!--header-->
	
	<div id="sidebar" class="sidebar">
	
	<div class="fb-share-button" data-href="http://webprojects.eecs.ac.uk/hc303/blog/view.php" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwebprojects.eecs.ac.uk%2Fhc303%2Fblog%2Fview.php&amp;src=sdkpreparse">Share</a></div>
	
	<a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	
	
	</div> <!--sidebar-->
	
	<script>
	function openNav() {
    document.getElementById("sidebar").style.width = "250px";
}


function closeNav() {
    document.getElementById("sidebar").style.width = "0";
}
	</script>		

	<div id="main">	
	<div class="content-container">
	<?php
	
		$host   =   "dbprojects.eecs.qmul.ac.uk"  ;
		$user   =   "hc303"  ;
		$pass   =   "kWIt2xAbU6QVE"  ;
		$db   =   "hc303"  ;
		$conn = mysql_connect($host, $user, $pass);
		@mysql_select_db( 'hc303', $conn) or die ("unable to select database");
		
		$query = "SELECT id, main, title, date FROM content ORDER BY ID DESC";
		
		$res = mysql_query($query);
		$numberRow = mysql_num_rows ($res);
		
		if ($numberRow > 0){
			while($row = mysql_fetch_assoc($res)){
			        echo "<div id = 'content'><div id='date'>".$row["date"]."</div><div id='title'>". $row["title"]."</div><div id='main'>".$row["main"]."</div><a href='delete.php?id=". $row["id"]."'>Delete</a><hr></div>";
			} //while	
		} //if
		else {
			header('Location: login.html');
		
		} //else
		
	mysql_close($conn);
		?>
	
	

	</div> <!--content-container-->
	
		<div id = "navbar"> 
		
		<ul>

		<li><span id="openNav" onclick = "openNav()"> tap for more </span> </li>
		<br><br>
		<li><a href = "http://webprojects.eecs.qmul.ac.uk/hc303/blog/viewBlog.php"> Refresh </a>	</li>
		<br><br>
		<li><a href = "http://webprojects.eecs.qmul.ac.uk/hc303/blog/login.html"> Login </a>	</li>
		<br><br>
		<li><a href = "http://webprojects.eecs.qmul.ac.uk/hc303/blog/addentry.html"> Add new entry </a>	</li>
		
		</ul>
		
		</div>
		</div> <!--main-->
		

	
	
	</body>

</html>